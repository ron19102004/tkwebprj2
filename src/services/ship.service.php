<?php

class ShipService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository(Ship::ENTITY_NAME, Ship::FILLABLE);
    }
    public function findByIdUser($id)
    {
        return $this->repository->find()
            ->where('id_user', "=", $id)
            ->andWhere('deleted', "=", "FALSE")
            ->getMany();
    }
    public function save($entity)
    {
        $this->repository->save($entity);
    }

    public function update($entity)
    {
        $this->repository->update($entity);
    }

    public function delete($entity_id)
    {
        $this->repository->delete($entity_id);
    }

    public function findAll($id)
    {

        return $this->repository->find()
            ->where('id_user', "=", $id)
            ->andWhere('deleted', "=", "FALSE")
            ->getMany();
    }

    public function findById($entity_id)
    {
        return $this->repository->findById($entity_id);
    }
}
