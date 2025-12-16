<form method="POST" action="<?= BASE_URL_ADMIN ?>&action=store-user">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Quyền</label>
        <select name="is_main" class="form-control">
            <option value="0">User</option>
            <option value="1">Admin</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Thêm</button>
</form>
