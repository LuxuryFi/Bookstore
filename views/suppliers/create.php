<h2>Thêm mới nhà phân phối</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên nhà phân phối</label>
        <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea class="form-control"
                  name="description"> <?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
    </div>

    <div class="form-group">  
        <label for="">Quốc gia</label>
        <select name="country" id="country" class="form-control">
              <?php foreach ($countries as $country) : ?>
                    <option value="<?php echo '+'.$country['code'] ?>"><?php echo $country['name']?></option>
              <?php endforeach; ?>
        </select>
        <label for="phone">
            Số điện thoại
        </label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($_POST['phone']) ? $_POST['phone']  : ''?>">
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" name="address" id="address" class="form-control" value="<?php echo isset($_POST['address']) ? $_POST['address']  : ''?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email']  : ''?>">
    </div>

    <div class="form-group">
      <?php
      $selected_active = '';
      $selected_disabled = '';
      if (isset($_POST['status'])) {
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

    <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>
