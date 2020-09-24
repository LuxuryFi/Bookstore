<h1>Thêm mới tác giả</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Tên tác giả</label>
        <input type="text" name="title" id="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control">
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
    </div>
    <div class="form-group">
        <label for="description">Thông tin</label>
        <textarea name="description" id="description" cols="30" rows="10">
            <?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?>
        </textarea>
    </div>
    <div class="form-group">
    <?php 
        $selected_disabled = '';
        $selected_active   = '';
        if (isset($_POST['status'])){
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
        <label for="status">Trạng thái</label>
        <select name="status" id="status" class="form-control">
            <option value="0" <?php echo $selected_disabled ?> >Disabled</option>
            <option value="1" <?php echo $selected_active ?> >Active</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" id="submit">
        <input type="reset" name="reset" class="btn btn-secondary" id="reset">
    </div>
</form>
