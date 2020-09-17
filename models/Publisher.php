 <?php 
require_once 'models/Model.php';

class Publisher extends Model {
    private $id;
    private $avatar;
    private $title;
    private $phone;
    private $country;
    private $address;
    private $email;
    private $description;
    private $status;
    private $created_at;
    private $updated_at;

    public function getId(){
        return $this->id;
    }

    public function getCountry(){
        return $this->country;
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

    public function getPhone(){
        return $this->phone;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getEmail(){
        return $this->email;
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

    public function setCountry($country){
        $this->country = $country;
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

    public function setParent_id($parent_id){
        $this->parent_id = $parent_id;
    }

    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }

    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setUpdated_at($updated_at){
        $this->updated_at = $updated_at;
    }

    public function insert(){
        $sql_insert = "INSERT INTO publishers (title,avatar,`description`,phone,`address`,email,status,country)
        VALUES (:title,:avatar,:description,:phone,:address,:email,:status,:country);";

        $arr_insert = [
            ':title'        => $this->title,
            ':avatar'       => $this->avatar,
            ':description'  => $this->description,
            ':phone'        => $this->phone,
            ':address'      => $this->address,
            ':email'        => $this->email,
            ':status'       => $this->status,
            ':country'      => $this->country
        ];

        $obj_insert = $this->connection->prepare($sql_insert);

        $is_insert = $obj_insert->execute($arr_insert);

        return $is_insert;
    }



    public function getOne(){
        $sql_get_one = "SELECT * FROM publishers WHERE id = :id";

        $arr_get_one = [
            ':id' => $this->id
        ];

        $obj_get_one = $this->connection->prepare($sql_get_one);

        $obj_get_one->execute($arr_get_one);

        $publisher = $obj_get_one->fetch(PDO::FETCH_ASSOC);

        return $publisher;
    }

    public function getAll(){
        $sql_select_all = "SELECT * FROM publishers";

        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();

        $publishers = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        return $publishers;
    }

    
    public function deleteOne(){
        $sql_delete_one = "DELETE FROM publishers WHERE id = :id";

        $arr_delete_one = [
            ':id' => $this->id
        ];

        $obj_delete_one = $this->connection->prepare($sql_delete_one);

        $is_delete = $obj_delete_one->execute($arr_delete_one);

        return $is_delete;

    }

    public function updateOne(){
        $sql_update_one = "UPDATE publishers 
        SET title          = :title,
            avatar         = :avatar,
            `description`  = :description,
            `status`       = :status,
            phone          = :phone,
            email          = :email,
            `address`      = :address,
            updated_at     = :updated_at,
            country        = :country
        WHERE id           = :id;   ";

        $arr_update_one = [
            ':title'        => $this->title,
            ':avatar'       => $this->avatar,
            ':description'  => $this->description,
            ':phone'        => $this->phone,
            ':address'      => $this->address,
            ':email'        => $this->email,
            ':status'       => $this->status,
            ':updated_at'   => $this->updated_at,
            ':country'      => $this->country,
            ':id'           => $this->id
        ];

        $obj_update_one = $this->connection->prepare($sql_update_one);

        $is_update = $obj_update_one->execute($arr_update_one);

        return $is_update;

    }

    public function getAllPagination($params){
        $limit = $params['limit'];
        $page = $params['page'];

        $start = ($page - 1) * $limit;

        $sql_select = "SELECT * FROM publishers LIMIT $start,$limit";

        $obj_select = $this->connection->prepare($sql_select);

        $obj_select->execute();

        $publishers = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $publishers;
    }

    public function countTotal(){
        $sql_get_count = "SELECT COUNT(id) FROM publishers";

        $obj_get_count = $this->connection->prepare($sql_get_count);
        
        $obj_get_count->execute();

        return $obj_get_count->fetchColumn();
    }

}

?>
