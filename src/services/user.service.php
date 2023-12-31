<?php

class UserService
{
    private $repository;
    public function __construct()
    {
        $this->repository = new Repository(User::ENTITY_NAME, User::FILLABLE);
    }
    public function findByEmail($email)
    {
        return $this->repository->find()
            ->where('email', '=', $email)
            ->getOne();
    }
    public function findByPhone($phoneNumber)
    {
        return $this->repository->find()
            ->where('phoneNumber', '=', $phoneNumber)
            ->getOne();
    }
    public function save($entity)
    {
        $byEmail = $this->findByEmail($entity->toArraySave()['email']);
        if($byEmail != null) throw new CustomException('Email đã tồn tại');
        $byPhone = $this->findByPhone($entity->toArraySave()['phoneNumber']);
        if($byPhone != null) throw new CustomException('Số điện thoại đã tồn tại');
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
