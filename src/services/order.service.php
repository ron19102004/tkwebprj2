<?php

class OrderService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository(Order::ENTITY_NAME, Order::FILLABLE);
    }
    public function findForFinished($id)
    {
        return DB::select(
            Order::FILLABLE
        )
            ->from(Order::ENTITY_NAME)
            ->where('finished', '=', 'FALSE')
            ->andWhere('id', '=', $id)
            ->getOne();
    }
    public function findAllForAdmin()
    {
        return DB::select(
            Order::FILLABLE . ',carts.id_color,carts.id_size,carts.quantity,carts.id_user,ships.address,ships.phoneNumber,products.name as product_name,brands.name as brand_name,products.avatar,products.id as id_product '
        )
            ->from(Order::ENTITY_NAME)
            ->join('carts', 'carts.id = orders.id_cart')
            ->join('products', 'products.id = carts.id_product')
            ->join('brands', 'brands.id = products.id_brand')
            ->join('ships', 'ships.id = orders.id_ship')
            // ->where('orders.finished', '=', 'FALSE', 'order_finished')
            ->groupBy('orders.id DESC')
            ->getMany();
    }
    public function findByIdUserAndOrderFinished($id)
    {
        return DB::select(
            Order::FILLABLE . ',carts.id_color,carts.id_size,carts.quantity,carts.id_user,ships.address,ships.phoneNumber,products.name as product_name,brands.name as brand_name,products.avatar '
        )
            ->from(Order::ENTITY_NAME)
            ->join('carts', 'carts.id = orders.id_cart')
            ->join('products', 'products.id = carts.id_product')
            ->join('brands', 'brands.id = products.id_brand')
            ->join('ships', 'ships.id = orders.id_ship')
            ->where('orders.finished', '=', '1', 'order_finished')
            ->andWhere('ships.id_user', '=', $id, 'id_user')
            ->getMany();
    }
    public function findByIdOrder($id)
    {
        return DB::select(
            Order::FILLABLE . ',carts.id_color,carts.id_size,carts.quantity,carts.id_user,ships.address,ships.phoneNumber,products.name as product_name,brands.name as brand_name,products.avatar '
        )
            ->from(Order::ENTITY_NAME)
            ->join('carts', 'carts.id = orders.id_cart')
            ->join('products', 'products.id = carts.id_product')
            ->join('brands', 'brands.id = products.id_brand')
            ->join('ships', 'ships.id = orders.id_ship')
            ->andWhere('orders.id', '=', $id, 'id_order')
            ->getOne();
    }
    public function findByIdUser($id)
    {
        return DB::select(
            Order::FILLABLE . ',carts.id_color,carts.id_size,carts.quantity,carts.id_user,ships.address,ships.phoneNumber,products.name as product_name,brands.name as brand_name,products.avatar '
        )
            ->from(Order::ENTITY_NAME)
            ->join('carts', 'carts.id = orders.id_cart')
            ->join('products', 'products.id = carts.id_product')
            ->join('brands', 'brands.id = products.id_brand')
            ->join('ships', 'ships.id = orders.id_ship')
            ->where('orders.finished', '=', '0', 'order_finished')
            ->andWhere('carts.id_user', '=', $id, 'id_user')
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
    public function findByIdCart($id)
    {
        return $this->repository->find()
            ->where('id_cart', '=', $id)
            ->andWhere('finished', '=', 'FALSE')
            ->getOne();
    }
    public function findById($entity_id)
    {
        return $this->repository->findById($entity_id);
    }
}
