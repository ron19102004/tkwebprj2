<?php
function color_table($method)
{
    $sql = '';
    if ($method == TABLE_DB::UP) {
        $sql = 'CREATE TABLE colors (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) not null,
            value VARCHAR(255) not null,
            deleted BOOLEAN default FALSE
        );
        ';
    } else if (
        $method == TABLE_DB::DOWN
    ) {
        $sql = 'DROP TABLE colors';
    } else {
        $sql = "
        INSERT INTO colors (name, value)
        VALUES
        ('Xanh', '#00ff00'),   -- Màu xanh
        ('Đỏ', '#ff0000'),     -- Màu đỏ
        ('Tím', '#800080');     -- Màu tím
      
        ";
    }
    DB::query($sql);
}
function user_table($method)
{
    $sql = '';
    if ($method == TABLE_DB::UP) {
        $sql = "CREATE TABLE users(
            id bigint PRIMARY KEY AUTO_INCREMENT,
            firstName varchar(255) NOT null,
            lastName varchar(255) NOT null,
            phoneNumber varchar(255) not null,
            email varchar(255) not null,
            password varchar(255) not null,
            address text null,
            vip boolean DEFAULT false,
            deleted boolean DEFAULT false,
            avatar text null,
            role ENUM('user','admin') DEFAULT 'user'
        );
        ";
    } else if (
        $method == TABLE_DB::DOWN
    ) {
        $sql = 'DROP TABLE users';
    } else {
        $sql = "INSERT INTO users (firstName, lastName, phoneNumber, email, address, vip, avatar, role, password)
        VALUES
        ('John', 'Doe', '123456789', 'john@example.com', '123 Main Street', true, 'avatar1.jpg', 'user', 'hashed_password_1'),
        ('Jane', 'Smith', '987654321', 'jane@example.com', '456 Side Street', false, 'avatar2.jpg', 'user', 'hashed_password_2'),
        ('Alice', 'Johnson', '555123456', 'alice@example.com', '789 Back Street', true, 'avatar3.jpg', 'admin', 'hashed_password_3'),
        ('Bob', 'Williams', '111222333', 'bob@example.com', '321 Side Street', false, 'avatar4.jpg', 'user', 'hashed_password_4'),
        ('Eva', 'Miller', '999888777', 'eva@example.com', '567 Main Street', true, 'avatar5.jpg', 'admin', 'hashed_password_5');
        ";
    }
    DB::query($sql);
}
