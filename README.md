# BÀI TẬP LỚN WEB - PHP BASE - TAILWINDCSS - FLOWBITE - JQUERY - DB CUSTOM

## START

-RUN FILE: src/migrations/exec.migration.php -> TURN UP
-RUN FILE: index.php

## NOTE

-RUN WITH

## HOW USE

```php
<?php
// Lấy một bản ghi từ bảng 'colors' với id là 1
$test1 = DB::select('*')
    ->from('colors')
    ->where('id', '=', 1)
    ->getOne();

// Cập nhật giá trị của cột 'value' trong bảng 'colors' với id là 1
DB::update('colors')
    ->set('value', '#fff')
    ->where('id', '=', 1)
    ->execute();

// Thực hiện một truy vấn join giữa hai bảng 'products' và 'categories'
$test2 = DB::select('*')
    ->from('products')
    ->join('categories', 'categories.id = products.category_id')
    ->getMany();

// Thực hiện một truy vấn phức tạp với GROUP BY, LIMIT và OFFSET
$test3 = DB::select('*')
    ->from('products')
    ->join('categories', 'categories.id = products.category_id')
    ->groupBy('products.id')
    ->take(10)
    ->skip(0)
    ->getMany();
?>
```
