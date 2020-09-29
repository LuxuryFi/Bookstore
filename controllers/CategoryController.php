
<?php
//controller/CategoryController.php

require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';



class CategoryController extends Controller {


    public function index(){


        $category_model = new Category();

        $params = [
            'limit' => 5, //giới hạn 5 bản ghi 1 trang
            'query_string' => 'page',
            'controller' => 'category',
            'action' => 'index',
            'full_mode' => FALSE,
        ];

        $page = 1;


        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }

        if (isset($_GET['title'])){
            $params['query_additional'] = '$title' . $_GET['title'];
        }

        // $categories = $category_model->getAll();

        $count_total = $category_model->countTotal();

        $params['total'] = $count_total;

        $params['page'] = $page;

        $pagination = new Pagination($params);

        $pages = $pagination->getPagination();

        $categories = $category_model->getAllPagination($params);

        $this->content = $this->render('views/admin/categories/index.php', [
            'categories' => $categories,
            'pages' => $pages
        ] );

        require_once 'views/admin/layouts/main.php';
    }

    public function create(){

        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $avatar_files = $_FILES['avatar'];
            $parent_id = $_POST['parent_id'];

            

            if (empty($title) ){
                $this->error = "Must enter category title";
            }
            
            $avatar = '';
            if (empty($this->error)){
                if($avatar_files['error'] == 0){
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    $extension = pathinfo($avatar_files['name'], PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    if (!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $title . '.' . $extension;
                    move_uploaded_file($avatar_files['tmp_name'],$dir_uploads . '/' . $avatar);
                }

                $category_model = new Category();

                $category_model->setTitle($title);
                $category_model->setStatus($status);
                $category_model->setDescription($description); 
                $category_model->setAvatar($avatar);
                $category_model->setParent_id($parent_id);
  
                $is_insert = $category_model->insert();

                if ($is_insert){
                    $_SESSION['success'] = 'Insert successfully';
                    header("Location: index.php?controller=category&action=index");
                    exit();
                }
                else {
                    $_SESSION['error'] = 'Insert failed';
                }

            }

        }


        $this->content = $this->render('views/admin/categories/create.php');

        require_once 'views/admin/layouts/main.php';
    }

    public function update() {


        $category_model = new Category();
        $id = $_GET['id'];

        $category = $category_model->getOne($id);
         

        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $parent_id = $_POST['parent_id'];
            $avatar_files = $_FILES['avatar'];

            if(empty($title)){
                $this->error = "Must enter category title";
            }

            $avatar = $category['avatar'];

            if(empty($this->error)){
                if($avatar_files['error'] == 0){
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    $extension = pathinfo($avatar_files['name'],PATHINFO_EXTENSION);
                    $extension = strtolower($extension); 
                    @unlink($dir_uploads. '/' .$avatar);
                    $avatar = time() . '-' . $title . '.' . $extension;   
                    move_uploaded_file($avatar_files['tmp_name'],$dir_uploads . '/' . $avatar);
                }

                $category_model->setTitle($title);
                $category_model->setStatus($status);
                $category_model->setDescription($description); 
                $category_model->setAvatar($avatar);
                $category_model->setParent_id($parent_id);
                $category_model->setUpdated_at(date('Y-m-d H:i:s'));

                $is_update = $category_model->updateOne($id);
                
                if($is_update){
                    $_SESSION['success'] = "Update successfully";
                    
                    
                }
                else {
                    $_SESSION['error'] = "Update failed";
                }
                header("Location: index.php?controller=category&action=index");
                exit();
            }

        }
        $this->content = $this->render('views/admin/categories/update.php', [
                'category' => $category
            ]
        );
        require_once 'views/admin/layouts/main.php';
    }

    public function delete(){
        $category_model = new Category();

        $id = $_GET['id'];
        $category_model->setId($id);
        $is_delete = $category_model->deleteOne();

        if($is_delete){
            $_SESSION['success'] = "Xóa danh mục thành công";
            header("Location: index.php?controller=category&action=index");
            exit();
        }
        else {
            $_SESSION['error'] = "Xóa thất bại";
            header("Location: index.php?controller=category&action=index");
            exit();
        }
    }

    public function detail(){
        $category_model = new Category();
        $id = $_GET['id'];

        $category = $category_model->getOne($id);

        $this->content = $this->render('views/admin/categories/detail.php',[
            'category' => $category
        ]);

        require_once 'views/admin/layouts/main.php';
    }

}

?>
