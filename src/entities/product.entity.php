<?php
class Product
{
    public $id;
    public $name;
    public $description;
    public $warranty_policy;
    public $price;
    public $discount;
    public $discount_start;
    public $discount_end;
    public $id_brand;
    public $id_category;
    public $deleted;
    public $available;
    public $avatar;

    // Thuộc tính mẫu cho tên bảng
    const ENTITY_NAME = 'products';

    // Thuộc tính mẫu cho các trường có thể điền giá trị
    const FILLABLE = '
    products.name, 
    products.description, 
    products.warranty_policy, 
    products.price, 
    products.discount, 
    products.discount_start, 
    products.discount_end, 
    products.id_brand, 
    products.id_category, 
    products.id, 
    products.deleted,
    products.available,
    products.avatar';

    // Chuyển đối đối tượng thành mảng
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'warranty_policy' => $this->warranty_policy,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_start' => $this->discount_start,
            'discount_end' => $this->discount_end,
            'id_brand' => $this->id_brand,
            'id_category' => $this->id_category,
            'deleted' => $this->deleted,
            'available'=> $this->available,
            'avatar' => $this->avatar,
        ];
    }

    // Chuyển đối đối tượng thành mảng để lưu vào cơ sở dữ liệu
    public function toArraySave()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'warranty_policy' => $this->warranty_policy,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_start' => $this->discount_start,
            'discount_end' => $this->discount_end,
            'id_brand' => $this->id_brand,
            'id_category' => $this->id_category,
            'deleted' => $this->deleted,
        ];
    }

    // Chuyển đối đối tượng thành mảng để cập nhật vào cơ sở dữ liệu
    public function toArrayUpdate()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'warranty_policy' => $this->warranty_policy,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_start' => $this->discount_start,
            'discount_end' => $this->discount_end,
            'id_brand' => $this->id_brand,
            'id_category' => $this->id_category,
            'deleted' => $this->deleted,
            'available'=> $this->available,
            'avatar' => $this->avatar,
        ];
    }

    // Hàm import từ mảng giống như constructor
    public function importDb($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->warranty_policy = $data['warranty_policy'];
        $this->price = $data['price'];
        $this->discount = $data['discount'];
        $this->discount_start = $data['discount_start'];
        $this->discount_end = $data['discount_end'];
        $this->id_brand = $data['id_brand'];
        $this->id_category = $data['id_category'];
        $this->deleted = $data['deleted'];
        $this->available = $data['available'];
        $this->avatar = $data['avatar'];
    }
}
