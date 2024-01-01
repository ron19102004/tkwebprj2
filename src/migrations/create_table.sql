CREATE TABLE
    if NOT EXISTS users(
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
        role ENUM('user', 'admin') DEFAULT 'user'
    );

CREATE TABLE
    if NOT EXISTS ships (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        address VARCHAR(255) NOT NULL,
        phoneNumber VARCHAR(20) NOT NULL,
        id_user BIGINT,
        FOREIGN KEY (id_user) REFERENCES users(id)
    );

CREATE TABLE
    if NOT EXISTS colors (
        id bigint AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) not null,
        value VARCHAR(255) not null,
        deleted BOOLEAN default FALSE
    );

CREATE TABLE
    if NOT EXISTS sizes (
        id bigint AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) not null,
        value VARCHAR(255) not null,
        deleted BOOLEAN default FALSE
    );

CREATE TABLE
    if NOT EXISTS brands (
        id bigint PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        avatar VARCHAR(255),
        deleted BOOLEAN DEFAULT FALSE
    );

CREATE TABLE
    if NOT EXISTS categories (
        id bigint PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        image VARCHAR(255),
        deleted BOOLEAN DEFAULT FALSE
    );

CREATE TABLE
    if NOT EXISTS products (
        id bigint PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        warranty_policy TEXT,
        price BIGINT NOT NULL,
        discount BIGINT DEFAULT 0,
        discount_start DATETIME,
        discount_end DATETIME,
        id_brand bigint,
        id_category bigint,
        deleted BOOLEAN DEFAULT FALSE,
        FOREIGN KEY (id_brand) REFERENCES brands(id),
        FOREIGN KEY (id_category) REFERENCES categories(id)
    );

CREATE TABLE
    if NOT EXISTS products_images (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        image TEXT NOT NULL,
        deleted BOOLEAN DEFAULT FALSE,
        id_product BIGINT,
        FOREIGN KEY (id_product) REFERENCES products(id)
    );

CREATE TABLE
    if NOT EXISTS products_colors (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        deleted BOOLEAN DEFAULT FALSE,
        id_color BIGINT,
        id_product BIGINT,
        FOREIGN KEY (id_color) REFERENCES colors(id),
        FOREIGN KEY (id_product) REFERENCES products(id)
    );

CREATE TABLE
    if NOT EXISTS products_sizes (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        deleted BOOLEAN DEFAULT FALSE,
        id_size BIGINT,
        id_product BIGINT,
        FOREIGN KEY (id_size) REFERENCES sizes(id),
        FOREIGN KEY (id_product) REFERENCES products(id)
    );

CREATE TABLE
    if NOT EXISTS discounts (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        code VARCHAR(255) UNIQUE NOT NULL,
        value BIGINT NOT NULL,
        start_time DATETIME NOT NULL,
        end_time DATETIME NOT NULL,
        deleted BOOLEAN DEFAULT FALSE,
        id_category BIGINT,
        FOREIGN KEY (id_category) REFERENCES categories(id)
    );

CREATE TABLE
    if NOT EXISTS user_discounts (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        id_discount BIGINT,
        id_user BIGINT,
        deleted BOOLEAN DEFAULT FALSE,
        FOREIGN KEY (id_discount) REFERENCES discounts(id),
        FOREIGN KEY (id_user) REFERENCES users(id)
    );

CREATE TABLE
    if NOT EXISTS comments (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        id_user BIGINT,
        id_product BIGINT,
        judge INT NOT NULL,
        content TEXT NOT NULL,
        deleted BOOLEAN DEFAULT FALSE,
        FOREIGN KEY (id_user) REFERENCES users(id),
        FOREIGN KEY (id_product) REFERENCES products(id)
    );

CREATE TABLE
    if NOT EXISTS carts (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        id_color BIGINT NOT NULL,
        id_size BIGINT NOT NULL,
        id_product BIGINT NOT NULL,
        id_user BIGINT NOT NULL,
        quantity int,
        finished BOOLEAN DEFAULT FALSE,
        deleted BOOLEAN DEFAULT FALSE,
        FOREIGN KEY (id_color) REFERENCES colors(id),
        FOREIGN KEY (id_size) REFERENCES sizes(id),
        FOREIGN KEY (id_product) REFERENCES products(id),
        FOREIGN KEY (id_user) REFERENCES users(id)
    );

CREATE TABLE
    if NOT EXISTS orders (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        finished BOOLEAN DEFAULT FALSE,
        id_discount BIGINT,
        id_ship BIGINT,
        id_cart BIGINT,
        FOREIGN KEY (id_ship) REFERENCES ships(id),
        FOREIGN KEY (id_cart) REFERENCES carts(id)
    );

CREATE TABLE
    if NOT EXISTS progress (
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        time DATETIME,
        content TEXT,
        id_order BIGINT,
        FOREIGN KEY (id_order) REFERENCES orders(id)
    );