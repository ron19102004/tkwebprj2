<?php 
class QuantityOut {
    public $id;
    public $id_product;
    public $value;
    public $date;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'quantity_out';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'id_product, value, date, id';

    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'id_product' => $this->id_product,
            'value' => $this->value,
            'date' => $this->date,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'id_product' => $this->id_product,
            'value' => $this->value,
            'date' => $this->date,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data) {
        $this->id = $data['id'];
        $this->id_product = $data['id_product'];
        $this->value = $data['value'];
        $this->date = $data['date'];
    }
}
