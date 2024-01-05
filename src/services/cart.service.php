<?php

class CartService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository(Cart::ENTITY_NAME, Cart::FILLABLE);
    }
    public function findByIdUser($id)
    {
        return DB::select(Cart::FILLABLE.',products.name as product_name,price,discount, brands.name as brand_name, products.avatar as product_avatar, available')
            ->from(Cart::ENTITY_NAME)
            ->join('products', 'products.id = carts.id_product')
            ->join('brands', 'products.id_brand = brands.id')
            ->where("id_user", "=", $id)
            ->andWhere("finished", "=", "FALSE")
            ->andWhere("carts.deleted", "=", "FALSE", 'deleted')
            ->getMany();
    }
    public function findByIdProductAndIdColorAndIdSize($idP, $idC, $idZ)
    {
        return $this->repository->find()
            ->where("id_product", "=", $idP)
            ->andWhere("id_color", "=", $idC)
            ->andWhere("id_size", "=", "$idZ")
            ->andWhere("finished", "=", "FALSE")
            ->andWhere("deleted", "=", "FALSE")
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
    public function findForFinished($id)
    {
        return DB::select(Cart::FILLABLE)
            ->from(Cart::ENTITY_NAME)
            ->where("id", "=", $id)
            ->andWhere("finished", "=", "FALSE")
            ->andWhere("deleted", "=", "FALSE", 'deleted')
            ->getMany();
    }
}
