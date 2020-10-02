
<h1>Thêm mới người dùng</h1>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" class="form-control"  required>
    </div>
    <div class="form-group">
        <label for="repassword">Nhập lại mật khẩu</label>
        <input type="password" name="repassword" id="repassword" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="username">Ảnh đại diện</label>
        <input type="file" name="avatar" id="avatar" class="form-control">
    </div>
    <div class="form-group">
        <label for="firstname">Họ</label>
        <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" >
    </div>
    <div class="form-group">
        <label for="lastname">Tên</label>
        <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" name="address" id="address" class="form-control" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>">
    </div>
    <br>
    <div class="form-group">
        <input type="submit" class="btn btn-success" name="submit" id="submit" value="Thêm mới">
        <input type="reset" class="btn btn-danger">
    </div>
</form>
