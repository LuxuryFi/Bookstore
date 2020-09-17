<?php

use function PHPSTORM_META\type;

require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Pagination.php';
require_once 'models/Publisher.php';
require_once 'models/Category.php';
require_once 'models/Supplier.php';
require_once 'models/Tag.php';
require_once 'models/Type.php';
require_once 'models/Author.php';
require_once 'models/Product_category.php';
require_once 'models/Product_tag.php';
require_once 'helpers/Helper.php';



class ProductController extends Controller {

    public function index() {



        $this->content = $this->render('views/products/index.php');

        require_once 'views/layouts/main.php';
    }


    public function create(){

        $publisher_model = new Publisher();
        $publishers = $publisher_model->getAll();
        $supplier_model = new Supplier();
        $suppliers = $supplier_model->getAll();
        $type_model = new Type();
        $types = $type_model->getAll();
        $author_model = new Author();
        $authors = $author_model->getAll();
        $categeory_model = new Category();
        $categories = $categeory_model->getAll();
        $tag_model = new Tag();
        $tags = $tag_model->getAll();
        

        if(isset($_POST['submit'])){
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";

            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";

            $avatar_file = $_FILES['avatar'];

            // foreach ($avatar['name'] as $img){
            //     echo $img . ' - ';
            // }
            
            $title = $_POST['title'];
            $price = isset($_POST['price']) ? $_POST['price'] : 0;
            $amount = isset($_POST['amount']) ? $_POST['amount'] : 0;
            $description = $_POST['description'];
            $content = $_POST['content'];
            $author_id = $_POST['author_id'];
            $publisher_id = $_POST['publisher_id'];
            $supplier_id = $_POST['supplier_id'];
            $type_id = $_POST['type_id'];
            $tag_id = $_POST['tag_id'];
            $category_id = $_POST['category_id'];
            $status = $_POST['status'];
            $seo_title = $_POST['seo_title'];
            $seo_description = $_POST['seo_description'];
            $seo_keywords = $_POST['seo_keywords'];
            
            if (empty($title)){
                $this->error = "Cần nhập tên sản phẩm";
            }
            else if (!is_numeric($price) || !is_numeric($amount)){
                $this->error = "Giá tiền hoặc số lượng phải là số";
            }

            if ($avatar_file['error'] == 0){

                foreach ($avatar_file['name'] as $avatar_name){
                    $extension = pathinfo($avatar_name,PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    $extensions[] = $extension;
                }

                $extension_array = ['jpg','png','jpge','gif'];
                
                foreach ($extensions as $extension){
                    if (!in_array($extension,$extension_array)){
                        $this->error = "Cần nhập đúng định dạng ảnh";
                    }
                }    
            }

            $avatar = '';

            if (empty($this->error)){
                if ($avatar_file['error'] == 0){
                    $dir_uploads = __DIR__ . '/../assets/uploads/product';

                    foreach($extensions as $extension){
                        $count = 1;
                        $avatar_item = time() . $title . $count . '.' . $extension;
                        $avatar_items[] = $avatar_item;
                        $count++;
                    }

                    for ($i = 0; $i < sizeof($avatar_items) ; $i++){
                        
                        move_uploaded_file($avatar_file['tmp_name'][$i], $dir_uploads . '/' . $avatar_items[$i]);
                        if ($i = 0){
                            $avatar .= $avatar_items[$i];
                        }
                        else {
                            $avatar .= '/' . $avatar_items[$i];
                        }
                    }
                }

                $product_model = new Product();

                $product_model->setTitle($title);
                $product_model->setAvatar($avatar);
                $product_model->setPrice($price);
                $product_model->setAmount($amount);
                $product_model->setDescription($description);
                $product_model->setContent($content);
                $product_model->setAuthor_id($author_id);
                $product_model->setType_id($type_id);
                $product_model->setPublisher_id($publisher_id);
                $product_model->setSupplier_id($supplier_id);
                $product_model->setSeo_decription($seo_description);
                $product_model->setSeo_title($seo_title);
                $product_model->setSeo_keywords($seo_keywords);
                $product_model->setStatus($status);

                $product_id = $product_model->insert();

                $product_tag_model = new Product_tag();
                $product_tag_model->setProduct_id($product_id);
                $product_tag_model->setTag_id($tag_id);
                $is_insert_1 = $product_tag_model->insert();
                
                $product_category_model = new Product_category();
                $product_category_model->setProduct_id($product_id);
                $product_category_model->setCategory_id($category_id);
                $is_insert_2 = $product_category_model->insert();



                if ($is_insert_1 && $is_insert_2){
                    $_SESSION['success'] = "Thêm sản phẩm thành công";
                    header("Location: index.php?controller=product");
                    exit();
                }
                else {
                    $_SESSION['error'] = "Thêm sản phẩm thất bại";
                }


            }

        }



        $this->content = $this->render('views/products/create.php',[
            'publishers'    => $publishers,
            'suppliers'     => $suppliers,
            'types'         => $types,
            'authors'       => $authors,
            'categories'    => $categories,
            'tags'          => $tags
        ]);

        require_once 'views/layouts/main.php';
    }
}



?> 