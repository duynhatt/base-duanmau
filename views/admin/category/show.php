<div class="card">
    <div class="card-header">
        <h5>Danh mục: <?= htmlspecialchars($category['name'] ?? '') ?></h5>
    </div>
    <div class="card-body">
        <p><?= nl2br(htmlspecialchars($category['description'] ?? '')) ?></p>

        <h6>Số sản phẩm: <?= count($products ?? []) ?></h6>

        <?php if (!empty($products)): ?>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $p): ?>
                        <tr>
                            <td><?= $p['id'] ?></td>
                            <td>
                                <?php $img = !empty($p['img']) ? BASE_ASSETS_UPLOADS . $p['img'] : BASE_URL . 'assets/no-image.png'; ?>
                                <img src="<?= $img ?>" alt="<?= htmlspecialchars($p['name']) ?>" width="60" height="60">
                            </td>
                            <td><?= htmlspecialchars($p['name']) ?></td>
                            <td><?= number_format($p['price']) ?></td>
                            <td><?= htmlspecialchars($p['quantity']) ?></td>
                            <td>
                                <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>&action=show-product&id=<?= $p['id'] ?>">Xem</a>
                                <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>&action=edit-product&id=<?= $p['id'] ?>">Sửa</a>
                                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>&action=delete-product&id=<?= $p['id'] ?>" onclick="return confirm('Xác nhận xóa: <?= htmlspecialchars($p['name']) ?>?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Chưa có sản phẩm nào trong danh mục này.</p>
        <?php endif; ?>

        <a class="btn btn-secondary mt-3" href="<?= BASE_URL_ADMIN ?>&action=list-category">Quay lại danh sách</a>
    </div>
</div>