<?php 
class Comment {
    public $id;
    public $id_user;
    public $id_product;
    public $judge;
    public $content;
    public $deleted;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'comments';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'id_user, id_product, judge, content, deleted, id';


    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_product' => $this->id_product,
            'judge' => $this->judge,
            'content' => $this->content,
            'deleted' => $this->deleted,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'id_user' => $this->id_user,
            'id_product' => $this->id_product,
            'judge' => $this->judge,
            'content' => $this->content,
            'deleted' => $this->deleted,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate() {
        return [
            'judge' => $this->judge,
            'content' => $this->content,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data) {
        $this->id = $data['id'];
        $this->id_user = $data['id_user'];
        $this->id_product = $data['id_product'];
        $this->judge = $data['judge'];
        $this->content = $data['content'];
        $this->deleted = $data['deleted'];
    }
}
