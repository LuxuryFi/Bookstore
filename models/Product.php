<?php

require_once 'models/Model.php';

class Product extends Model {
    private $id;
    private $avatar;
    private $title;
    private $amount;
    private $price;
    private $content;
    private $author_id;
    private $publisher_id;
    private $supplier_id;
    private $type_id;
    private $description;
    private $status;
    private $created_at;
    private $updated_at;
    private $seo_title;
    private $seo_keywords;
    private $seo_description;


    public function getContent(){
        return $this->content;
    }

    public function getAuthor_id(){
        return $this->author_id;
    }

    public function getAmount(){
        return $this->amount;
    }


    public function getPrice(){
        return $this->price;
    }

    public function getPublisher_id(){
        return $this->supplier_id;
    }

    public function getSupplier_id(){
        return $this->type_id;
    }

    public function getType_id(){
        return $this->publisher_id;
    }


    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getAvatar(){
        return $this->avatar;
    }

    public function getDescription(){
        return $this->description;
    }


    public function getStatus(){
        return $this->status;
    }

    public function getCreated_at(){
        return $this->created_at;
    }
    public function getUpdated_at(){
        return $this->updated_at;
    }

    public function getSeo_title(){
        return $this->seo_title;
    }

    public function getSeo_description(){
        return $this->seo_description;
    }

    public function getSeo_keywords(){
        return $this->seo_keywords;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setStatus($status){
        $this->status = $status;
    }


    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }

    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }

    public function setUpdated_at($updated_at){
        $this->updated_at = $updated_at;
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function setAuthor_id($author_id){
        $this->author_id = $author_id;
    }

    public function setPublisher_id($publisher_id){
        $this->publisher_id = $publisher_id;
    }

    public function setSupplier_id($supplier_id){
        $this->supplier_id = $supplier_id;
    }

    public function setType_id($type_id){
        $this->type_id = $type_id;
    }
    
    public function setSeo_title($seo_title){
        $this->seo_title = $seo_title;
    }

    public function setSeo_decription($seo_description){
        $this->seo_description = $seo_description;
    }

    public function setSeo_keywords($seo_keywords){
        $this->seo_keywords = $seo_keywords;
    }


    public $str_search = '';

    function __construct()
    {
        parent::__construct();

        
    }


    public function getCount(){
        $sql_get_count = "SELECT count(id) FROM products WHERE TRUE $this->str_search;";

        $obj_get_count = $this->connection->prepare($sql_get_count);

        $obj_get_count->execute();

        $products = $obj_get_count->fetchColumn();

        return $products;
    }

    public function getAllPagination($params){
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;

        $sql_select = "SELECT * FROM products LIMIT $start,$limit";

        $obj_select = $this->connection->prepare($sql_select);

        $obj_select->execute();

        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function getOne(){

        $sql_select_one = "SELECT products.*, a.title as author_title, s.title as supplier_title, p.title as publisher_title FROM products 
        INNER JOIN authors a ON a.id = products.author_id
        INNER JOIN suppliers s ON s.id = products.supplier_id
        INNER JOIN publishers p ON p.id = products.publisher_id
        AND products.id = :id";

        $arr_select_one = [
            ':id' => $this->id
        ];

        $obj_select_one = $this->connection->prepare($sql_select_one);

        $obj_select_one->execute($arr_select_one);

        $product = $obj_select_one->fetch(PDO::FETCH_ASSOC);

        return $product;
    }


    public function insert(){
        $sql_insert = "INSERT INTO products (title,avatar,price,amount,`description`,content,author_id,
        publisher_id,supplier_id,`type_id`,`status`,seo_title,seo_description,seo_keywords)  VALUES 
        (:title,:avatar,:price,:amount,:description,:content,:author_id,
        :publisher_id,:supplier_id,:type_id,:status,:seo_title,:seo_description,:seo_keywords);";

        $arr_insert = [
            ':title'            => $this->title,
            ':avatar'           => $this->avatar,
            ':price'            => $this->price,
            ':amount'           => $this->amount,
            ':description'      => $this->description,
            ':content'          => $this->content,
            ':author_id'        => $this->author_id,
            ':publisher_id'     => $this->publisher_id,
            ':supplier_id'      => $this->supplier_id,
            ':type_id'          => $this->type_id,
            ':status'           => $this->status,
            ':seo_title'        => $this->seo_title,
            ':seo_description'  => $this->description,
            ':seo_keywords'     => $this->seo_keywords
        ];

        $obj_insert = $this->connection->prepare($sql_insert);

        $obj_insert->execute($arr_insert);

        $product_id =  $this->connection->lastInsertId();

        return $product_id;
    }


    


}

?>
