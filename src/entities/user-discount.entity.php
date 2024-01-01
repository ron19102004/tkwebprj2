<?php 
class UserDiscount {
    public $id;
    public $id_discount;
    public $id_user;
    public $deleted;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'user_discounts';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'id_discount, id_user, deleted, id';


    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'id_discount' => $this->id_discount,
            'id_user' => $this->id_user,
            'deleted' => $this->deleted,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'id_discount' => $this->id_discount,
            'id_user' => $this->id_user,
            'deleted' => $this->deleted,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate() {
        return [
            'id_discount' => $this->id_discount,
            'id_user' => $this->id_user,
            'deleted' => $this->deleted,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data) {
        $this->id = $data['id'];
        $this->id_discount = $data['id_discount'];
        $this->id_user = $data['id_user'];
        $this->deleted = $data['deleted'];
    }
}
