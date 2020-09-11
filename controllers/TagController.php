<?php 
    require_once "controllers/Controller.php";
    require_once "models/Tag.php";
    require_once "models/Pagination.php";

    class TagController extends Controller {
        public function index(){
            
            $tag_model = new Tag();

            $params = [
                'limit' => 5,
                'query_string' => 'page',
                'controller' => 'tag',
                'action' => 'index',
                'full_mode' => FALSE
            ];

            $page = 1;

            if (isset($_GET['page'])){
                $page = $_GET['page'];
            }

            if (isset($_GET['title'])){
                $params['query_additional'] = '$title' . $_GET['title'];
            }

            $countTotal = $tag_model->countTotal();

            $params['total'] = $countTotal;

            $params['page'] = $page;

            $pagination = new Pagination($params);

            $pages = $pagination->getPagination();

            $tags = $tag_model->getAllPagination($params);

            $this->content = $this->render('views/tags/index.php', [
                'abc' => $tags,
                'pages' => $pages
            ]);
            require_once "views/layouts/main.php";
        }

        public function create(){
        
            if (isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $status = $_POST['status'];

                if (empty($title)){
                    $this->error = 'Cần nhập tên của tag';
                }

                if (empty($this->error)){
                    $tag_model = new Tag();

                    $tag_model->setTitle($title);
                    $tag_model->setDescription($description);
                    $tag_model->setStatus($status);

                    $is_insert = $tag_model->create();

                    if ($is_insert){
                        $_SESSION['success'] = 'Thêm mới thẻ thành công';
                        header("Location: index.php?controller=tag&action=index");
                        exit();
                    }
                    else {
                        $_SESSION['error'] = 'Thêm mới thất bại';
                    }
                }
            }


            $this->content = $this->render('views/tags/create.php');
            require_once "views/layouts/main.php";
        }

        public function delete(){
            $tag_model = new Tag();
            $tag_model->setId($_GET['id']);
            $is_delele = $tag_model->deleteOne();
            if ($is_delele){
                $_SESSION['success'] = "Xóa thành công";
                header("Location: index.php?controller=tag&action=index");
                exit();
            }
            else {
                $_SESSION['error'] = "Xóa thất bại";
            }
        }

        public function update(){
            $tag_model = new Tag();
            $tag_model->setId($_GET['id']);

            $tag = $tag_model->getOne();

            if (isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $status = $_POST['status'];
                $updated_at = date('Y-m-d H:i:s');

                if (empty($title)){
                    $this->error = "Cần nhập tên của thẻ";
                }

                if (empty($this->error)){
                    $tag_model = new Tag();
                    $tag_model->setId($_GET['id']);
                    $tag_model->setTitle($title);
                    $tag_model->setDescription($description);
                    $tag_model->setUpdated_at($updated_at);
                    $tag_model->setStatus($status);

                    $is_update = $tag_model->updateOne();

                    if ($is_update){
                        $_SESSION['success'] = "Update thành công";
                        header("Location: index.php?controller=tag&action=index");
                        exit();
                    }
                    else {
                        $_SESSION['error'] = "Update thất bại";
                        header("Location: index.php?controller=tag&action=index");
                        exit();
                    }
                }
            }

            $this->content = $this->render("views/tags/update.php",[
                'tag' => $tag
            ]);

            require_once "views/layouts/main.php";
            

        }

    }

?>
