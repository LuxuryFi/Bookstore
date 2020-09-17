<?php if (empty($category)): ?>
    <h2>Không tồn tại category</h2>
<?php else: ?>
    <h2>Chỉnh sửa danh mục #<?php echo $category['id'] ?></h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="title"
                   value="<?php echo isset($_POST['title']) ? $_POST['title'] : $category['title']; ?>"
                   class="form-control"/>
        </div>

        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input type="file" name="avatar" class="form-control"/>
            <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
        </div>
        <?php if (!empty($category['avatar'])): ?>
            <img src="assets/uploads/<?php echo $category['avatar']; ?>" height="50"/>
        <?php endif; ?>

        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control"
                      name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : $category['description']; ?></textarea>
        </div>
        <div class="form-group">  
            <label for="parent">
                Parent Category
            </label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="0">None</option>
            </select>
        </div>    
        <div class="form-group">
            <?php
            $selected_active = '';
            $selected_disabled = '';
            if (isset($category)){
                switch ($category['status']){
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
                <option value="0" <?php echo $selected_active ?> >Disabled</option>
                <option value="1" <?php echo $selected_disabled ?> >Active</option>
            </select>
        </div>
        <div class="form-group">
             <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
             <a href="index.php?controller=category" class="btn btn-secondary">Trở lại trang chính</a>
        </div>
       
    </form>
<?php endif; ?>
