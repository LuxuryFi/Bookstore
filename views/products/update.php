<h1>Cập nhật sản phẩm</h1>

<?php

?>

<?php if (!empty($product)) : ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Tên sản phẩm</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= isset($_POST['title']) ? $_POST['title'] : $product['title'] ?>">
        </div>
        <div class="form-group">
            <label for="avatar">Hình ảnh</label>
            <input type="file" name="avatar[]" id="avatar" multiple="multifile" class="form-control" accept="image/*">
            <br>
            <div class="images-box">
                 <?php foreach ($avatars as $avatar) : ?>
                    <div class="image-item">
                        <div onclick="return confirm('Bạn thực sự muốn xóa?');" class="remove-btn"><i class="fa fa-times"></i></div>
                        <img src="assets/uploads/product/<?php echo $avatar?>" alt="" width="400">
                    </div>
                    
                <?php endforeach; ?>
            </div>
           
        </div>
        <img src="#" id="img-preview" style="display: none" width="100" height="100" />
        <div class="form-group">
            <label for="price">Giá thành</label>
            <input type="text" name="price" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : $product['price'] ?>">
        </div>
        <div class="form-group">
            <label for="amount">Số lượng</label>
            <input type="text" name="amount" class="form-control" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : $product['amount'] ?>">
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" cols="30" rows="10">
            <?php echo isset($_POST['description']) ? $_POST['description'] : $product['description'] ?>
        </textarea>
        </div>
        <div class="form-group">
            <label for="content">Nội dung chi tiết</label>
            <textarea name="content" id="content" cols="30" rows="10">
            <?php echo isset($_POST['content']) ? $_POST['content'] : $product['content'] ?>
        </textarea>
        </div>
        <div class="form-group">
            <label for="author">Tác giả</label>
            <select class="form-control" searchable="Search here.." name="author_id" id="">
                <option value="0">Chọn </option>
                <?php if (!empty($authors)) : ?>
                    <?php foreach ($authors as $author) : ?>
                        <?php if ($author['id'] == (isset($_POST['author_id']) ? $_POST['author_id'] : $product['author_id'])) : ?>
                            <option value="<?php echo $author['id'] ?>" selected>
                                <?php echo $author['title']; ?>
                            </option>
                        <?php else : ?>
                            <option value="<?php echo $author['id'] ?>">
                                <?php echo $author['title']; ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif ?>
            </select>
        </div>
        <div class="form-group">
            <label for="publisher">Nhà xuất bản</label>
            <select name="publisher_id" id="" class="form-control">
                <option value="0">Chọn </option>
                <?php if (!empty($publishers)) : ?>
                    <?php foreach ($publishers as $publisher) : ?>
                        <?php if ($publisher['id'] == (isset($_POST['publisher_id']) ? $_POST['publisher_id'] : $product['publisher_id'])) : ?>
                            <option value="<?php echo $publisher['id'] ?>" selected>
                                <?php echo $publisher['title'] ?>
                            </option>
                        <?php else : ?>
                            <option value="<?php echo $publisher['id'] ?>">
                                <?php echo $publisher['title'] ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="supplier">Nhà phân phối</label>
            <select name="supplier_id" id="" class="form-control">
                <option value="0">Chọn </option>
                <?php if (!empty($suppliers)) : ?>
                    <?php foreach ($suppliers as $supplier) : ?>
                        <?php if ($supplier['id'] == (isset($_POST['supplier_id']) ? $_POST['supplier_id'] : $product['supplier_id'])) : ?>
                            <option value="<?php echo $supplier['id'] ?>" selected>
                                <?php echo $supplier['title'] ?>
                            </option>
                        <?php else : ?>
                            <option value="<?php echo $supplier['id'] ?>">
                                <?php echo $supplier['title'] ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Phân loại</label>
            <select name="type_id" id="" class="form-control">
                <option value="0">Chọn </option>
                <?php if (!empty($types)) : ?>
                    <?php foreach ($types as $type) : ?>
                        <?php if ($type['id'] == (isset($_POST['type_id']) ? $_POST['type_id'] : $product['type_id'])) : ?>
                            <option value="<?php echo $type['id'] ?>" selected>
                                <?php echo $type['title'] ?>
                            </option>
                        <?php else : ?>
                            <option value="<?php echo $type['id'] ?>">
                                <?php echo $type['title'] ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tag">Thẻ</label>
            <div class="row">
                <?php foreach ($tags as $tag) : ?>
                    <?php
                    $result = false;
                    if (!isset($_POST['tag_id'])) {
                        foreach ($checked_tags as $checked_tag)
                            if ($tag['id'] == $checked_tag['id']) {
                                $result = true;
                                break;
                            } else {
                                $result = false;
                            }
                    } else {
                        foreach ($_POST['tag_id'] as $checked_tag)
                            if ($tag['id'] == $checked_tag) {
                                $result = true;
                                break;
                            } else {
                                $result = false;
                            }
                    }
                    ?>
                    <?php if ($result) : ?>
                        <div class="col-sm-3">
                            <input class="" name="tag_id[]" type="checkbox" id="tag_checkbox<?php echo $tag['id'] ?>" value="<?php echo $tag['id'] ?>" checked>
                            <label class="" for="tag_checkbox<?php echo $tag['id'] ?>"><?php echo $tag['title'] ?></label>
                        </div>
                    <?php else : ?>
                        <div class="col-sm-3">
                            <input class="" name="tag_id[]" type="checkbox" id="tag_checkbox<?php echo $tag['id'] ?>" value="<?php echo $tag['id'] ?>">
                            <label class="" for="tag_checkbox<?php echo $tag['id'] ?>"><?php echo $tag['title'] ?></label>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="category">Thể loại</label>
            <div class="row">
                <?php foreach ($categories as $category) : ?>
                    <div class="col-sm-3">
                        <input class="" name="category_id[]" type="checkbox" id="cate_checkbox<?= $category['id']; ?>" value="<?= $category['id']; ?>" <?= in_array($category['id'], $_POST['category_id'] ?? $checked_categories) ? 'checked' : null; ?>>
                        <label class="" for="cate_checkbox<?= $category['id']; ?>"><?= $category['title']; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
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
            <label for="status">Trạng thái</label>
            <select name="status" id="" class="form-control">
                <option value="0" <?php echo $selected_disabled ?>>Disabled</option>
                <option value="1" <?php echo $selected_active ?>>Active</option>
            </select>
        </div>
        <div class="form-group">
            <label for="seo_title">Seo Title</label>
            <input type="text" class="form-control" name="seo_title" id="seo_title" value="<?php echo isset($_POST['seo_title']) ? $_POST['seo_title'] : $product['seo_title'] ?>">
        </div>
        <div class="form-group">
            <label for="seo_description">Seo Description</label>
            <input type="text" class="form-control" name="seo_description" id="seo_description" value="<?php echo isset($_POST['seo_description']) ? $_POST['seo_description'] : $product['seo_description'] ?>">
        </div>
        <div class="form-group">
            <label for="seo_keywords">Seo Keyword</label>
            <input type="text" class="form-control" name="seo_keywords" id="seo_keywords" value="<?php echo isset($_POST['seo_keywords']) ? $_POST['seo_keywords'] : $product['seo_keywords']  ?>">
        </div>

        <input type="submit" name="submit" class="btn btn-success" value="Cập nhật">
        <input type="reset" name="reset" class="btn btn-danger">
    </form>

<?php else : ?>
    <?php
    echo "<pre>";
    print_r($product);
    echo "</pre>";
    ?>

    <?php
    echo "<pre>";
    print_r($checked_categories);
    echo "</pre>";

    echo "<pre>";
    print_r($checked_tags);
    echo "</pre>";

    echo "<pre>";
    print_r($categories);
    echo "</pre>";
    ?>

<?php endif; ?>
