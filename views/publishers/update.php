<?php if (!empty($publisher)) : ?>

<h1>Chỉnh sửa nhà xuất bản <?php echo $publisher['title'] . ' - #' . $publisher['id'] ?> </h1>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Tên nhà xuất bản</label>
        <input type="text" name="title" id="title" class="form-control" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $publisher['title'] ?>">
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar" class="form-control">
    </div >
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="" cols="30" rows="10">
            <?php  echo isset($_POST['description']) ? $_POST['description'] : $publisher['description'];?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="">Quốc gia</label>
        <select name="country" id="country" class="form-control">
            <?php foreach ($countries as $country) : ?>
                <?php if (!strcmp('+'.$country['code'],$publisher['country'])  ) :?>
                    <option value="<?php echo '+'.$country['code'] ?>" selected><?php echo $country['name']?></option>
                <?php else :?>
                    <option value="<?php echo '+'.$country['code'] ?>" ><?php echo $country['name']?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
            <label for="">Số điện thoại</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $publisher['phone'];  ?>">
        <br>
    </div>
    <div class="form-group"></div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" name="address" id="address" class="form-control" value="<?php  echo isset($_POST['address']) ? $_POST['address'] : $publisher['address'];?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $publisher['email']; ?>">
    </div>
    <div class="form-group">
      <?php
      $selected_active = '';
      $selected_disabled = '';

      if (!empty($publisher)){
          switch ($publisher['status']) {
            case 0:
                $selected_disabled = 'selected';
                break;
            case 1:
                $selected_active = 'selected';
                break;
          }
      }


      else if (isset($_POST['status'])) {
        switch ($_POST['status']) {
          case 0:
            $selected_disabled = 'selected';
            break;
          case 1:
            $selected_active = 'selected';
            break;
        }
      } 

      ?>
        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <option value="0" <?php echo $selected_disabled ?> >Disabled</option>
            <option value="1" <?php echo $selected_active ?> >Active</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Cập nhật"> 
        <a href="index.php?controller=publisher"> Trở về trang chủ</a>
    </div>
</form>


<?php else : ?>

<?php endif; ?>
