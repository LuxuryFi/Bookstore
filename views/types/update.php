<h2>Chính sửa loại</h2>
<?php if(!empty($type)) : ?>
<form action="" method="POST">
    <div class="form-group">
        <label for="title">Tên loại</label>
        <input type="text" name="title" id="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $type['title'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="" cols="30" rows="10">
            <?php  echo isset($_POST['description']) ? $_POST['description'] : $type['description']; ?>
        </textarea>
    </div>
    <div class="form-group">
    <?php 
    $selected_active = '';
    $selected_disabled = '';

    if(isset($type)){
        switch ($type['status']){
            case 0:
                $selected_disabled = 'selected';
                break;
            case 1:
                $selected_active = 'selected';
                break;
        }
    }
    else if ($_POST['status']) {
        switch ($type['status']){
            case 0:
                $selected_disabled = 'selected';
                break;
            case 1:
                $selected_active = 'seleted';
                break;
        } 
    }
    ?>
        <label for="status">Trạng thái</label>
        <select name="status" id="" class="form-control">
            <option value="0" <?php echo $selected_disabled ?>>Disabled</option>
            <option value="1" <?php echo $selected_active ?>>Active</option>
        </select>
    </div>
    <div class="from-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Save">
        <a href="index.php?controller=type" class="btn btn-secondary">Trở lại trang chính</a>
    </div>
</form>

<?php else : ?>

<?php endif; ?>
