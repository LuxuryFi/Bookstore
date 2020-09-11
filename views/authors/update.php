<?php if(!empty($author)) : ?>



<h1>Chỉnh sửa tác giả <?php echo $author['title'] . " ID " . $author['id'] ?></h1>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form">
        <label for="title">Tên tác giả</label>
        <input type="text" name="title" id="title" class="form-control" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $author['title'] ?>">
    </div>
    <div>
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" class="form-control">
    </div>
    <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
      <?php if (!empty($author['avatar'])): ?>
          <img height="80" src="assets/uploads/<?php echo $author['avatar'] ?>"/>
      <?php endif; ?>
    <div class="form-group">
        <label for="description">Thông tin</label>
        <textarea name="description" id="" cols="30" rows="10" class="">
            <?php echo isset($_POST['description']) ? $_POST['description'] : $author['description'] ?>
        </textarea>
    </div>
    <div class="form-group">
    <?php 
        $selected_disabled = '';
        $selected_active   = '';
        if (!empty($author)){
            switch ($author['status']){
                case 0:
                    $selected_disabled = 'selected';
                    break;
                case 1:
                    $selected_active = 'selected';
                    break;
            }
        }
        else if (isset($_POST['submit'])) {
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
        <select name="status" id="" class="form-control">
            <option value="0" <?php echo $selected_disabled?> >Disabled</option>
            <option value="1" <?php echo $selected_active?> >Active</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary">
        <input type="reset" name="reset" class="btn btn-secondary">
    </div>

</form>


<?php else : ?>

<?php 
// echo "<pre>";     
// print_r($author);
// echo "</pre>";
?>

<h1>Sai tác giả</h1>

<?php endif; ?>
