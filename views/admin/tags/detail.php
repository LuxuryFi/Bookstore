<?php if(!empty($tag)) : ?>
<h1>Chi tiết thẻ</h1>
<table class="table table-bordered">
<tr>
        <td>ID</td>
        <td>
            <?php  echo $tag['id']; ?>
        </td>
    </tr>
    <tr>
        <td>Tên tác giả</td>
        <td>
            <?php  echo $tag['title']; ?>
        </td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td>
            <?php  echo $tag['description']; ?>
        </td>
    </tr>
    <tr>
        <td>Trạng thái</td>
        <td>
            <?php  echo $tag['status']; ?>
        </td>
    </tr>
    <tr>
        <td>Ngày tạo</td>
        <td>
            <?php  echo $tag['created_at']; ?>   
        </td>
    </tr>
    <tr>
        <td>Sửa đổi lần cuối</td>
        <td>
            <?php  echo $tag['updated_at']; ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=tag&action=index">Trở lại trang chính</a>
<a class="btn btn-secondary" href="index.php?controller=tag&action=update&id=<?php echo $tag['id'] ?>">Cập nhật thông tin</a>

<?php else : ?>


<?php endif; ?>
