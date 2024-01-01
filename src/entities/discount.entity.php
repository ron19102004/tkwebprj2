<?php 
class Discount {
    public $id;
    public $code;
    public $value;
    public $start_time;
    public $end_time;
    public $deleted;
    public $id_category;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'discounts';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'code, value, start_time, end_time, deleted, id_category, id';


    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'value' => $this->value,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'deleted' => $this->deleted,
            'id_category' => $this->id_category,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'code' => $this->code,
            'value' => $this->value,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'deleted' => $this->deleted,
            'id_category' => $this->id_category,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate() {
        return [
            'code' => $this->code,
            'value' => $this->value,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'deleted' => $this->deleted,
            'id_category' => $this->id_category,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data) {
        $this->id = $data['id'];
        $this->code = $data['code'];
        $this->value = $data['value'];
        $this->start_time = $data['start_time'];
        $this->end_time = $data['end_time'];
        $this->deleted = $data['deleted'];
        $this->id_category = $data['id_category'];
    }
}