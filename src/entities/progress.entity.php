<?php 
class Progress {
    public $id;
    public $time;
    public $content;
    public $id_order;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'progress';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'time, content, id_order, id';

   

    // Chuyển đối đối tượng thành mảng
    public function toArray() {
        return [
            'id' => $this->id,
            'time' => $this->time,
            'content' => $this->content,
            'id_order' => $this->id_order,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave() {
        return [
            'content' => $this->content,
            'id_order' => $this->id_order,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate() {
        return [
            'content' => $this->content,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data) {
        $this->id = $data['id'];
        $this->time = $data['time'];
        $this->content = $data['content'];
        $this->id_order = $data['id_order'];
    }
}