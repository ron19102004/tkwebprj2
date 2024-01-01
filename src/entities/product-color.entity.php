<?php
class ProductColor {
    public $id;
    public $deleted;
    public $idColor;
    public $id_product;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'products_colors';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'deleted, idColor, id_product, id';



    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'deleted' => $this->deleted,
            'idColor' => $this->idColor,
            'id_product' => $this->id_product,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'deleted' => $this->deleted,
            'idColor' => $this->idColor,
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
        $this->idColor = $data['idColor'];
        $this->id_product = $data['id_product'];
    }
}