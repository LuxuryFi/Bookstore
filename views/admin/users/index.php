<h1>Quản lý người dùng</h1>

<a href="index.php?controller=user&action=create" class="btn btn-primary">Thêm mới</a>
<BR></BR>

<?php if (!empty($users)) :?>
<table class="table table-bordered">
    <tr>
        <th>Ảnh đại diện</th>
        <th>Tài khoản</th>
        <th>Mật khẩu</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Tên</th>
        <th>Ngày tạo</th>
        <th>Lần sửa đổi cuối</th>
        <td></td>
    </tr>
    <?php foreach ($users as $user) :?>
    <tr>
        <td>
            <img src="assets/uploads/avatars/<?php echo $user['avatar'] ?>" alt="" width="200">
        </td>
        <td>
            <?php echo $user['username'] ?>
        </td>
        <td>
            <?php echo $user['password'] ?>
        </td>
        <td>
            <?php echo $user['phone'] ?>
        </td>
        <td>
            <?php echo $user['email'] ?>
        </td>
        <td>
            <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>
        </td>
        <td>
            <?php echo $user['created_at'] ?>
        </td>
        <td>
            <?php echo $user['updated_at'] ?>
        </td>
        <td>
            <a href="index.php?controller=user&action=detail&username=<?php echo $user['username'] ?>"><i class="fa fa-eye"></i></a>
            <a href="index.php?controller=user&action=update&username=<?php echo $user['username'] ?>" ><i class="fa fa-pen"></i></a>
            <a href="index.php?controller=user&action=delete&username=<?php echo $user['username'] ?>"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc chắn muốn xóa')"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php else :?>


<?php endif; ?>