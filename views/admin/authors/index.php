<h1>Tìm kiếm</h1>

<?php if (isset($authors)) : ?>

    <?php 
        // echo "<pre>";
        // print_r($authors);
        // echo "</pre>";
    ?>

<form action="" method="GET">
    <div class="form-group">
        <label for="title">Nhập tên danh mục</label>
        <input type="text" name="title" class="form-control" id="title" value="<?php  echo isset($_GET['title']) ? $_GET['title'] : '' ?>">
    </div>
    <div class="form-group">
        <input type="hidden" name="controller" value="author">
        <input type="hidden" name="action" value="index">
        <input type="submit" name="search" class="btn btn-success" value="Tìm kiếm">
        <a href="index.php?controller=author&action=index" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh sách tác giả</h1>
<a href="index.php?controller=author&action=create" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên tác giả</th>
        <th>Ảnh đại diện</th>
        <th>Thông tin</th>
        <th>Ngày tạo</th>
        <th>Lần sửa đổi cuối</th>
        <th>Trạng thái</th>
        <th>
        </th>
    </tr>
    <?php foreach ($authors as $author) :?>
        <tr>
            <td>
                <?php  echo $author['id']; ?>
            </td>
            <td>
                <?php echo $author['title']; ?>
            </td>
            <td>
                <img src="assets/uploads/<?php echo $author['avatar'] ?>" alt="" width="100"> 
            </td>
            <td>
                <?php echo $author['description']; ?>
            </td>
            <td>
                <?php echo $author['created_at']; ?>
            </td>
            <td>
                <?php echo $author['updated_at']; ?>   
            </td>
            <td>
                <?php echo $author['status']; ?>   
            </td>
            <td>
                <a href="index.php?controller=author&action=detail&id=<?php echo $author['id'] ?>"><i class="fa fa-eye"></i></a>
                <a href="index.php?controller=author&action=update&id=<?php echo $author['id'] ?>"><i class="fa fa-pen"></i></a>
                <a href="index.php?controller=author&action=delete&id=<?php echo $author['id'] ?>"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc chắn muốn xóa')"; ></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <?php echo isset($pages) ? $pages : ''; ?>
    </tr>
</table>




<?php else : ?>


<?php  endif;?> 
