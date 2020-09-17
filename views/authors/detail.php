<?php if(!empty($author)) :  ?>


<h1>Chi tiết tác giả</h1>

<table class="table table-bordered">
    <tr>
        <td>ID</td>
        <td>
            <?php  echo $author['id']; ?>
        </td>
    </tr>
    <tr>
        <td>Tên tác giả</td>
        <td>
            <?php  echo $author['title']; ?>
        </td>
    </tr>
    <tr>
        <td>Ảnh đại diện</td>
        <td>
            <img src="assets/uploads/<?php  echo $author['avatar']; ?>" alt="" width="300">
        </td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td>
            <?php  echo $author['description']; ?>
        </td>
    </tr>
    <tr>
        <td>Trạng thái</td>
        <td>
            <?php  echo $author['status']; ?>
        </td>
    </tr>
    <tr>
        <td>Ngày tạo</td>
        <td>
            <?php  echo $author['created_at']; ?>   
        </td>
    </tr>
    <tr>
        <td>Sửa đổi lần cuối</td>
        <td>
            <?php  echo $author['updated_at']; ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=author&action=index">Trở lại trang chính</a>
<a class="btn btn-secondary" href="index.php?controller=author&action=update&id=<?php echo $author['id'] ?>">Cập nhật thông tin</a>


<?php else : ?>

<?php endif; ?>
