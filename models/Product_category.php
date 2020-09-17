<?php
require_once 'models/Model.php';

class Product_category extends Model {
    private $product_id;
    private $category_id;
    private $created_at;

    public function setProduct_id($product_id){
        $this->product_id = $product_id;
    }

    public function setCategory_id($category_id){
        $this->category_id = $category_id;
    }

    public function getCreated_at(){
        return $this->created_at;
    }

    public function insert(){

        

        $sql_insert = "INSERT INTO product_category (product_id,category_id) VALUES (:product_id, :category_id);";

         $obj_insert = $this->connection->prepare($sql_insert);

        foreach ($this->category_id as $categoryid) {
            $arr_insert = [
                ':product_id' => $this->product_id,
                ':category_id' => $categoryid
            ];

            $is_insert = $obj_insert->execute($arr_insert);
        }
        
        return true;
    }
}


?>
