<?php
class Comment
{
    public $id;
    public $id_user;
    public $id_product;
    public $content;
    public $deleted;
    public $time;
    public $id_comment_reply;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'comments';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = 'comments.id_comment_reply,comments.time,comments.id_user, comments.id_product, comments.content, comments.deleted, comments.id';


    // Chuyển đối đối tượng thành mảng
    public function toArray()
    {
        return [
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_product' => $this->id_product,
            'content' => $this->content,
            'deleted' => $this->deleted,
            'time' => $this->time,
            'id_comment_reply' => $this->id_comment_reply,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave()
    {
        return [
            'id_user' => $this->id_user,
            'id_product' => $this->id_product,
            'content' => $this->content,
            'id_comment_reply' => $this->id_comment_reply,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate()
    {
        return [
            'content' => $this->content,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data)
    {
        $this->id = $data['id'];
        $this->id_user = $data['id_user'];
        $this->id_product = $data['id_product'];
        $this->content = $data['content'];
        $this->deleted = $data['deleted'];
        $this->time = $data['time'];
        $this->id_comment_reply = $data['id_comment_reply'];
    }
}
