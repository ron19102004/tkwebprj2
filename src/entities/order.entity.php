<?php 
class Order {
    public $id;
    public $finished;
    public $id_discount;
    public $id_ship;
    public $id_cart;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'orders';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'orders.finished, orders.id_discount, orders.id_ship, orders.id_cart, orders.id';

    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'finished' => $this->finished,
            'id_discount' => $this->id_discount,
            'id_ship' => $this->id_ship,
            'id_cart' => $this->id_cart,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'id_discount' => $this->id_discount,
            'id_ship' => $this->id_ship,
            'id_cart' => $this->id_cart,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate() {
        return [
            'finished' => $this->finished,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data) {
        $this->id = $data['id'];
        $this->finished = $data['finished'];
        $this->id_discount = $data['id_discount'];
        $this->id_ship = $data['id_ship'];
        $this->id_cart = $data['id_cart'];
    }
}
