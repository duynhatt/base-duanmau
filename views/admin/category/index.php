<a class="btn btn-success" href="<?= BASE_URL_ADMIN ?>&action=create-category">
         Thêm
    </a>

    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= htmlspecialchars($c['name']) ?></td>
                            <td><?= htmlspecialchars($c['description']) ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="<?= BASE_URL_ADMIN ?>&action=show-category&id=<?= $c['id'] ?>">Xem</a>
                                <a class="btn btn-warning btn-sm text-white" href="<?= BASE_URL_ADMIN ?>&action=edit-category&id=<?= $c['id'] ?>">Sửa</a>
                                <a class="btn btn-danger btn-sm" href="<?= BASE_URL_ADMIN ?>&action=delete-category&id=<?= $c['id'] ?>" onclick="return confirm('Xác nhận xóa <?= htmlspecialchars($c['name']) ?>?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center">Không có danh mục nào.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>