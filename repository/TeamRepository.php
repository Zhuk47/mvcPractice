<?php

namespace App\Repository;

use App\Model\Team;

class TeamRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = 'team';
    }

    /**
     * @param $id
     * @return null|Team
     */
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        foreach ($stmt as $row) {
            return new Team($row['name'], $row['founded'], $row['car'], $row['id']);
        }
        return null;
    }

    /**
     * @return Team[] array
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName}");
        $stmt->execute();
        $teams = [];
        foreach ($stmt as $row) {
            $teams[] = new Team($row['name'], $row['founded'], $row['car'], $row['id']);
        }
        return $teams;
    }

    /**
     * @param Team $team
     */
    public function save(Team $team)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->entityName} (name, founded, car) VALUES(:name, :founded, :car)");
        $stmt->execute([
            'name' => $team->name,
            'founded' => $team->founded,
            'car' => $team->car
        ]);
    }

    /**
     * @param Team $team
     */
    public function update(Team $team)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->entityName} SET name = :name, founded = :founded, car = :car WHERE id = :id");
        $stmt->execute([
            'id' => $team->id,
            'name' => $team->name,
            'founded' => $team->founded,
            'car' => $team->car
        ]);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->entityName} WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function deleteAll()
    {
        $stmt = $this->pdo->prepare("TRUNCATE TABLE {$this->entityName}");
        $stmt->execute();
    }

    public function showAll()
    {
        $stmt = $this->pdo->prepare("SELECT name, founded, car FROM {$this->entityName}");
        $stmt->execute([
            'name' => $team->name,
            'founded' => $team->founded,
            'car' => $team->car
        ]);
    }
}
