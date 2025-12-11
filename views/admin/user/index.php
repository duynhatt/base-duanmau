<a href="<?= BASE_URL_ADMIN ?>&action=add-user" class="btn btn-success">+ Thêm tài khoản</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Quyền</th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($data as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['username'] ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['is_main'] == 1 ? 'Admin' : 'User' ?></td>
            <td>
                <a href="<?= BASE_URL_ADMIN ?>&action=edit-user&id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                <a href="<?= BASE_URL_ADMIN ?>&action=delete-user&id=<?= $u['id'] ?>"
                   onclick="return confirm('Xoá tài khoản?')"
                   class="btn btn-danger btn-sm">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
