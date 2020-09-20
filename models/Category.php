<?php
require_once 'models/Model.php';

class Category extends Model {
    private $id;
    private $avatar;
    private $title;
    private $parent_id;
    private $description;
    private $status;
    private $created_at;
    private $updated_at;

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

    public function getParent_id(){
        return $this->parent_id;
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

    public function setUpdated_at($updated_at){
        $this->updated_at = $updated_at;
    }

    public function setParent_id($parent_id){
        $this->parent_id = $parent_id;
    }

    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }

    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }

    public $str_search = '';

    function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND title LIKE '%{$_GET['title']}%'";
        }
    }

    public function insert(){
        $sql_insert = "INSERT into categories (title, avatar,`description`, `status`, parent_id) 
        VALUES (:title,:avatar,:description,:status,:parent_id);";

        $object_insert = $this->connection->prepare($sql_insert);

        $arr_insert = [
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status,
            ':parent_id' => $this->parent_id
        ];

        $is_insert = $object_insert->execute($arr_insert);

        return $is_insert;
    }

    public function getAll(){
        $sql_select_all = "SELECT * FROM categories;";

        $object_select_all = $this->connection->prepare($sql_select_all);

        $object_select_all->execute();
        
        $categories = $object_select_all->fetchAll(PDO::FETCH_ASSOC);

        return $categories;

    }

    public function getAllPagination($params = []){
        $limit = $params['limit'];
        $page  = $params['page'];
        $start = ($page - 1) * $limit;
        $object_select = $this->connection->prepare("SELECT * FROM categories  WHERE TRUE $this->str_search LIMIT $start, $limit");

        $object_select->execute();

        $categories = $object_select->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

    public function countTotal(){
        $object_select = $this->connection->prepare("SELECT COUNT(id) FROM categories WHERE TRUE $this->str_search");
        $object_select->execute();

        return $object_select->fetchColumn();
    }

    public function getOne($id){
        $obj_select_one = $this->connection->prepare("SELECT * FROM categories WHERE id = :id;");
        
        $arr_select_one = [
            ':id' => $id
        ];

        $obj_select_one->execute($arr_select_one);

        $category = $obj_select_one->fetch(PDO::FETCH_ASSOC);

        return $category;
    }

    public function updateOne($id){
        $obj_update_one =  $this->connection->prepare("UPDATE categories
         SET title = :title,
             `description` = :description, 
             avatar = :avatar, 
             `status` = :status, 
             parent_id = :parent_id,
             updated_at = :updated_at
        WHERE id = :id;");

        $arr_update = [
            ':title' => $this->title,
            ':description' => $this->description,
            ':avatar' => $this->avatar,
            ':status' => $this->status,
            ':parent_id' => $this->parent_id,
            ':updated_at' => $this->updated_at,
            ':id' => $id  
        ];

        $is_update = $obj_update_one->execute($arr_update);

        return $is_update;

    }

    public function deleteOne($id){
        $sql_delete = "DELETE FROM categories WHERE id = :id";
        $arr_delete = [
            ':id' => $id
        ];

        $obj_delete = $this->connection->prepare($sql_delete);

        $is_delete = $obj_delete->execute($arr_delete);

        return $is_delete;  
    }
    

}


?>
