<?php

class Pagination {
    public $params = [
        'total' => 0,
        'limit' => 0,
        'controller' => '',
        'action' => '',
        'full_name' => FALSE
    ];

    public function __construct($params){
        $this->params = $params;
    }

    public function getTotalPage(){
        $total = $this->params['total'] / $this->params['limit'];
        $total = ceil($total);

        return $total;
    }

    public function getCurrentPage(){
        $page = 1;
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page = $_GET['page'];

            $total_page = $this->getTotalPage();
            
            if ($page >= $total_page){
                $page = $total_page;
            }
        }
        return $page;
    }

    public function getPrevPage(){
        $prev_page = '';
        $current_page = $this->getCurrentPage();

        if($current_page >= 2){
            $controller = $this->params['controller'];
            $action     = $this->params['action'];
            $page       = $current_page -1 ;
            $prev_url   = "index.php?controller=$controller&action=$action&page=$page";
            $prev_page  = "<li><a href='$prev_url'>Prev</a></li>";
        }
        return $prev_page;
    }

    public function getNextPage(){
        $next_page = '';
        $current_page = $this->getCurrentPage();
        $total_page = $this->getTotalPage();
        if($current_page < $total_page){
            $controller = $this->params['controller'];
            $action = $this->params['action'];
            $page = $current_page + 1;
            $next_url = "index.php?controller=$controller&action=$action&page=$page";
            $next_page = "<li><a href='$next_url'>Next</a></li>";
        }
    }

    public function getPagination(){
        $data = '';
        $total_page = $this->getTotalPage();
        if ($total_page == 1){
            return '';
        }

        $data       .= "<ul class='pagination'>";

        $pre_link    = $this->getPrevPage();
        $data       .= $pre_link;

        $controller  = $this->params['controller'];
        $action      = $this->params['action'];

        $full_mode   = $this->params['full_mode'];

        if ($this->params['full_mode'] == FALSE){
            for ($page = 1; $page <= $total_page; $page++){
                $current_page = $this->getCurrentPage();
                //hiển thị trang 1, trang cuối, trang ngay trước trang hiện tại và trang ngay sau trang hiện tại
                if ($page == 1 || $page == $total_page || $page == $current_page - 1 || $page == $current_page + 1 ){
                    $page_url = "index.php?controller=$controller&action=$action&page=$page";
                    $data .= "<li><a href='$page_url'>$page</a></li>";
                }
                //nếu là trang hiện tại thì sẽ ko có link
                else if ($page == $current_page){
                    $data .= "<li class='active'><a href=''>$page</a></li>";
                }
                //còn nếu hoặc là trang 2, trang 3 hoặc trang tổng - 1, trang tổng -2 thì hiển thị ..
                else if (in_array($page, [$current_page -2, $current_page - 3, $current_page + 2, $current_page +3])){
                    $data .= "<li><a href=''>...</a></li>";
                }
            }
        }
        else {
            for($page = 1; $page <= $total_page; $page++){
                $current_page = $this->getCurrentPage();
                if($current_page == $page){
                    $data .= "<li class='active'><a href='#'>$page</a></li>";
                } 
                else {
                    $page_url = "index.php?controller=$controller&action=$action&page=$page";
                    $data .= "<li class='active'><a href='$page_url'>$page</a></li>";
                }
            }
        }


        $next_link = $this->getNextPage();
        $data .= $next_link;
        $data .= "</ul>";
        return $data;
    }
}


?>
