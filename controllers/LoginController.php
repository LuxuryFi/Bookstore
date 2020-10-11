<?php
require_once 'controllers/Controller.php';
require_once 'models/Pagination.php';
require_once 'helpers/Helper.php';
require_once 'models/User.php';

class LoginController {

    public function render($file, $variables = []){
        extract($variables);

        ob_start();

        require_once $file;

        $render_view = ob_get_clean();

        return $render_view;
    }

    public function login(){
        // if (isset($_SESSION['user'])) {
        //     header('Location: index.php?controller=home&action=index');
        //     exit();
        // }

        if (isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user_model = new User();
            $user_model->setUsername($username);
            $user_model->setPassword($password);

            $user = $user_model->loginCheck();
        
            if (empty($user)) {
                $this->error = 'Sai username hoặc password';
            } else {
                $_SESSION['success'] = 'Đăng nhập thành công';
                $_SESSION['user'] = $user;
                $_SESSION['roles'] = $user['role'];
                if ($user['roles'] == 1){
                    header("Location: index.php?controller=home&action=index");
                    exit();
                }

                if ($user['roles'] == 2){
                    header("Location: index.php?controller=product&action=index");
                    exit();
                }
            }
        }
        $this->content = $this->render('views/login.php');
        require_once 'views/admin/layouts/main.php';
    }

    public function register(){
        $this->content = $this->render('views/users/users/register.php');
        require_once 'views/admin/layouts/main.php';
    }

    public function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            header("Location: index.php?controller=home&action=index");
            exit();
        }
    }

}


?>
