<?php if (!empty($user)) : ?>
    <h1>Thông tin chi tiết người dùng <?php echo $user['username'] ?></h1>
    <table class="table table-border">
        <tr>
            <td> Tài khoản</td>
            <td>
                <?php echo $user['username'] ?>
            </td>
        </tr>
        <tr>
            <td> Mật khẩu </td>
            <td>
                <?php echo $user['password'] ?>
            </td>
        </tr>
        <tr>
            <td>Ảnh đại diện</td>
            <td>
                <img src="assets/uploads/avatars/<?php echo $user['avatar'] ?>" alt="" width="100">
            </td>
        </tr>
        <tr>
            <td>Tên người dùng</td>
            <td>
                <?php echo $user['firstname'] . ' ' . $user['lastname'] ?>
            </td>
        </tr>
        <tr>
            <td> Email</td>
            <td>
                <?php echo $user['email'] ?>
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td>
                <?php echo $user['phone'] ?>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <?php echo $user['address'] ?>
            </td>
        </tr>
        <tr>
            <td>Ngày tạo</td>
            <td>
                <?php echo $user['created_at'] ?>
            </td>
        </tr>
        <tr>
            <td>Lần sửa đổi cuối</td>
            <td>
                <?php echo $user['updated_at'] ?>
            </td>
        </tr>
        <tr>
            <td>Lần truy cập cuối</td>
            <td>
                <?php echo $user['last_login'] ?>
            </td>
        </tr>
    </table>
    <a href="index.php?controller=user&action=index" class="btn btn-primary">Trở về trang chính</a>
    <a href="index.php?controller=user&action=update&username=<?php echo $user['username']?>" class="btn btn-secondary">Cập nhật thông tin</a>
    <br>
<?php else : ?>
    

<?php endif; ?>