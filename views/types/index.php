<h1>Tìm kiếm</h1>
<form action="get">
    <input type="hidden" name="controller" value="category"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label for="">Nhập tên loại</label>
        <input type="text" name="type" id="type" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="search" id="search" value="Tìm kiếm" class="btn btn-success">
        <a href="index.php?controller=type" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh sách type</h1>
<a href="index.php?controller=type&action=create" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Status</th>
    </tr>
    
    <tr>
    <?php 
        if (!empty($abc)) : ?>
    <?php foreach ($abc as $type) :?>
        <td>
            <?php echo $type['id'];  ?>
        </td>
        <td>
            <?php echo $type['title']; ?>
        </td>
        <td>
            <?php echo $type['description']; ?>
        </td>
        <td>
            <?php echo $type['created_at']; ?>
        </td>
        <td>
            <?php echo $type['updated_at']; ?>
        </td>
        <td>
            <?php echo $type['status']; ?>
        </td>
        <td>
            <a href="index.php?controller=type&action=detail&id=<?php echo $type['id'] ?>">
                <i class="fa fa-eye"></i>
            </a>
            <a href="index.php?controller=type&action=update&id=<?php echo $type['id'] ?>">
                <i class="fa fa-pencil-alt"></i>
            </a>
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này?')" href="index.php?controller=type&action=delete&id=<?php  echo $type['id']?>">
                <i class="fa fa-trash"></i>
            </a>
        </td>
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
