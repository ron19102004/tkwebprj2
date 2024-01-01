<?php
class Brand
{
    public $id;
    public $name;
    public $avatar;
    public $deleted;


    const ENTITY_NAME = 'brands';
    const FILLABLE = 'name, avatar , id, deleted';
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'avatar' => $this->avatar,
            'deleted' => $this->deleted,
        ];
    }

    public function toArraySave()
    {
        return [
            'name' => $this->name,
            'avatar' => $this->avatar,
            'deleted' => $this->deleted,
        ];
    }

    public function toArrayUpdate()
    {
        return [
            'name' => $this->name,
            'avatar' => $this->avatar,
        ];
    }

    public function importDb($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->avatar = $data['avatar'];
        $this->deleted = $data['deleted'];
    }
}
