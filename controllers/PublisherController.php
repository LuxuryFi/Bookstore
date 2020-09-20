<?php
require_once 'controllers/Controller.php';
require_once 'models/Pagination.php';
require_once 'models/Publisher.php';
require_once 'helpers/Helper.php';

class PublisherController extends Controller {

    public function index(){

        $params = [
            'limit' => 2,
            'query_string' => 'page',
            'controller' => 'publisher',
            'action' => 'index',
            'full_mode' => FALSE
        ];

        $page = 1;

        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }

        if (isset($_GET['title'])){
            $params['query_additional'] = '&title' . $_GET['title'];
        }

        $publisher_model = new Publisher();

        $countTotal      = $publisher_model->countTotal();
        $params['total'] = $countTotal;
        $params['page']  = $page;

        $pagination      = new Pagination($params);

        $pages           = $pagination->getPagination();

        $publishers      = $publisher_model->getAllPagination($params);

        

        $this->content   = $this->render('views/publishers/index.php',[
            'pages'      => $pages,
            'publishers' => $publishers
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $description =$_POST['description'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            $avatar_file = $_FILES['avatar'];
            $country = $_POST['country'];

            if (empty($title) || empty($phone) || empty($email) || empty($address)){
                $this->error = "Cần nhập đủ các thông tin";
            }
            else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error = "Cần nhập đúng định dạng email";
            }
            else if (!Helper::validatePhone($phone)){
                $this->error = "Cần nhập đúng định dạng số điện thoại";
            }
            
            if ($avatar_file['error'] == 0){
                $extension_arr = ['jpg','gif', 'png', 'jpeg'];
                $extension = pathinfo($avatar_file['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);

                if(!in_array($extension,$extension_arr)){
                    $this->error = "Cần nhập đúng định dạng ảnh";
                }
            }
            
            $avatar = 'example.jpg';
            if (empty($this->error)){
                if ($avatar_file['error'] == 0){
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $title . '.' . $extension;
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                }

                $publisher_model = new Publisher();

                $publisher_model->setTitle($title);
                $publisher_model->setEmail($email);
                $publisher_model->setAvatar($avatar);
                $publisher_model->setDescription($description);
                $publisher_model->setStatus($status);
                $publisher_model->setAddress($address);
                $publisher_model->setPhone($phone);
                $publisher_model->setCountry($country);

                $is_insert = $publisher_model->insert();

                if ($is_insert){
                    $_SESSION['success'] = "Thêm mới thành công";
                    header("Location: index.php?controller=publisher&action=index");
                    exit();
                }
                else {
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
            }
        }

        $countries = Helper::getCountryList();

        $this->content = $this->render('views/publishers/create.php',[
            'countries' => $countries
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){

        $publisher_model = new Publisher();
        $id = $_GET['id'];
        $publisher_model->setId($id);

        $is_delete = $publisher_model->deleteOne();

        if ($is_delete){
            $_SESSION['success'] = "Xóa thành công";
            header("Location: index.php?controller=publisher&action=index");
            exit();
        }
        else {
            $_SESSION['error'] = "Xóa thất bại";
        }

        $this->content = $this->render('views/publishers/detail.php');

        require_once 'views/layouts/main.php';
    }

    public function update(){

        $publisher_model = new Publisher();
        $id = $_GET['id'];
        $publisher_model->setId($id);

        $countries = Helper::getCountryList();

        $publisher = $publisher_model->getOne();

        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $description =$_POST['description'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            $country = $_POST['country'];
            $updated_at = date('Y-m-d H:i:s');
            $avatar_file = $_FILES['avatar'];

            $avatar = $publisher['avatar'];

            if (empty($title) || empty($phone) || empty($email) || empty($address)){
                $this->error = "Cần nhập đủ các thông tin";
            }
            else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error = "Cần nhập đúng định dạng email";
            }
            else if (!Helper::validatePhone($phone)){
                $this->error = "Cần nhập đúng định dạng số điện thoại";
            }
            
            if ($avatar_file['error'] == 0){
                $extension_arr = ['jpg','gif', 'png', 'jpeg'];
                $extension = pathinfo($avatar_file['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);

                if(!in_array($extension,$extension_arr)){
                    $this->error = "Cần nhập đúng định dạng ảnh";
                }
            }

            if (empty($this->error)){
                if ($avatar_file['error'] == 0){
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $title . '.' . $extension;
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                }

                $publisher_model = new Publisher();
                $id = $_GET['id'];
                $publisher_model->setId($id);
                $publisher_model->setTitle($title);
                $publisher_model->setEmail($email);
                $publisher_model->setAvatar($avatar);
                $publisher_model->setDescription($description);
                $publisher_model->setStatus($status);
                $publisher_model->setAddress($address);
                $publisher_model->setCountry($country);
                $publisher_model->setPhone($phone);
                $publisher_model->setUpdated_at($updated_at);
                $is_update = $publisher_model->updateOne();

                if ($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                    header("Location: index.php?controller=publisher&action=index");
                    exit();
                }
                else {
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
            }
        }

        $this->content = $this->render('views/publishers/update.php',[
            'publisher' => $publisher,
            'countries' => $countries
        ]);

        require_once 'views/layouts/main.php';
    }

    public function detail(){
        $publisher_model = new Publisher();
        $id = $_GET['id'];
        $publisher_model->setId($id);

        $publisher = $publisher_model->getOne();
       
        $countries = Helper::getCountryList();

        $this->content = $this->render('views/publishers/detail.php',[
            'publisher' => $publisher,
            'countries' => $countries
        ]);

        require_once 'views/layouts/main.php';
    }
}

?>
