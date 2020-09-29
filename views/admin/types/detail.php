<?php if(!empty($type)) : ?>
<h1>Chi tiết types</h1>
<table class="table table-bordered">
<tr>
        <td>ID</td>
        <td>
            <?php  echo $type['id']; ?>
        </td>
    </tr>
    <tr>
        <td>Tên tác giả</td>
        <td>
            <?php  echo $type['title']; ?>
        </td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td>
            <?php  echo $type['description']; ?>
        </td>
    </tr>
    <tr>
        <td>Trạng thái</td>
        <td>
            <?php  echo $type['status']; ?>
        </td>
    </tr>
    <tr>
        <td>Ngày tạo</td>
        <td>
            <?php  echo $type['created_at']; ?>   
        </td>
    </tr>
    <tr>
        <td>Sửa đổi lần cuối</td>
        <td>
            <?php  echo $type['updated_at']; ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=type&action=index">Trở lại trang chính</a>
<a class="btn btn-secondary" href="index.php?controller=type&action=update&id=<?php echo $type['id'] ?>">Cập nhật thông tin</a>

<?php else : ?>


<?php endif; ?>
