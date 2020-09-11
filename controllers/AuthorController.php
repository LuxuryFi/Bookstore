<?php
require_once "controllers/Controller.php";
require_once "models/Author.php";
require_once "models/Pagination.php";


class AuthorController extends Controller {
    public function index(){

        $author_model = new Author();

        $params = [
            'limit' => 10,
            'query_string' => 'page',
            'controller' => 'author',
            'action' => 'index',
            'full_mode' => FALSE
        ];

        $page = 1;

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        
        if(isset($_GET['title'])){
            $params['query_additional'] = '$title' . $_GET['title'];
        }

        $count_total = $author_model->countTotal();

        $params['total'] = $count_total;
        $params['page'] = $page;

        $pagination = new Pagination($params);

        $pages = $pagination->getPagination();

        $authors = $author_model->getAllPagination($params);

        $this->content = $this->render('views/authors/index.php', [
            'pages' => $pages,
            'authors' => $authors
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){

        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $avatar_file = $_FILES['avatar'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            if (empty($title)){
                $this->error = "Cần nhập đủ thông tin";
            }

        $avatar = 'example.jpg';
            if (empty($this->error)){
                if($avatar_file['error'] == 0){
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    $extension = pathinfo($avatar_file['name'],PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }

                    $avatar = time() . '-' . $title . '.' . $extension; 
                    move_uploaded_file($avatar_file['tmp_name'],$dir_uploads . '/' . $avatar);
                }


                $author_model = new Author();
                $author_model->setTitle($title);
                $author_model->setAvatar($avatar);
                $author_model->setDescription($description);
                $author_model->setStatus($status);

                $is_insert = $author_model->insert();

                // echo "<pre>";
                //     print_r($is_insert);
                //     echo "</pre>";

                if ($is_insert){
                    $_SESSION['success'] = "Thêm mới tác giả thành công";
                    header("Location: index.php?controller=author&action=index");
                    exit();
                }
                else {
                    // $_SESSION['error'] = "Thêm mới thất bại";
                    
                 }
            }

        }

        $this->content = $this->render('views/authors/create.php');
        require_once 'views/layouts/main.php';
    }


    public function delete(){
        $id = $_GET['id'];
        $author_model = new Author();
        $author_model->setId($id);
        $is_delete = $author_model->deleteOne();
        

        if ($is_delete){
            $_SESSION['success'] = "Xóa thành công";
            header("Location: index.php?controller=author&action=index");
            exit();
        }
        else {
            $_SESSION['error'] = "Xóa thất bại";
        }

    }

    public function update(){
        $id = $_GET['id'];
        $author_model = new Author();
        $author_model->setId($id);
        $author = $author_model->getOne();

        if (isset($_POST['submit'])){
            
            $description = $_POST['description'];
            $title = $_POST['title'];
            $avatar_file = $_FILES['avatar'];
            $status = $_POST['status'];
            $updated_at = date('Y-m-d H:i:s');


            $avatar = $author['avatar'];

            if (empty($title)){
                $this->error = "Cần nhập đầy đủ thông tin";
            }
        
            if (empty($this->error)){
                
                if($avatar_file['error'] == 0){
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $extension = pathinfo($avatar_file['name'], PATHINFO_EXTENSION);
                    $avatar = time() . '-' . $title . '.' . $extension;
                    move_uploaded_file($avatar_file['tmp_name'],$dir_uploads . '/' .$avatar_file);
                }

                $author_model = new Author();
                $author_model->setTitle($title);
                $author_model->setDescription($description);
                $author_model->setAvatar($avatar);
                $author_model->setStatus($status);
                $author_model->setUpdated_at($updated_at);
                $author_model->setId($id);

                $is_update = $author_model->updateOne();
                
                if ($is_update){
                    $_SESSION['success'] = "Update thành công";
                    header("Location: index.php?controller=author&action=index");
                    exit();
                }
                else {
                    $_SESSION['error'] = "Update thất bại";
                }
            }
        }

        

        $this->content = $this->render('views/authors/update.php', [
            'author' => $author
        ]);

        require_once "views/layouts/main.php";

    }

    public function detail(){

    }
    
}


?> 
