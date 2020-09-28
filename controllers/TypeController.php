<?php 
    require_once "controllers/Controller.php";
    require_once "models/Type.php";
    require_once "models/Pagination.php";

    class TypeController extends Controller {
        public function index(){
            
            $type_model = new Type();

            $params = [
                'limit' => 5,
                'query_string' => 'page',
                'controller' => 'type',
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

            $countTotal = $type_model->countTotal();

            $params['total'] = $countTotal;

            $params['page'] = $page;

            $pagination = new Pagination($params);

            $pages = $pagination->getPagination();

            $types = $type_model->getAllPagination($params);

            $this->content = $this->render('views/types/index.php', [
                'abc' => $types,
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
                    $this->error = 'Cần nhập tên của type';
                }

                if (empty($this->error)){
                    $type_model = new Type();

                    $type_model->setTitle($title);
                    $type_model->setDescription($description);
                    $type_model->setStatus($status);

                    $is_insert = $type_model->create();

                    if ($is_insert){
                        $_SESSION['success'] = 'Thêm mới thẻ thành công';
                        header("Location: index.php?controller=type&action=index");
                        exit();
                    }
                    else {
                        $_SESSION['error'] = 'Thêm mới thất bại';
                    }
                }
            }


            $this->content = $this->render('views/types/create.php');
            require_once "views/layouts/main.php";
        }

        public function delete(){
            $type_model = new type();
            $type_model->setId($_GET['id']);
            $is_delele = $type_model->deleteOne();
            if ($is_delele){
                $_SESSION['success'] = "Xóa thành công";
                header("Location: index.php?controller=type&action=index");
                exit();
            }
            else {
                $_SESSION['error'] = "Xóa thất bại";
            }
        }

        public function update(){
            $type_model = new Type();
            $type_model->setId($_GET['id']);

            $type = $type_model->getOne();

            if (isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $status = $_POST['status'];
                $updated_at = date('Y-m-d H:i:s');

                if (empty($title)){
                    $this->error = "Cần nhập tên của thẻ";
                }

                if (empty($this->error)){
                    $type_model = new Type();
                    $type_model->setId($_GET['id']);
                    $type_model->setTitle($title);
                    $type_model->setDescription($description);
                    $type_model->setUpdated_at($updated_at);
                    $type_model->setStatus($status);

                    $is_update = $type_model->updateOne();

                    if ($is_update){
                        $_SESSION['success'] = "Update thành công";
                        header("Location: index.php?controller=type&action=index");
                        exit();
                    }
                    else {
                        $_SESSION['error'] = "Update thất bại";
                        header("Location: index.php?controller=type&action=index");
                        exit();
                    }
                }
            }

            $this->content = $this->render("views/types/update.php",[
                'type' => $type
            ]);

            require_once "views/layouts/main.php";
            

        }


        public function detail(){
            $type_model = new type();
            $id = $_GET['id'];
    
            $type_model->setId($id);
            $type = $type_model->getOne();
    
            $this->content = $this->render('views/types/detail.php',[
                'type' => $type
            ]);
    
            require_once 'views/layouts/main.php';
        }

    }

?>
