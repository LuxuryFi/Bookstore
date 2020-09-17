<?php
require_once 'models/Model.php';

class Product_tag extends Model {
    private $product_id;
    private $tag_id;
    private $created_at;

    public function setProduct_id($product_id){
        $this->product_id = $product_id;
    }

    public function setTag_id($tag_id){
        $this->tag_id = $tag_id;
    }

    public function getCreated_at(){
        return $this->created_at;
    }

    public function insert(){
        $sql_insert = "INSERT INTO product_tag (product_id,tag_id) VALUES (:product_id, :tag_id);";
        $obj_insert = $this->connection->prepare($sql_insert);

        foreach ($this->tag_id as $tagid) {
            $arr_insert = [
                ':product_id' => $this->product_id,
                ':tag_id' => $tagid
            ];

            $is_insert = $obj_insert->execute($arr_insert);
        }

        return true;
    }
}


?>
