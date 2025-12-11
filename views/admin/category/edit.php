<div class="card">
    <div class="card-header">
        <h5>Sửa danh mục</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= BASE_URL_ADMIN ?>&action=update-category" method="post">
            <input type="hidden" name="id" value="<?= $category['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($category['name'] ?? '') ?>">
                <?php if (!empty($errors['name'])): ?>
                    <div class="text-danger small mt-1"><?= htmlspecialchars($errors['name']) ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control"><?= htmlspecialchars($category['description'] ?? '') ?></textarea>
                <?php if (!empty($errors['description'])): ?>
                    <div class="text-danger small mt-1"><?= htmlspecialchars($errors['description']) ?></div>
                <?php endif; ?>
            </div>
            <button class="btn btn-primary">Cập nhật</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=list-category" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
