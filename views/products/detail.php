<h1>Chi tiết sản phẩm</h1>

<?php if (!empty($product)) : ?>



<table class="table table-bordered">
    <tr>
        <td>ID</td>
        <td>
            <?php echo $product['id'] ?>
        </td>
    </tr>
    <tr>
        <td>Tên sản phẩm</td>
        <td>
            <?php echo $product['id'] ?>
        </td>
    </tr>
    <tr>
        <td>Giá</td>
        <td>
            <?php echo $product['title'] ?>
        </td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td>
            <?php echo $product['id'] ?>
        </td>
    </tr>
    <tr>
        <td>Thẻ</td>
        <td>
            <?php echo $tag ?>
        </td>
    </tr>
    <tr>
        <td>Thể loại</td>
        <td>
            <?php echo $category ?>
        </td>
    </tr>
    <tr>
        <td>Tác giả</td>
        <td>
            <?php echo $product['author_title'] ?>
        </td>
    </tr>
    <tr>
        <td>Nhà xuất bản</td>
        <td>
            <?php echo $product['publisher_title'] ?>
        </td>
    </tr>
    <tr>
        <td>Nhà phân phối</td>
        <td>
            <?php echo $product['supplier_title'] ?>
        </td>
    </tr>
    <tr>
        <td>Ngày tạo</td>
        <td>
            <?php echo $product['created_at'] ?>
        </td>
    </tr>
    <tr>
        <td>Sửa đổi lần cuối</td>
        <td>
            <?php echo $product['updated_at'] ?>
        </td>
    </tr>
    <tr>
        <td>Trạng thái</td>
        <td>
            <?php echo Helper::GetStatus($product['status']) ?>
        </td>
    </tr>
    <tr>
        <td>Tiêu đề SEO</td>
        <td>
            <?php echo $product['seo_title'] ?>
        </td>
    </tr>
    <tr>
        <td>Mô tả SEO</td>
        <td>
            <?php echo $product['seo_description'] ?>
        </td>
    </tr>
    <tr>
        <td>Từ khóa SEO</td>
        <td>
            <?php echo $product['seo_keywords'] ?>
        </td>
    </tr>


    <?php 
        $images = explode('/',$product['avatar']);       
    ?>
    <tr>
        
        <td colspan="2">
            <label for="">Hình ảnh</label><br>
            <?php foreach ($images as $image) :?>
                <img src="assets/uploads/product/<?php echo $image?>" alt="" width="400">
            <?php endforeach ?>
            
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=product">Trở lại trang chính</a>
<a class="btn btn-secondary" href="index.php?controller=product&action=update">Cập nhật thông tin</a>

<?php if (!empty($pages)) 
    echo $pages;
?>

<?php else :?>
    <?php
     echo "<pre>";
     print_r($product);
     echo "</pre>"; 
    ?>

<?php
    
     echo $category;
    
    ?>

<?php
     
     echo $tag;
     
?>



<?php endif ?>
