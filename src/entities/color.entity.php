<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/ibase.entity.php");

class Color implements IEntityBase
{
    public $id;
    private $name;
    private $value;
    private $deleted;

    const ENTITY_NAME = 'colors';
    const FILLABLE = 'name, value';

    public function import_form($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
    public function importdb($id, $name, $value, $deleted = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->deleted = $deleted;
    }

    public function __construct()
    {
    }
    public function toArrayUpdate()
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
            'deleted' => $this->deleted,
        ];
    }
    public function toArraySave()
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->value,
            'deleted' => $this->deleted,
        ];
    }
}
