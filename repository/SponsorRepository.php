<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 22.05.17
 * Time: 21:46
 */

namespace App\Repository;

use App\Model\Sponsor;

class SponsorRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = 'sponsor';
    }

    /**
     * @return Sponsor[] array
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName}");
        $stmt->execute();
        $sponsors = [];
        foreach ($stmt as $row) {
            $sponsors[] = new Sponsor($row['name'], $row['sponsor_id']);
        }
        return $sponsors;
    }

    /**
     * @param $id
     * @return null|Sponsor
     */
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName} WHERE sponsor_id = :sponsor_id");
        $stmt->execute(['sponsor_id' => $id]);
        foreach ($stmt as $row) {
            return new Sponsor($row['name'], $row['sponsor_id']);
        }
        return null;
    }

    /**
     * @param Sponsor $sponsor
     */
    public function save(Sponsor $sponsor)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->entityName} (name) VALUES(:name)");
        $stmt->execute([
            'name' => $sponsor->name
        ]);
    }

    /**
     * @param Sponsor $sponsor
     */
    public function update(Sponsor $sponsor)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->entityName} SET name = :name WHERE id = :id");
        $stmt->execute([
            'id' => $sponsor->id,
            'name' => $sponsor->name
        ]);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->entityName} WHERE sponsor_id = :sponsor_id");
        $stmt->execute(['sponsor_id' => $id]);
    }

    public function deleteAll()
    {
        $stmt = $this->pdo->prepare("TRUNCATE TABLE {$this->entityName}");
        $stmt->execute();
    }
}
