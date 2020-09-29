<?php if (!empty($publisher)) : ?>
    <?php
    echo "<pre>";
    print_r($publisher);
    echo "</pre>";
?>
<h1>Chi tiết nhà xuất bản</h1>
<table class="table table-bordered">
    <tr>
        <td>
            ID
        </td>
        <td>
            <?php  echo $publisher['id']?>
        </td>
    </tr>
    <tr>
        <td>
            Tên nhà xuất bản
        </td>
        <td>
            <?php  echo $publisher['title']?>
        </td>
    </tr>
    <tr>
        <td>
            Ảnh đại diện
        </td>
        <td>
            <img src="assets/uploads/<?php  echo $publisher['avatar']?>" alt="" width="200">
        </td>
    </tr>
    <tr>
        <td>
            Số điện thoại
        </td>
        <td>
            <?php  echo $publisher['phone']?>
        </td>
    </tr>
    <tr>
        <td>
           Quốc gia
        </td>
        <td>
            <?php foreach ($countries as $country) :  ?>
                <?php if (!strcmp('+'.$country['code'],$publisher['country'])) : ?>
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
            Địa chỉ
        </td>
        <td>
            <?php  echo $publisher['address']?>
        </td>
    </tr>
    <tr>
        <td>
            Email
        </td>
        <td>
            <?php  echo $publisher['email']?>
        </td>
    </tr>
    <tr>
        <td>
            Trạng thái
        </td>
        <td>
            <?php  echo $publisher['status']?>
        </td>
    </tr>
    <tr>
        <td>
            Ngày thêm
        </td>
        <td>
            <?php  echo $publisher['created_at']?>
        </td>
    </tr>
    <tr>
        <td>
            Sửa đổi lần cuối
        </td>
        <td>
            <?php  echo $publisher['updated_at']?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=publisher&action=index">Trở lại trang chính</a>
<a class="btn btn-secondary" href="index.php?controller=publisher&action=update&id=<?php echo $publisher['id'] ?>">Cập nhật thông tin</a>

<?php else : ?>
    <?php
    echo "<pre>";
    print_r($publisher);
    echo "</pre>";
?>

<?php endif; ?>
