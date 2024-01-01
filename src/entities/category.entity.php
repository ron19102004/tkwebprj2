<?php 
class Category {
    public $id;
    public $name;
    public $image;
    public $deleted;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'categories';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'name, image, id, deleted';


    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'deleted' => $this->deleted,
        ];
    }

    public function toArraySave() {
        return [
            'name' => $this->name,
            'image' => $this->image,
            'deleted' => $this->deleted,
        ];
    }

    public function toArrayUpdate() {
        return [
            'name' => $this->name,
            'image' => $this->image,
        ];
    }

    public function importDb($data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->image = $data['image'];
        $this->deleted = $data['deleted'];
    }
}