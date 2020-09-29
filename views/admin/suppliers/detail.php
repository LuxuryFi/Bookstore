<?php if (!empty($supplier)) : ?>

<?php
    echo "<pre>";
    print_r($supplier);
    echo "</pre>";
?>


<h1>Chi tiết nhà phân phối</h1>
<table class="table table-bordered">
    <tr>
        <td>
            ID
        </td>
        <td>
            <?php  echo $supplier['id']?>
        </td>
    </tr>
    <tr>
        <td>
            Tên nhà phân phối
        </td>
        <td>
            <?php  echo $supplier['title']?>
        </td>
    </tr>
    <tr>
        <td>
            Ảnh đại diện
        </td>
        <td>
            <img src="assets/uploads/<?php  echo $supplier['avatar']?>" alt="" width="200">
        </td>
    </tr>
    <tr>
        <td>
            Quốc gia
        </td>
        <td>
            <?php foreach ($countries as $country) :  ?>
                <?php if (!strcmp('+'.$country['code'],$supplier['country'])) : ?>
                <?php  
                    echo $country['name'];
                    break;
                ?>
                <?php endif ?>
            <?php endforeach; ?>
        </td>
    </tr>
    <tr>
        <td>
            Số điện thoại
        </td>
        <td>
            <?php  echo $supplier['phone']?>
        </td>
    </tr>
    <tr>
        <td>
            Địa chỉ
        </td>
        <td>
            <?php  echo $supplier['address']?>
        </td>
    </tr>
    <tr>
        <td>
            Email
        </td>
        <td>
            <?php  echo $supplier['email']?>
        </td>
    </tr>
    <tr>
        <td>
            Trạng thái
        </td>
        <td>
            <?php  echo $supplier['status']?>
        </td>
    </tr>
    <tr>
        <td>
            Ngày thêm
        </td>
        <td>
            <?php  echo $supplier['created_at']?>
        </td>
    </tr>
    <tr>
        <td>
            Sửa đổi lần cuối
        </td>
        <td>
            <?php  echo $supplier['updated_at']?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=supplier&action=index">Trở lại trang chính</a>
<a class="btn btn-secondary" href="index.php?controller=supplier&action=update&id=<?php echo $supplier['id'] ?>">Cập nhật thông tin</a>

<?php else : ?>

    <?php
    echo "<pre>";
    print_r($supplier);
    echo "</pre>";
?>

<?php endif; ?>
