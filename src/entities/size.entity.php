<?php
class Size 
{
    public $id;
    public $name;
    public $value;
    public $deleted;

    const ENTITY_NAME = 'sizes';
    const FILLABLE = 'name, value';

    public function import_form($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
    public function importDb($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->value = $data['value'];
        $this->deleted = $data['deleted'];
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
