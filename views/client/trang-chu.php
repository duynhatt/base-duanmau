<?php
?>
<div class="container mt-3">
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php if (!empty($slides)): ?>
                <?php foreach ($slides as $k => $s): ?>
                    <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="<?= $k ?>" class="<?= $k === 0 ? 'active' : '' ?>" aria-current="<?= $k === 0 ? 'true' : 'false' ?>"></button>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="carousel-inner">
            <?php if (!empty($slides)): ?>
                <?php foreach ($slides as $k => $s): ?>
                    <div class="carousel-item <?= $k === 0 ? 'active' : '' ?>">
                        <img src="<?= !empty($s['image']) ? BASE_ASSETS_UPLOADS . $s['image'] : BASE_URL . 'assets/no-image.png' ?>" class="d-block w-100" alt="<?= htmlspecialchars($s['title'] ?? '') ?>">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="carousel-item active">
                    <img src="<?= BASE_URL ?>assets/no-image.png" class="d-block w-100" alt="slide">
                </div>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Sản phẩm mới -->
    <h3 class="mt-4">Sản phẩm mới</h3>
    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <?php $img = !empty($product['image']) ? BASE_ASSETS_UPLOADS . $product['image'] : BASE_URL . 'assets/no-image.png'; ?>
                <div class="col-3">
                    <div class="border rounded mb-4">
                        <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                            <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="mw-100 mh-100">
                        </div>
                        <div class="p-2 d-flex align-items-center justify-content-around">
                            <div>
                                <h5><?= htmlspecialchars($product['name']) ?></h5>
                                <span class="fw-bold"><?= number_format($product['price']) ?></span>
                            </div>
                            <a href="index.php?controller=home&action=detail&id=<?= $product['id'] ?>" class="btn btn-danger">Mua ngay</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm mới.</p>
        <?php endif; ?>
    </div>
</div>
