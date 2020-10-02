<?php
    require_once 'models/Model.php';

    class User extends Model {
        private $username;
        private $password;
        private $avatar;
        private $lastname;
        private $firstname;
        private $phone;
        private $address;
        private $email;
        private $created_at;
        private $updated_at;
        private $last_login;
        

        public function getUsername(){
            return $this->username;
        }


        public function setUsername($username){
            $this->username = $username;
        }

        public function setAvatar($avatar){
            $this->avatar = $avatar;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function setLastname($lastname){
            $this->lastname = $lastname;
        }

        public function setFirstname($firstname){
            $this->firstname = $firstname;
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
            $sql_insert = "INSERT INTO users (username,`password`,avatar,firstname,lastname,email,phone,`address`)
            VALUES(:username,:password,:avatar,:firstname,:lastname,:email,:phone,:address)";

            $arr_insert = [
                ':username' => $this->username,
                ':password' => $this->password,
                ':avatar'   => $this->avatar,
                ':firstname'=> $this->firstname,
                ':lastname' => $this->lastname,
                ':email'    => $this->email,
                ':phone'    => $this->phone,
                ':address'  => $this->address
            ];

            $obj_insert = $this->connection->prepare($sql_insert);

            $is_insert = $obj_insert->execute($arr_insert);

            return $is_insert;
        }
        
        public function countTotal(){
            $sql_select_count = "SELECT count(username) from users";

            $obj_select_count = $this->connection->prepare($sql_select_count);

            $obj_select_count->execute();

            return $obj_select_count->fetchColumn();
        }

        public function deleteOne(){
            $sql_delete_one = "DELETE FROM users WHERE username = :username";

            $arr_delete_one = [
                ':username' => $this->username
            ];

            $obj_delete_one = $this->connection->prepare($sql_delete_one);

            $is_delete = $obj_delete_one->execute($arr_delete_one);

            return $is_delete;
        }

        public function getOne(){
            $sql_select_one = "SELECT * FROM users WHERE username = :username";

            $arr_select_one = [
                ':username' => $this->username
            ];

            $obj_select_one = $this->connection->prepare($sql_select_one);

            $obj_select_one->execute($arr_select_one);

            $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);

            return $user;
        }

        public function loginCheck(){
            $sql_select_one = "SELECT * FROM users WHERE username = :username AND `password` = :password";

            $arr_select_one = [
                ':username' => $this->username,
                ':password' => $this->password
            ];

            $obj_select_one = $this->connection->prepare($sql_select_one);

            $obj_select_one->execute($arr_select_one);

            $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);

            return $user;
        }

        public function getAllPagination($params){
            $limit = $params['limit'];
            $page = $params['page'];
            $start = ($page - 1) * $limit;

            $sql_select_all = "SELECT * FROM users WHERE TRUE LIMIT $start, $limit ";

            $obj_select_all = $this->connection->prepare($sql_select_all);

            $obj_select_all->execute();

            $users = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        }

        public function updateOne(){
            $sql_update_one = "UPDATE users SET 
                                                `password` = :password,
                                                lastname   = :lastname,
                                                firstname  = :firstname,
                                                email      = :email,
                                                phone      = :phone,
                                                `address`  = :address,
                                                avatar     = :avatar,
                                                updated_at = :updated_at
                                          WHERE username   = :username;";
            $arr_update_one = [
                ':password'     => $this->password,
                ':lastname'     => $this->lastname,
                ':firstname'    => $this->firstname,
                ':email'        => $this->email,
                ':phone'        => $this->phone,
                ':address'      => $this->address,
                ':avatar'       => $this->avatar,
                ':updated_at'   => $this->updated_at,
                ':username'     => $this->username
            ];

            $obj_update_one = $this->connection->prepare($sql_update_one);

            $is_update = $obj_update_one->execute($arr_update_one);

            return $is_update;
        }
    }
?>
