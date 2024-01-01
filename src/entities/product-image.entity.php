<?php 
class ProductImage {
    public $id;
    public $image;
    public $deleted;
    public $id_product;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'products_images';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'image, deleted, id_product, id';


    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'deleted' => $this->deleted,
            'id_product' => $this->id_product,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'image' => $this->image,
            'deleted' => $this->deleted,
            'id_product' => $this->id_product,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate() {
        return [
            'image' => $this->image,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data) {
        $this->id = $data['id'];
        $this->image = $data['image'];
        $this->deleted = $data['deleted'];
        $this->id_product = $data['id_product'];
    }
}
