<?php

class CommentService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository(Comment::ENTITY_NAME, Comment::FILLABLE);
    }

    public function findByIdProduct($id){
        return DB::select(Comment::FILLABLE.', users.avatar, users.firstName, users.lastName')
        ->from(Comment::ENTITY_NAME)
        ->join('users', 'users.id = comments.id_user')
        ->where('comments.id_product','=', $id,'product_id')
        ->groupBy('comments.id DESC')
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
