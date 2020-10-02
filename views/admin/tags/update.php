<h2>Chính sửa thẻ</h2>
<?php if(!empty($tag)) : ?>
<form action="" method="POST">
    <div class="form-group">
        <label for="title">Tên thẻ</label>
        <input type="text" name="title" id="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $tag['title'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="" cols="30" rows="10">
            <?php echo isset($_POST['description']) ? $_POST['description'] : $tag['description']; ?>
        </textarea>
    </div>
    <div class="form-group">
    <?php 
    $selected_active = '';
    $selected_disabled = '';

    if(isset($tag)){
        switch ($tag['status']){
            case 0:
                $selected_disabled = 'selected';
                break;
            case 1:
                $selected_active = 'selected';
                break;
        }
    }
    else if ($_POST['status']) {
        switch ($tag['status']){
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
        <a href="index.php?controller=tag" class="btn btn-secondary">Trở lại trang chính</a>
    </div>
</form>

<?php else : ?>

<?php endif; ?>