<?php
require_once "models/Model.php";


class Author extends Model {

    private $id;
    private $avatar;
    private $title;
    private $description;
    private $created_at;
    private $updated_at;
    private $status;

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

    public function getCreated_at(){
        return $this->created_at;
    }
    public function getUpdated_at(){
        return $this->updated_at;
    }

    public function getStatus(){
        return $this->status;
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
        
        $sql_insert = "INSERT INTO authors (title,`description`,avatar,`status`) VALUES (:title,:description,:avatar,:status);";

        $arr_insert = [
            ':title' => $this->title,
            ':description' => $this->description,
            ':avatar' => $this->avatar,
            ':status' => $this->status
        ];

        $obj_insert = $this->connection->prepare($sql_insert);

        $is_insert = $obj_insert->execute($arr_insert);

        if ($is_insert){
            return $is_insert;
        }
    }


    public function getAllPagination($params){
       
        $page = $params['page'];
        $limit = $params['limit']; 
        $start = ($page - 1) * $limit;
        $sql_select_all = "SELECT * FROM authors WHERE TRUE $this->str_search LIMIT $start, $limit";

        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();

        $authors = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        
        return $authors;
    }

    public function countTotal(){
        $obj_select_all = $this->connection->prepare("SELECT COUNT(id) FROM authors WHERE TRUE $this->str_search");
        $obj_select_all->execute();
        return $obj_select_all->fetchColumn();
    }


    public function deleteOne(){
        $sql_delete_one = "DELETE FROM authors WHERE id = :id";

        $arr_delete = [
            ':id' => $this->id
        ];

        $obj_delete_one = $this->connection->prepare($sql_delete_one);

        $is_delete = $obj_delete_one->execute($arr_delete);

        return $is_delete;
    }
    
    public function getOne(){
        $sql_select_one = "SELECT * FROM authors WHERE id = :id;";

        $arr_select_one = [
            ':id' => $this->id
        ];

        $obj_select_one = $this->connection->prepare($sql_select_one);

        $obj_select_one->execute($arr_select_one);

        $author = $obj_select_one->fetch(PDO::FETCH_ASSOC);

        return $author;
        
    }

    public function getAll(){
        $sql_select_all = "SELECT * FROM authors";

        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();

        $authors = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        return $authors;
    }


    public function updateOne(){
        $sql_update_one = "UPDATE authors SET 
                                            title = :title,
                                            avatar = :avatar,
                                            `description` = :description,
                                            updated_at = :updated_at,
                                            `status` = :status 
                                    WHERE   id = :id;
                            ";

        $arr_update_one = [
            ':title'        => $this->title,
            ':description'  => $this->description,
            ':avatar'       => $this->avatar,
            ':updated_at'   => $this->updated_at,
            ':status'       => $this->status,
            ':id'           => $this->id
        ];

        $obj_update_one = $this->connection->prepare($sql_update_one);
        
        $is_update = $obj_update_one->execute($arr_update_one);

        return $is_update;
    }
}

?> 
