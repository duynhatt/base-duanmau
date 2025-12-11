<form method="post">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Quyền</label>
        <select name="is_main" class="form-control">
            <option value="0" <?= $user['is_main'] == 0 ? 'selected' : '' ?>>User</option>
            <option value="1" <?= $user['is_main'] == 1 ? 'selected' : '' ?>>Admin</option>
        </select>
    </div>

    <button class="btn btn-primary">Cập nhật</button>
</form>
