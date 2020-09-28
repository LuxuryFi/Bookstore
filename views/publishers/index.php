<?php
    // echo "<pre>";
    // print_r($publishers);
    // echo "</pre>";
?>


<h1>Tìm kiếm</h1>

<form action="" method="GET">
    <div class="form-group">
        <label for="publisher">Nhập tên nhà xuất bản</label>
        <input type="text" name="title" id="publisher" class="form-control" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>">
    </div>
    <div class="form-group">
        <input type="hidden" name="controller" value="publisher"/>
        <input type="hidden" name="action" value="index"/>
        <input type="submit" name="search" class="btn btn-success" value="Tìm kiếm">
        <a href="index.php?controller=publisher" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh sách nhà xuất bản</h1>
<a class="btn btn-primary" href="index.php?controller=publisher&action=create"><i class="fa fa-plus"></i> Thêm mới</a>

<table class="table table-bordered">
    <tr class="thead-light">
        <th>ID</th>
        <th>Tên nhà xuất bản</th>
        <th>Ảnh đại diện</th>
        <th>Mô tả</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Email</th>
        <th>Status</th>
        <th></th>
    </tr>

    <?php if (!empty($publishers)) : ?>
        <?php foreach ($publishers as $publisher) : ?>
            <tr>
                <td>
                    <?php echo $publisher['id'] ?>
                </td>
                <td>
                    <?php echo $publisher['title'] ?>
                </td>
                <td>
                    <img src="assets/uploads/<?php echo $publisher['avatar'] ?>" alt="" width="100">
                </td>
                <td>
                    <?php echo  $publisher['description'] ?>
                </td>
                <td>
                    <?php echo $publisher['phone'] ?>
                </td>
                <td>
                    <?php echo $publisher['address'] ?>
                </td>
                <td>
                    <?php echo $publisher['email'] ?>
                </td>
                <td>
                    <?php echo $publisher['status'] ?>
                </td>
                <td>
                    <a href="index.php?controller=publisher&action=detail&id=<?php echo $publisher['id'] ?>"><i class="fa fa-eye"></i></a>
                    <a href="index.php?controller=publisher&action=update&id=<?php echo $publisher['id'] ?>"><i class="fa fa-pen"></i></a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa')"  href="index.php?controller=publisher&action=delete&id=<?php echo $publisher['id'] ?>"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php
        if (!empty($pages)){
            echo $pages;
        }
    ?>
    <?php endif; ?>


</table>
<?php 
            echo (!empty($pages)) ? $pages : '';
        ?>
