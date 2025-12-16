<div class="">
    <div class="card-header">
        <h5>Chi tiết sản phẩm</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($product)): ?>
            <div class="">
                <div class="md-4">
                    <?php $img = !empty($product['img']) ? BASE_ASSETS_UPLOADS . $product['img'] : BASE_URL . 'assets/no-image.png'; ?>
                    <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p><strong>Danh mục:</strong> <?= htmlspecialchars($product['cat_name'] ?? '') ?></p>
                    <p><strong>Giá:</strong> <?= number_format($product['price']) ?> VNĐ</p>
                    <p><strong>Số lượng:</strong> <?= htmlspecialchars($product['quantity']) ?></p>
                    <p><strong>Mô tả:</strong></p>
                    <div><?= nl2br(htmlspecialchars($product['description'])) ?></div>
                    <div class="mt-3">
                        <a class="btn btn-primary btn-sm" href="<?= BASE_URL_ADMIN ?>&action=list-product">Quay lại</a>
                        <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>&action=edit-product&id=<?= $product['id'] ?>">Sửa</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p>Sản phẩm không tồn tại.</p>
        <?php endif; ?>
    </div>
</div>
