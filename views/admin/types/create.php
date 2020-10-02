<h2>Thêm mới loại</h2>
<form action="" method="POST"> 
    <div class="form-group">
        <label for="title">Tên danh mục</label>
        <input type="text" name="title" id="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''?>"  class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea type="text" name="description" id="description" value="<?php echo isset($_POST['description']) ? $_POST['description'] : ''?>" class="form-control">
            <?php  echo isset($_POST['description']) ? $_POST['description'] : ''; ?>
        </textarea>
    </div>

    <div class="form-group">
    <?php 
        $selected_active = '';
        $selected_disabled = '';
        if (isset($_POST['status'])){
            switch ($_POST['status']){
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
            <option <?php echo $selected_disabled ?> value="0">Disabled</option>
            <option <?php echo $selected_active ?> value="1">Active</option>
        </select>
    </div>
    
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Thêm mơi">
        <input type="reset" name="reset" class="btn btn-secondary" value="Reset">
    </div>

</form>
