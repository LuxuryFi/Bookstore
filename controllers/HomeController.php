<?php
    include 'controllers/Controller.php';
    include 'models/Product.php';
    include 'models/Pagination.php';

    class HomeController extends Controller {
        
        public function index() {
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
            'limit'         => 20,
            'total'         => $count_total,
            'action'        => 'index',
            'controller'    => 'product',
            'query_string'  => 'page',
            'page'          => isset($_GET['page']) ? $_GET['page'] : 1,
            'full_mode'     => FALSE
        ];

        $pagination = new Pagination($params);

        $pages = $pagination->getPagination();



        $products = $product_model->getAllPaginationHome($params);

        

            $this->content = $this->render('views/homes/index.php',[
                    'products' => $products,
                    'pages'    => $pages
            ]);
            require_once 'views/users/main.php';
        }



        
    }

?>
