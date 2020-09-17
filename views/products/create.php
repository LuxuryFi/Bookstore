<h1>Thêm mới sản phẩm</h1>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Tên sản phẩm</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="avatar">Hình ảnh</label>
        <input type="file" name="avatar[]" id="avatar" multiple="multifile" class="form-control" accept="image/*">
    </div>
    <div class="form-group">
        <label for="price">Giá thành</label>
        <input type="text" name="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="amount">Số lượng</label>
        <input type="text" name="amount" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="content">Nội dung chi tiết</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="author">Tác giả</label>
        <select class="form-control" searchable="Search here.." name="author_id" id="" >
            <option value="0">Chọn </option>
            <?php if (!empty($authors)) : ?>
                <?php foreach ($authors as $author) :?>
                    <option value="<?php echo $author['id']?>">
                        <?php echo $author['title']; ?>
                    </option>
                <?php endforeach; ?>
            <?php endif ?>
        </select>
    </div>
    <div class="form-group">
        <label for="publisher">Nhà xuất bản</label>
        <select name="publisher_id" id="" class="form-control">
            <option value="0">Chọn </option>
            <?php  if (!empty($publishers)) : ?>
                <?php foreach ($publishers as $publisher) : ?>
                    <option value="<?php echo $publisher['id'] ?>"><?php echo $publisher['title'] ?> </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="supplier">Nhà phân phối</label>
        <select name="supplier_id" id="" class="form-control">
                <option value="0">Chọn </option>
            <?php  if (!empty($suppliers)) : ?>
                <?php foreach ($suppliers as $supplier) : ?>
                    <option value="<?php echo $supplier['id'] ?>"><?php echo $supplier['title'] ?> </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Phân loại</label>
        <select name="type_id" id="" class="form-control">
            <option value="0">Chọn </option>
            <?php  if (!empty($types)) : ?>
                <?php foreach ($types as $type) : ?>
                    <option value="<?php echo $type['id'] ?>"><?php echo $type['title'] ?> </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tag">Thẻ</label>
        <div class="row">
            <?php foreach($tags as $tag) :?>
                <div class="col-sm-3">    
                    <input class="" name="tag_id[]" type="checkbox" id="tag_checkbox<?php echo $tag['id'] ?>" value="<?php echo $tag['id'] ?>">
                    <label class="" for="tag_checkbox<?php echo $tag['id'] ?>"><?php echo $tag['title'] ?></label>
                </div> 
            <?php endforeach; ?>
        </div>
    </div>
    <div class="form-group">
        <label for="category">Thể loại</label>
        <div class="row">
            <?php foreach($categories as $category) :?>
                <div class="col-sm-3">    
                    <input class="" name="category_id[]" type="checkbox" id="cate_checkbox<?php echo $category['id'] ?>" value="<?php echo $category['id'] ?>">
                    <label class="" for="cate_checkbox<?php echo $category['id'] ?>"><?php echo $category['title'] ?></label>
                </div> 
            <?php endforeach; ?>
        </div>
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
        <select name="status" id="" class="form-control">
            <option value="0" <?php echo $selected_disabled ?> >Disabled</option>
            <option value="1" <?php echo $selected_active ?>>Active</option>
        </select>
    </div>
    <div class="form-group">
        <label for="seo_title">Seo Title</label>
        <input type="text" class="form-control" name="seo_title" id="seo_title">
    </div>
    <div class="form-group">
        <label for="seo_description">Seo Description</label>
        <input type="text" class="form-control" name="seo_description" id="seo_description">
    </div>
    <div class="form-group">
        <label for="seo_keywords">Seo Keyword</label>
        <input type="text" class="form-control" name="seo_keywords" id="seo_keywords">
    </div>

    <input type="submit" name="submit" class="btn btn-success" value="Thêm mới">
    <input type="reset" name="reset" class="btn btn-danger">
</form>
