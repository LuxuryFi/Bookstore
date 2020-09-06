
create database if not exists project_bookstore;
use project_bookstore;

-- 2. types 
create table types 
(
	id int(11) auto_increment,
    title varchar(255) not null,
    description text,
	created_at timestamp default current_timestamp,
    updated_at  datetime,
    status bool,
    primary key (id)
);
-- 3. publisher 
create table publishers 
(
	id int(11) auto_increment,
    title varchar(255) not null,
    description text,
	created_at timestamp default current_timestamp,
    updated_at  datetime,
    status bool,
    primary key (id)
);
-- 4. suppliers 
create table suppliers 
(
	id int(11) auto_increment,
    title varchar(255) not null,
    description text,
    created_at timestamp default current_timestamp,
    updated_at   datetime,
    status bool,
    primary key (id)
);

-- 5.authors 
create table authors
(
	id int(11) auto_increment,
    name varchar(255) not null,
    avatar varchar(255),
    summary text,
    created_at timestamp default current_timestamp,
    updated_at   datetime,
    status bool,
    primary key (id)
);

-- 6. tags
create table tags
(
	id int(11) auto_increment,
    title varchar(255) not null,
    description text,
    created_at timestamp default current_timestamp,
    updated_at   datetime,
    status bool,
    primary key (id)
);

-- 7. categories 
create table categories 
(
	id int(11) auto_increment,
    title varchar(255) not null,
    avatar varchar(255) default 'none.jpg',
    parent_id int(11) not null,
    description text,
    created_at timestamp default current_timestamp,
    updated_at  datetime,
    status bool,
    primary key (id)
);
-- 1. product
  
create table products 
(
	id int(11) auto_increment,
	title varchar(255) not null,
	avatar varchar(255),
	price int(11),
	amount int(11) default 0,
	summary text,
    content text comment 'full description',
    author_id int,
    publisher_id int,
    supplier_id int,
    type_id int,
    created_at timestamp default current_timestamp,
    updated_at  datetime,
    status bool,
    seo_titlle varchar(255),
    seo_description varchar(255),
    seo_keywords varchar(255),
    primary key (id),
    constraint fk_product_author foreign key (author_id) references authors(id),
    constraint fk_product_publisher foreign key (publisher_id) references publishers(id),
    constraint fk_product_supplier foreign key (supplier_id) references suppliers(id),
    constraint fk_product_type foreign key (type_id) references types(id)
);


-- 8.  Product's category
create table product_category 
(
	product_id int(11),
    category_id int(11),
    created_at timestamp default current_timestamp,
    primary key(product_id,category_id),
    foreign key (product_id) references products(id),
    foreign key (category_id) references categories(id)
);

-- 9. Product's tag

create table product_tag
(
	product_id int(11),
    tag_id int(11),
    created_at timestamp default current_timestamp,
    primary key(product_id,tag_id),
    constraint fk_product foreign key (product_id) references products(id),
    constraint fk_tag foreign key (tag_id) references tags(id)
);




