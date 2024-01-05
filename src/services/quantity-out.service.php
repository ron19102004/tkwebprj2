<?php

class QuantityOutService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository(QuantityOut::ENTITY_NAME, QuantityOut::FILLABLE);
    }
    public function findByIdProduct($id)
    {
        return $this->repository->find()
            ->where("id_product", "=", $id)
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

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function findById($entity_id)
    {
        return $this->repository->findById($entity_id);
    }
}
