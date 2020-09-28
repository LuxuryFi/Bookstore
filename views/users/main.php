<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/mdb.lite.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/mdb.min.css"> -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="assets/css/style.css">     
    <link href="https://fonts.googleapis.com/css2?family=David+Libre" rel="stylesheet">

</head>
<body class="">

    <?php require_once 'header.php';
    ?>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
<!--            Nội dung hiển thị ở đây-->
            <?php echo $this->content; ?>
             
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php require_once 'footer.php'; ?>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>

<!-- MDBoostrap -->
<!-- <script src="assets/js/mdb.min.js"></script> -->
<!-- AdminLTE App -->
<!-- Popper -->
<script src="assets/js/popper.min.js"></script>
<!--CKEditor -->
<script src="assets/ckeditor/ckeditor.js"></script>
<!-- Country-Validate -->
<link rel="stylesheet" href="path/to/intlTelInput.css">
<!--My SCRIPT-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="assets/js/script.js"></script>

</body>
</html>
