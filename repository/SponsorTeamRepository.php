<?php
/**
 * Created by PhpStorm.
 * User: zhuko
 * Date: 10.10.2017
 * Time: 9:00
 */

namespace App\Repository;


use App\Model\Sponsor;
use App\Model\Sponsor_Team;

class SponsorTeamRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = 'sponsor_team';
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        foreach ($stmt as $row) {
            return new Sponsor_Team($row['team_id'], $row['sponsor_id'], $row['id']);
        }
        return null;
    }

    public function getSponsors($id)
    {
//        $team = new TeamRepository();
//        $sponsor = new SponsorRepository();
        $stmt = $this->pdo->prepare("SELECT s.name FROM team t, sponsor s, sponsor_team st WHERE t.team_id=st.team_id AND s.sponsor_id=st.sponsor_id AND t.team_id=:team_id");
        $stmt->execute(['team_id' => $id]);
        $sponsors = [];
        foreach ($stmt as $row) {
            $sponsors[] = new Sponsor($row['name']);
        }
        return $sponsors;
    }
}