<h1>Tìm kiếm</h1>
<form method="get">
    <input type="hidden" name="controller" value="tag"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label for="">Nhập tên thẻ</label>
        <input type="text" name="title" id="tag" class="form-control" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>">
    </div>
    <div class="form-group">

        <input type="submit" name="search" id="search" value="Tìm kiếm" class="btn btn-success">
        <a href="index.php?controller=tag" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh sách thẻ</h1>
<a href="index.php?controller=tag&action=create" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <thead class="thead-light">
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Status</th>
            <th></th>
        </thead> 
    </tr>
    
    <tr>
    <?php 
        if (!empty($abc)) : ?>
    <?php foreach ($abc as $tag) :?>
        <div class="row">
        <td>
            <?php echo $tag['id'];  ?>
        </td>
        <td>
            <?php echo $tag['title']; ?>
        </td>
        <td>
            <?php echo $tag['description']; ?>
        </td>
        <td>
            <?php echo $tag['created_at']; ?>
        </td>
        <td>
            <?php echo $tag['updated_at']; ?>
        </td>
        <td>
            <?php echo $tag['status']; ?>
        </td>
        <td>
            <a href="index.php?controller=tag&action=detail&id=<?php echo $tag['id'] ?>">
                <i class="fa fa-eye"></i>
            </a>
            <a href="index.php?controller=tag&action=update&id=<?php echo $tag['id'] ?>">
                <i class="fa fa-pencil-alt"></i>
            </a>
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này?')" href="index.php?controller=tag&action=delete&id=<?php  echo $tag['id']?>">
                <i class="fa fa-trash"></i>
            </a>
        </td>
        </div> 
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="7"><?php echo "$pages"; ?></td>
    </tr>
    <?php else: ?>
        <tr>
            <td colspan="7">Không có bản ghi nào</td>
         </tr>
    <?php endif;?>
  
</table>
