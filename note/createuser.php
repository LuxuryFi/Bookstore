CREATE TABLE users 
(
    username varchar(255) primary key,
    password varchar(255) not null,
    avatar text,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255),
    phone varchar(255),
    address varchar(255),
    created_at timestamp default current_timestamp,
    updated_at datetime,
    last_login datetime 
);


CREATE TABLE carts (
    id int(11) primary key auto_increment,
    username varchar(255),
    product_id int(11),
    quantity int(11),
    created_at
);
    
