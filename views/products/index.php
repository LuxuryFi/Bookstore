<h1>Tìm kiếm</h1>


<h1>Danh sách sản phẩm</h1>
<a href="index.php?controller=product&action=create" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>

<?php if (!empty($products)) : ?>
<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
?>

<table class="table-bordered table">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
    </tr>
    <?php foreach($products as $key => $product) : ?>
    <tr>
        <td>
            <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">  
                <?php echo $product['id'] ?>
            </a>
        </td>
        <td>
            <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">
                <?php echo $product['title'] ?>
            </a>
        </td>
        <td>
            <?php 
                $images = explode('/',$product['avatar']);
                
            ?>
            <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">
                <img src="assets/uploads/product/<?php echo $images['0'] ?>" alt="" width="100">
            </a>
        </td>
        <td>
            <?php echo $product['price'] ?>
        </td>
        <td>
            <?php echo $product['amount'] ?>
        </td>
        <td>
            <?php echo Helper::GetStatus($product['status'])?>
        </td>
        <td>
            <?php echo $product['created_at'] ?> 
        </td>
        <td>
            <?php echo $product['updated_at'] ?>
        </td>
        <td>
            <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']?>"><i class="fa fa-eye"></i></a>
            <a href="index.php?controller=product&action=update&id=<?php echo $product['id']?>"><i class="fa fa-pen"></i></a>
            <a href="index.php?controller=product&action=delete&id=<?php echo $product['id']?>"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    <?php endforeach ?>

</table>
<?php if (!empty($pages)) 
    echo $pages;
?>

<?php else : ?>
    <?php
     echo "<pre>";
     print_r($products);
     echo "</pre>"; 
    ?>

<?php endif ?>
