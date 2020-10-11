<?php

require_once 'controllers/Controller.php';
require_once 'models/Pagination.php';
require_once 'helpers/Helper.php';
require_once 'models/User.php';

class UserController extends Controller {

    public function index(){

        $user_model = new User();

        $count_total =  $user_model->countTotal();


        $params = [
                    'limit' => 10,
                    'total' => $count_total,
                    'query_string' => 'page',
                    'page'  => isset($_GET['page']) ? $_GET['page'] : 1,
                    'controller' => 'user',
                    'action' => 'index',
                    'full_mode' => FALSE
        ];


        $pagination_model = new Pagination($params);

        $pages = $pagination_model->getPagination();

        $users = $user_model->getAllPagination($params);

        $this->content = $this->render('views/admin/users/index.php',[
            'users' => $users,
            'pages' => $pages
        ]);

        require_once 'views/admin/layouts/main.php';
    }

    public function create(){

        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $avatar_file = $_FILES['avatar'];

            if (empty($username) || empty($password) || empty($repassword) || empty($email) || empty($phone)){
                $this->error = "Cần nhập đầy đủ các thông tin theo yêu cầu";
            }
            else if (!Helper::validatePhone($phone)){
                $this->error = "Số điện thoại không đúng định dạng";
            }
            else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error = "Địa chỉ email không đúng định dạng";
            }
            else if (strcmp($repassword,$password) != 0){
                $this->error = "Mật khẩu không trùng khớp";
            }
          
            if ($avatar_file['error'] == 0){
                $arr_extension = ['jpg', 'jpeg', 'gif','png'];
                $extension = pathinfo($avatar_file['name'],PATHINFO_EXTENSION);

                if (!in_array($extension,$arr_extension)){
                    $this->error = "Ảnh đại diện không đúng định dạng";
                }
            }

            $avatar = 'example.jpg';
            if (empty($this->error)){

                if ($avatar_file['error'] == 0){
                    $dir_uploads = __DIR__ . '/../assets/uploads/avatars';
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }

                    $avatar = time() . $username . '.' . $extension; 
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                }

                $user_model = new User();

                $user_model->setUsername($username);
                $user_model->setAvatar($avatar);
                $user_model->setPassword($password);
                $user_model->setLastname($lastname);
                $user_model->setFirstname($firstname);
                $user_model->setPhone($phone);
                $user_model->setAddress($address);
                $user_model->setEmail($email);

                $is_insert = $user_model->insert();

                
                if ($is_insert){
                    $_SESSION['success'] = "Thêm mới người dùng thành công";
                    header("Location: index.php?controller=user&action=index");
                    exit();
                }
                else {
                    $_SESSION['error'] = "Thêm mới thất bại";
                    header("Location: index.php?controller=user&action=index");
                    exit();
                }
        }
    }
        $this->content = $this->render('views/admin/users/create.php');
        require_once 'views/admin/layouts/main.php';
        
    }

    public function update(){
        $user_model = new User();
        
        $username = $_GET['username'];

        $user_model->setUsername($username);
        
        $user = $user_model->getOne();


        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $avatar_file = $_FILES['avatar'];
            $updated_at = date('Y-m-d H:i:s');

            if (empty($username) || empty($password) || empty($repassword) || empty($email) || empty($phone)){
                $this->error = "Cần nhập đầy đủ các thông tin theo yêu cầu";
            }
            else if (!Helper::validatePhone($phone)){
                $this->error = "Số điện thoại không đúng định dạng";
            }
            else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error = "Địa chỉ email không đúng định dạng";
            }
            else if (strcmp($repassword,$password) != 0){
                $this->error = "Mật khẩu không trùng khớp";
            }
          
            if ($avatar_file['error'] == 0){
                $arr_extension = ['jpg', 'jpeg', 'gif','png'];
                $extension = pathinfo($avatar_file['name'],PATHINFO_EXTENSION);

                if (!in_array($extension,$arr_extension)){
                    $this->error = "Ảnh đại diện không đúng định dạng";
                }
            }

            $avatar = $user['avatar'];
            if (empty($this->error)){

                if ($avatar_file['error'] == 0){
                    $dir_uploads = __DIR__ . '/../assets/uploads/avatars';
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }

                    $avatar = time() . $username . '.' . $extension; 
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                }

                $user_model = new User();

                $user_model->setUsername($username);
                $user_model->setAvatar($avatar);
                $user_model->setPassword($password);
                $user_model->setLastname($lastname);
                $user_model->setFirstname($firstname);
                $user_model->setPhone($phone);
                $user_model->setAddress($address);
                $user_model->setEmail($email);
                $user_model->setUpdated_at($updated_at);

                $is_update = $user_model->updateOne();

                if ($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                    header("Location: index.php?controller=user&action=index");
                    exit();
                }
                else {
                    $_SESSION['error'] = "Cập nhật thất bại";
                    header("Location: index.php?controller=user&action=index");
                    exit();
                }
            }
        }

        $this->content = $this->render('views/admin/users/update.php', [
            'user' => $user
        ]);
        require_once 'views/admin/layouts/main.php';
    }

    public function delete(){
        $user_model = new User();
        
        $username = $_GET['username'];

        $user_model->setUsername($username);
        
        $is_delete = $user_model->deleteOne();

        if ($is_delete){
            $_SESSION['success'] = "Xóa thành công";
            header("Location: index.php?controller=user&action=index");
            exit();
        }
        else {
            $_SESSION['error'] = "Xóa thất bại";
            header("Location: index.php?controller=user&action=index");
            exit();
        }
    }

    public function detail(){

        $user_model = new User();
        
        $username = $_GET['username'];

        $user_model->setUsername($username);
        
        $user = $user_model->getOne();

        $this->content = $this->render('views/admin/users/detail.php',[
            'user' => $user
        ]);
        require_once 'views/admin/layouts/main.php';
    }
    
    
    public function register(){
        $this->content = $this->render('views/users/users/register.php');
        require_once 'views/admin/layouts/main.php';
    }
}

?>
