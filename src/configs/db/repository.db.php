<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/db.config.php");
class Repository
{
    private $entity_name;
    private $fillable;
    public function __construct($entity_name, $fillable)
    {
        $this->entity_name = $entity_name;
        $this->fillable = $fillable;
    }
    public function query($query)
    {
        return DB::query($query);
    }
    public  function find()
    {
        return DB::select($this->fillable)
            ->from($this->entity_name);
    }
    public  function findAll()
    {
        return DB::select($this->fillable)
            ->from($this->entity_name)
            ->getMany();
    }
    public  function findById($id)
    {
        return DB::select($this->fillable)
            ->from($this->entity_name)
            ->where('id', '=', $id)
            ->getOne();
    }
    public  function save($entity)
    {
        return DB::save($this->entity_name, $entity->toArraySave())->execute();
    }
    public  function delete($id)
    {
        return DB::delete($this->entity_name, $id)->execute();
    }
    public  function update($entity)
    {
        return DB::save_update($this->entity_name, $entity->id, $entity->toArrayUpdate())->execute();
    }
}
