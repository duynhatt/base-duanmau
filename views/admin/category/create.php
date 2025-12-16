<div >
    <div class="card-header">
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
        <form action="<?= BASE_URL_ADMIN ?>&action=store-category" method="post">
            <div class="mb-3">
                <label class="form-label">Tên</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($old['name'] ?? ($_POST['name'] ?? '')) ?>">
                <?php if (!empty($errors['name'])): ?>
                    <div class="text-danger small mt-1"><?= htmlspecialchars($errors['name']) ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <input name="description" class="form-control"><?= htmlspecialchars($old['description'] ?? ($_POST['description'] ?? '')) ?></input>
                <?php if (!empty($errors['description'])): ?>
                    <div class=""><?= htmlspecialchars($errors['description']) ?></div>
                <?php endif; ?>
            </div>
            <button class="btn btn-primary">thêm</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=list-category" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
