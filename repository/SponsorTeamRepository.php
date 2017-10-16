<?php
/**
 * Created by PhpStorm.
 * User: zhuko
 * Date: 10.10.2017
 * Time: 9:00
 */

namespace App\Repository;


use App\Model\Sponsor;
use App\Model\SponsorTeam;
use App\Model\Team;

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
            return new SponsorTeam($row['team_id'], $row['sponsor_id'], $row['id']);
        }
        return null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName}");
        $stmt->execute();
        $sponsorTeam = [];
        foreach ($stmt as $row) {
            $teams[] = new Team($row['team_id'], $row['sponsor_id'], $row['id']);
        }
        return $sponsorTeam;
    }

    public function save(SponsorTeam $sponsorTeam)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->entityName} (team_id, sponsor_id) VALUES(:team_id, :sponsor_id)");
        $stmt->execute([
            'team_id' => $sponsorTeam->team_id,
            'sponsor_id' => $sponsorTeam->sponsor_id
        ]);
    }

    public function getSponsors(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT s.name FROM team t, sponsor s, {$this->entityName} st WHERE t.team_id=st.team_id AND s.sponsor_id=st.sponsor_id AND t.team_id=:team_id");
        $stmt->execute(['team_id' => $id]);
        $sponsors = [];
        foreach ($stmt as $row) {
            $sponsors[] = new Sponsor($row['name']);
        }
        return $sponsors;
    }

    public function getTeams(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT t.name, t.founded, t.car FROM team t, sponsor s, {$this->entityName} st WHERE s.sponsor_id=st.sponsor_id AND t.team_id=st.team_id AND s.sponsor_id=:sponsor_id");
        $stmt->execute(['sponsor_id' => $id]);
        $teams = [];
        foreach ($stmt as $row) {
            $teams[] = new Team($row['name'], $row['car'], $row['founded']);
        }
        return $teams;
    }

}