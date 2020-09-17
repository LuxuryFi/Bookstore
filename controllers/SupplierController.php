<?php
require_once 'controllers/Controller.php';
require_once 'models/Pagination.php';
require_once 'models/supplier.php';
require_once 'helpers/Helper.php';

class supplierController extends Controller {

    public function index(){

        $params = [
            'limit' => 10,
            'query_string' => 'page',
            'controller' => 'supplier',
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

        $supplier_model = new Supplier();

        $countTotal      = $supplier_model->countTotal();
        $params['total'] = $countTotal;
        $params['page']  = $page;

        $pagination      = new Pagination($params);

        $pages           = $pagination->getPagination();

        $suppliers      = $supplier_model->getAllPagination($params);

        
        $this->content   = $this->render('views/suppliers/index.php',[
            'pages'      => $pages,
            'suppliers' => $suppliers
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
            
    
            if (empty($this->error)){
               

                $supplier_model = new Supplier();

                $supplier_model->setTitle($title);
                $supplier_model->setEmail($email);
                $supplier_model->setDescription($description);
                $supplier_model->setStatus($status);
                $supplier_model->setAddress($address);
                $supplier_model->setPhone($phone);
                $supplier_model->setCountry($country);

                $is_insert = $supplier_model->insert();

                if ($is_insert){
                    $_SESSION['success'] = "Thêm mới thành công";
                    header("Location: index.php?controller=supplier&action=index");
                    exit();
                }
                else {
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
            }
        }
        $countries = Helper::getCountryList();

        $this->content = $this->render('views/suppliers/create.php',[
            'countries' => $countries
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){

        $supplier_model = new Supplier();
        $id = $_GET['id'];
        $supplier_model->setId($id);

        $is_delete = $supplier_model->deleteOne();

        if ($is_delete){
            $_SESSION['success'] = "Xóa thành công";
            header("Location: index.php?controller=supplier&action=index");
            exit();
        }
        else {
            $_SESSION['error'] = "Xóa thất bại";
        }

        $this->content = $this->render('views/suppliers/detail.php');

        require_once 'views/layouts/main.php';
    }

    public function update(){

        $supplier_model = new Supplier();
        $id = $_GET['id'];
        $supplier_model->setId($id);

        $supplier = $supplier_model->getOne();

        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $description =$_POST['description'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            $country = $_POST['country'];
            $updated_at = date('Y-m-d H:i:s');

            if (empty($title) || empty($phone) || empty($email) || empty($address)){
                $this->error = "Cần nhập đủ các thông tin";
            }
            else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error = "Cần nhập đúng định dạng email";
            }
            else if (!Helper::validatePhone($phone)){
                $this->error = "Cần nhập đúng định dạng số điện thoại";
            }
            

            if (empty($this->error)){
                $supplier_model = new Supplier();
                $id = $_GET['id'];

                $supplier_model->setId($id);
                $supplier_model->setTitle($title);
                $supplier_model->setEmail($email);
                $supplier_model->setDescription($description);
                $supplier_model->setStatus($status);
                $supplier_model->setAddress($address);
                $supplier_model->setPhone($phone);
                $supplier_model->setCountry($country);
                $supplier_model->setUpdated_at($updated_at);

                $is_update = $supplier_model->updateOne();

                if ($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                    header("Location: index.php?controller=supplier&action=index");
                    exit();
                }
                else {
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
            }
        }
      
        $countries = Helper::getCountryList();

        $this->content = $this->render('views/suppliers/update.php',[
            'supplier' => $supplier,
            'countries' => $countries
        ]);

        require_once 'views/layouts/main.php';
    }

    public function detail(){
        $supplier_model = new Supplier();
        $id = $_GET['id'];
        $supplier_model->setId($id);

        $supplier = $supplier_model->getOne();

        $countries = Helper::getCountryList();

        $this->content = $this->render('views/suppliers/detail.php',[
            'supplier' => $supplier,
            'countries' => $countries
        ]);

        

        require_once 'views/layouts/main.php';
    }
}

?>
