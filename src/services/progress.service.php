<?php

class ProgressService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository(Progress::ENTITY_NAME, Progress::FILLABLE);
    }
    public function findByIdOrder($id)
    {
        return $this->repository->find()
            ->where('id_order', '=', $id)
            ->groupBy('id ASC')
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
