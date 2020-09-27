<?php
    include 'controllers/Controller.php';

    class HomeController extends Controller {
        
        public function index() {


            $this->content = $this->render('views/homes/index.php');
            require_once 'views/users/main.php';
        }
        
    }

?>
