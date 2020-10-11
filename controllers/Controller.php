<?php

class Controller {

    public $content;
    public $error;
    public $title_page;


    function __construct(){
        
         $admin_controller = ['product','tag','category','author','publisher','supplier','type'];
         $user_controller = ['home'];

        if (empty($_SESSION['user']) && $_GET['controller'] != 'home' && $_GET['controller' != login] != 'login'){
             header("Location: index.php?controller=home&action=index");
             exit();
        }

        if (!isset($_SESSION['user']) && $_GET['controller'] != 'home'){
            $_SESSION['error'] = 'Bạn cần đăng nhập';
            exit();
        }
        
        if (isset($_SESSION['user'])){
            // if (isset($_SESSION['user']) && $_SESSION['roles'] != 1 && in_array($_GET['controller'],$user_controller)){
            //     header("Location: index.php?controller=home");
            //     exit();
            // }
    
            if (isset($_SESSION['roles']) == 2 && !in_array($_GET['controller'],$admin_controller)){
                header("Location: index.php?controller=product");
                exit();
            }
            $controller = isset($_GET['controller']) ? $_GET['controller'] : '';
            
            if (isset($_SESSION['roles']) != 2 && in_array($controller,$user_controller)){
                header("Location: index.php?controller=home");
                exit();
            }
            
            // if (isset($_SESSION['roles']) == 1 && !in_array($_GET['controller'],$user_controller)){
            //     header("Location: index.php?controller=home");
            //     exit();
            // }
        }


        
   }
    

    public function render($file, $variables = []){
        extract($variables);

        ob_start();

        require_once $file;

        $render_view = ob_get_clean();

        return $render_view;
    }
}



?>
