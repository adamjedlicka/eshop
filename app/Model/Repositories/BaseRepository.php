<?php

namespace App\Model\Repositories;

use LeanMapper\Repository;
use App\Exceptions\EntityNotFoundException;

class BaseRepository extends Repository
{
    public function findBy($cond)
    {
        $row = $this->connection->select('*')
            ->from($this->getTable())
            ->where($cond)
            ->fetch();

        if ($row === null) {
            throw new EntityNotFoundException('Entity was not found.');
        }

        return $this->createEntity($row);
    }

    public function find($id)
    {
        return $this->findBy(['id' => $id]);
    }

    public function findAll()
    {
        $rows = $this->connection->select('*')
            ->from($this->getTable())
            ->fetchAll();

        return $this->createEntities($rows);
    }
}
