<?php

class ProductService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository(Product::ENTITY_NAME, Product::FILLABLE);
    }

    public function save($entity)
    {
        $this->repository->save($entity);
    }
    public function findTakeSkip($take,$skip)
    {
        return $this->repository->find()
            ->where('deleted', '=', 'FALSE')
            ->groupBy('id')
            ->take($take)
            ->skip($skip)
            ->getMany();
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
        return $this->repository->find()
            ->where('deleted', '=', 'FALSE')->getMany();
    }

    public function findById($entity_id)
    {
        return $this->repository->findById($entity_id);
    }
}
