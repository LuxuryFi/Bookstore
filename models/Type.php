<?php
require_once "models/Model.php";

class type extends Model
{
    private $id;
    private $title;
    private $description;
    private $created_at;
    private $updated_at;
    private $status;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }


    public $str_search = '';
     
    function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND title LIKE '%{$_GET['title']}%'";
        }
    }


    public function create()
    {
        $sql_insert = "INSERT INTO types (title,`description`,`status`) VALUES (:title, :description, :status); ";

        $arr_insert = [
            ':title' => $this->title,
            ':description' => $this->description,
            ':status' => $this->status
        ];

        $obj_insert = $this->connection->prepare($sql_insert);

        $is_insert = $obj_insert->execute($arr_insert);

        return $is_insert;
    }




    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) from types WHERE TRUE $this->str_search;");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    public function getAllPagination($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];

        $start = ($page - 1) * $limit;

        $sql_select = "SELECT * FROM types WHERE TRUE $this->str_search LIMIT $start,$limit;";

        $obj_select = $this->connection->prepare($sql_select);

        $obj_select->execute();

        $types = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $types;
    }

    public function deleteOne()
    {
        $sql_delete = "DELETE FROM types WHERE id = :id";

        $arr_delete = [
            ':id' => $this->id
        ];

        $obj_delete = $this->connection->prepare($sql_delete);

        $is_delete = $obj_delete->execute($arr_delete);

        return $is_delete;
    }

    public function getOne()
    {
        $sql_select_one = "SELECT * FROM types WHERE id = :id";
        $arr_select = [
            ':id' => $this->id
        ];

        $obj_select = $this->connection->prepare($sql_select_one);

        $obj_select->execute($arr_select);

        $type = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $type;
    }


    public function getAll(){
        $sql_select_all = "SELECT * FROM types";

        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();

        $types = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        return $types;
    }

    public function updateOne()
    {
        $sql_update_one = "UPDATE types SET 
        title = :title,
        description = :description,
        status = :status,
        updated_at = :updated_at
        WHERE id = :id";

        $arr_update = [
            ':title'         => $this->title,
            ':description'   => $this->description,
            ':status'        => $this->status,
            ':updated_at'    => $this->updated_at,
            ':id'            => $this->id
        ];

        $obj_update = $this->connection->prepare($sql_update_one);

        $is_update = $obj_update->execute($arr_update);

        return $is_update;
    }
}
