<div class="container">
    <h2 class="mb-3"><?= htmlspecialchars($category['name'] ?? 'Danh mục') ?></h2>
    <p class="text-muted"><?= htmlspecialchars($category['description'] ?? '') ?></p>

    <?php if (!empty($products)): ?>
    <div class="row">
        <?php foreach ($products as $p): ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <?php if (!empty($p['img'])): ?>
                    <img src="<?= BASE_ASSETS_UPLOADS . $p['img'] ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($p['name']) ?></h5>
                    <p class="card-text text-truncate"><?= htmlspecialchars($p['description']) ?></p>
                    <p class="card-text"><strong><?= number_format($p['price'], 0, ',', '.') ?> đ</strong></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <div class="alert alert-info">Hiện chưa có sản phẩm trong danh mục này.</div>
    <?php endif; ?>
</div>