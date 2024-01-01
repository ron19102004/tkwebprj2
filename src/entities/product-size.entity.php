<?php 
class ProductSize {
    public $id;
    public $deleted;
    public $id_size;
    public $id_product;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'products_sizes';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'deleted, id_size, id_product, id';


    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'deleted' => $this->deleted,
            'id_size' => $this->id_size,
            'id_product' => $this->id_product,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'deleted' => $this->deleted,
            'id_size' => $this->id_size,
            'id_product' => $this->id_product,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate() {
        return [
            'deleted' => $this->deleted,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data) {
        $this->id = $data['id'];
        $this->deleted = $data['deleted'];
        $this->id_size = $data['id_size'];
        $this->id_product = $data['id_product'];
    }
}