<?php
    // echo "<pre>";
    // print_r($suppliers);
    // echo "</pre>";
?>


<h1>Tìm kiếm</h1>

<form action="" method="GET">
    <div class="form-group">
        <label for="supplier">Nhập tên nhà phân phối</label>
        <input type="text" name="supplier" id="supplier" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="search" class="btn btn-success">
        <a href="index.php?controller=supplier" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh sách nhà phân phối</h1>
<a class="btn btn-primary" href="index.php?controller=supplier&action=create"><i class="fa fa-plus"></i> Thêm mới</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên nhà phân phối</th>
        <th>Mô tả</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Email</th>
        <th>Status</th>
        <th></th>
    </tr>

    <?php if (!empty($suppliers)) : ?>
        <?php foreach ($suppliers as $supplier) : ?>
            <tr>
                <td>
                    <?php echo $supplier['id'] ?>
                </td>
                <td>
                    <?php echo $supplier['title'] ?>
                </td>
                <td>
                    <?php echo  $supplier['description'] ?>
                </td>
                <td>
                    <?php echo $supplier['phone'] ?>
                </td>
                <td>
                    <?php echo $supplier['address'] ?>
                </td>
                <td>
                    <?php echo $supplier['email'] ?>
                </td>
                <td>
                    <?php echo $supplier['status'] ?>
                </td>
                <td>
                    <a href="index.php?controller=supplier&action=detail&id=<?php echo $supplier['id'] ?>"><i class="fa fa-eye"></i></a>
                    <a href="index.php?controller=supplier&action=update&id=<?php echo $supplier['id'] ?>"><i class="fa fa-pen"></i></a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa')"  href="index.php?controller=supplier&action=delete&id=<?php echo $supplier['id'] ?>"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php 
            echo (!empty($pages)) ? $pages : '';
        ?>
    <?php endif; ?>


</table>

