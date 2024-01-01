<?php 
class Cart {
    public $id;
    public $id_color;
    public $id_size;
    public $id_product;
    public $id_user;
    public $quantity;
    public $finished;
    public $deleted;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'carts';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'id_color, id_size, id_product, id_user, quantity, finished, deleted, id';

    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'id_color' => $this->id_color,
            'id_size' => $this->id_size,
            'id_product' => $this->id_product,
            'id_user' => $this->id_user,
            'quantity' => $this->quantity,
            'finished' => $this->finished,
            'deleted' => $this->deleted,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'id_color' => $this->id_color,
            'id_size' => $this->id_size,
            'id_product' => $this->id_product,
            'id_user' => $this->id_user,
            'quantity' => $this->quantity,
            'finished' => $this->finished,
            'deleted' => $this->deleted,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate() {
        return [
            'quantity' => $this->quantity,
            'finished' => $this->finished,
            'deleted' => $this->deleted,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data) {
        $this->id = $data['id'];
        $this->id_color = $data['id_color'];
        $this->id_size = $data['id_size'];
        $this->id_product = $data['id_product'];
        $this->id_user = $data['id_user'];
        $this->quantity = $data['quantity'];
        $this->finished = $data['finished'];
        $this->deleted = $data['deleted'];
    }
}