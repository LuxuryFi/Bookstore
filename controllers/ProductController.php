<?php

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

class ProductController extends Controller
{
    public function index()
    {

        $product_model = new Product();

        $count_total = $product_model->getCount();


        $query_additional = '';
        if (isset($_GET['title'])) {
            $query_additional .= '&title=' . $_GET['title'];
        }
        if (isset($_GET['product_id'])) {
            $query_additional .= '$product_id=' . $_GET['product_id'];
        }

        $params = [
            'limit'         => 10,
            'total'         => $count_total,
            'action'        => 'index',
            'controller'    => 'product',
            'query_string'  => 'page',
            'page'          => isset($_GET['page']) ? $_GET['page'] : 1,
            'full_mode'     => FALSE
        ];

        $pagination = new Pagination($params);

        $pages = $pagination->getPagination();



        $products = $product_model->getAllPagination($params);

        $this->content = $this->render('views/admin/products/index.php', [
            'pages'     => $pages,
            'products'  => $products
        ]);

        require_once 'views/admin/layouts/main.php';
    }


    public function update()
    {
        $product_model = new Product();

        $product_id = $_GET['id'];
        $product_model->setId($product_id);

        $product = $product_model->getOne();

        $product_tag_model = new Product_tag();
        $product_tag_model->setProduct_id($product_id);
        $checked_tags = $product_tag_model->getAllTag();

        $product_category_model = new Product_category();
        $product_category_model->setProduct_id($product_id);
        $checked_categories = array_map(function($item) {
            return $item['id'];
        }, $product_category_model->getAllCategory());
        //Helper::dd($product_category_model->getAllCategory());
        

        $tag_model = new Tag();
        $tags = $tag_model->getAll();

        $category_model = new Category();
        $categories = $category_model->getAll();

        $author_model = new Author();
        $authors = $author_model->getAll();

        $publisher_model = new Publisher();
        $publishers = $publisher_model->getAll();

        $type_model = new Type();
        $types = $type_model->getAll();

        $supplier_model = new Supplier();
        $suppliers = $supplier_model->getAll();

        $avatars = explode('/', $product['avatar']);


        if (isset($_POST['submit'])) {
            $title            = $_POST['title'];
            $price            = isset($_POST['price']) ? $_POST['price'] : 0;
            $amount           = isset($_POST['amount']) ? $_POST['amount'] : 0;
            $description      = $_POST['description'];
            $content          = $_POST['content'];
            $author_id        = $_POST['author_id'];
            $publisher_id     = $_POST['publisher_id'];
            $supplier_id      = $_POST['supplier_id'];
            $type_id          = isset($_POST['type_id']) ? $_POST['type_id'] : '';
            $tag_id           = isset($_POST['tag_id']) ? $_POST['tag_id'] : '';
            $category_id      = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $status           = $_POST['status'];
            $seo_title        = $_POST['seo_title'];
            $seo_description  = $_POST['seo_description'];
            $seo_keywords     = $_POST['seo_keywords'];
            $avatar_file      = $_FILES['avatar'];
            $updated_at       = date('Y-m-d H:i:s');

            if (empty($title)) {
                $this->error = "Cần nhập tên sản phẩm";
            } else if (!is_numeric($amount) || !is_numeric($price)) {
                $this->error = "Giá tiền hoặc số lượng phải là số";
            }
            else if ($supplier_id == 0 || $publisher_id == 0 || $type_id == 0 || $author_id == 0  || $category_id == 0 || $tag_id == 0){
                $this->error = "Cần nhập các trường thông tin bắt buộc (Tác giả, Nhà xuất bản, ...)";
            }   

            $avatar = $product['avatar'];
            $extension_array = ['jpg', 'png', 'jpeg', 'gif'];
            $dir_uploads = __DIR__ . '/../assets/uploads/product';

            foreach ($avatar_file['error'] as $key => $error) {
                if ($error == UPLOAD_ERR_OK && $error != 4) {
                    $file_name = $avatar_file['name'][$key];
                    $file_tmp = $avatar_file['tmp_name'][$key];

                    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    if (in_array($file_name, $extension_array)) {
                        $this->error = "Cần nhập đúng định dạng ảnh";
                    } else {
                        $file_name = time() . '-' . $title . $key. '.' . $extension;
                        move_uploaded_file($file_tmp, $dir_uploads . '/' . $file_name);
                        if (empty($avatar)) {
                            $avatar .= $file_name;
                        } else {
                            $avatar .= '/' . $file_name;
                        }
                    }
                }
            }   

            

            if (empty($this->error)) {
                $product_model->setId($product_id);
                $product_model->setTitle($title);
                $product_model->setAmount($amount);
                $product_model->setPrice($price);
                $product_model->setDescription($description);
                $product_model->setContent($content);
                $product_model->setPublisher_id($publisher_id);
                $product_model->setSupplier_id($supplier_id);
                $product_model->setType_id($type_id);
                $product_model->setAuthor_id($author_id);
                $product_model->setSeo_decription($seo_description);
                $product_model->setSeo_keywords($seo_keywords);
                $product_model->setSeo_title($seo_title);
                $product_model->setAvatar($avatar);
                $product_model->setUpdated_at($updated_at);

                $product_tag_model->setProduct_id($product_id);
                $product_tag_model->setTag_id($tag_id);
                $product_category_model->setProduct_id($product_id);
                $product_category_model->setCategory_id($category_id);


                $is_update = $product_model->updateOne();
                $product_tag_model->deleteOne();
                $product_category_model->deleteOne();
                $product_tag_model->insert();
                $product_category_model->insert();

                if ($is_update) {
                    $_SESSION['success'] = "Cập nhật sản phẩm thành công";
                    echo "<pre>";
                    print_r($_FILES['avatar']);
                    echo "</pre>";
                    // header("Location : index.php?controller=product&action=index");
                    // exit();
                } else {
                    echo "<pre>";
                    print_r($_FILES['avatar']);
                    echo "</pre>";
                    $_SESSION['error'] = "Cập nhật sản phẩm thất bại";
                }
            }
        }

        $this->content = $this->render('views/admin/products/update.php', [
            'checked_tags'         => $checked_tags,
            'checked_categories'   => $checked_categories,
            'product'              => $product,
            'publishers'           => $publishers,
            'types'                => $types,
            'suppliers'            => $suppliers,
            'authors'              => $authors,
            'tags'                 => $tags,
            'categories'           => $categories,
            'avatars'              => $avatars
        ]);

        require_once 'views/admin/layouts/main.php';
    }

    public function detail()
    {

        $product_model = new Product();

        $product_id = $_GET['id'];
        $product_model->setId($product_id);

        $product = $product_model->getOne();

        $product_tag_model = new Product_tag();
        $product_tag_model->setProduct_id($product_id);
        $tags = $product_tag_model->getAllTag();

        $product_category_model = new Product_category();
        $product_category_model->setProduct_id($product_id);
        $categories = $product_category_model->getAllCategory();

        $category = '';
        $tag = '';


        $titleArr = array_map(function ($tag) {
            return $tag['title'];
        }, $tags);
        $tag = implode(', ', $titleArr);


        $titleArr = array_map(function ($category) {
            return $category['title'];
        }, $categories);
        $category = implode(', ', $titleArr);

        $this->content = $this->render('views/admin/products/detail.php', [
            'product'     => $product,
            'tag'         => $tag,
            'category'    => $category
        ]);

        require_once 'views/admin/layouts/main.php';
    }




    public function delete()
    {
        $product_id = $_GET['id'];

        $product_model = new Product();
        $product_model->setId($product_id);

        $product = $product_model->getOne();

        $images = explode('/', $product['avatar']);

        $product_category_model = new Product_category();
        $product_category_model->setProduct_id($product_id);
        $product_tag_model = new Product_tag();
        $product_tag_model->setProduct_id($product_id);

        $result2 = $product_category_model->deleteOne();
        $result3 = $product_tag_model->deleteOne();
        $result1 = $product_model->deleteOne();

        if ($result1) {
            $_SESSION['success'] = "Xóa sản phẩm thành công";

            foreach ($images as $image) {
                unlink("assets/uploads/product/$image");
            }

            header("Location: index.php?controller=product");
            exit();
        } else {
            $_SESSION['error'] = "Xóa sản phẩm thất bại";
        }
    }


    public function create()
    {

        $publisher_model = new Publisher();
        $type_model = new Type();
        $author_model = new Author();
        $categeory_model = new Category();
        $tag_model = new Tag();
        $supplier_model = new Supplier();

        $suppliers = $supplier_model->getAll();
        $publishers = $publisher_model->getAll();
        $types = $type_model->getAll();
        $authors = $author_model->getAll();
        $categories = $categeory_model->getAll();
        $tags = $tag_model->getAll();


        if (isset($_POST['submit'])) {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";

            // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";

            // echo "<pre>";
            // print_r($_POST['tag_id']);
            // echo "</pre>";
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
            $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : 0; 
            $tag_id = isset($_POST['tag_id']) ? $_POST['tag_id'] : 0; 
            $category_id = isset($_POST['category_id']) ? $_POST['category_id']: 0; 
            $status = $_POST['status'];
            $seo_title = $_POST['seo_title'];
            $seo_description = $_POST['seo_description'];
            $seo_keywords = $_POST['seo_keywords'];

            if (empty($title)) {
                $this->error = "Cần nhập tên sản phẩm";
            } else if (!is_numeric($price) || !is_numeric($amount)) {
                $this->error = "Giá tiền hoặc số lượng phải là số";
            }
            else if ($supplier_id == 0 || $publisher_id == 0 || $type_id == 0 || $author_id == 0  || $category_id == 0 || $tag_id == 0){
                $this->error = "Cần nhập các trường thông tin bắt buộc (Tác giả, Nhà xuất bản, ...)";
            }   

            $avatar = '';
            $extensions[] = array();
            $extension_array = ['jpg', 'png', 'jpge', 'gif'];
            $dir_uploads = __DIR__ . '/../assets/uploads/product';
            foreach ($avatar_file['error'] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $file_name = $avatar_file['name'][$key];
                    $file_tmp = $avatar_file['tmp_name'][$key];

                    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    if (!in_array($extension, $extension_array)) {
                        $this->error = "Cần upload đúng định dạng ảnh";
                    } else {
                        $file_name = time() . $title . $key . '.' . $extension;
                        move_uploaded_file($file_tmp, $dir_uploads . '/' . $file_name);

                        if (empty($avatar)) {
                            $avatar .= $file_name;
                        } else {
                            $avatar .= '/' . $file_name;
                        }
                    }
                }
            }

            if (empty($this->error)) {
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

                if ($is_insert_1 && $is_insert_2) {
                    $_SESSION['success'] = "Thêm sản phẩm thành công";
                    // echo "<pre>";
                    // print_r($_FILES['avatar']);
                    // echo "</pre>";
                    header("Location: index.php?controller=product");
                    exit();
                } else {
                    $_SESSION['error'] = "Thêm sản phẩm thất bại";
                }
            }
        }

        $this->content = $this->render('views/admin/products/create.php', [
            'publishers'    => $publishers,
            'suppliers'     => $suppliers,
            'types'         => $types,
            'authors'       => $authors,
            'categories'    => $categories,
            'tags'          => $tags
        ]);

        require_once 'views/admin/layouts/main.php';
    }
}
