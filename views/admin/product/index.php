<a class="btn btn-success" href="<?= BASE_URL_ADMIN ?>&action=create-product">
        + Thêm sản phẩm
    </a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $pro) :?>
        <tr>
            <td><?= $pro["id"] ?></td>
            <td>    
                <img src="<?= BASE_ASSETS_UPLOADS . $pro["img"]?>" alt="" width="50" height="50">
            </td>
            <td><?= $pro["name"] ?></td>
            <td><?= $pro["cat_name"] ?></td>    
            <td><?= $pro["description"] ?></td>
            <td><?= $pro["price"] ?></td>
            <td><?= $pro["quantity"] ?></td>
            <td>
               <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>&action=show-product&id=<?= $pro["id"] ?>">Xem</a>
                <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>&action=edit-product&id=<?= $pro["id"] ?>">Sửa</a>
               <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>&action=delete-product&id=<?= $pro["id"] ?>" onclick="return confirm('Xác nhận xóa: <?= $pro["name"] ?>?')">Xóa</a>

                
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>