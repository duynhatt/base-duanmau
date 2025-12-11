<div class="card">
    <div class="card-header">
        <h5>Sửa sản phẩm</h5>
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

        <?php if (empty($product)): ?>
            <p>Sản phẩm không tồn tại.</p>
        <?php else: ?>
        <form action="<?= BASE_URL_ADMIN ?>&action=update-product&id=<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Danh mục</label>
                <select name="category_id" class="form-select">
                    <option value="">-- Chọn danh mục --</option>
                    <?php foreach ($categories as $cate): ?>
                        <option value="<?= $cate['id'] ?>" <?= ($product['category_id'] == $cate['id']) ? 'selected' : '' ?>><?= htmlspecialchars($cate['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control"><?= htmlspecialchars($product['description']) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Giá</label>
                    <input type="text" name="price" class="form-control" value="<?= htmlspecialchars($product['price']) ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Số lượng</label>
                    <input type="text" name="quantity" class="form-control" value="<?= htmlspecialchars($product['quantity']) ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Ảnh sản phẩm (để trống nếu không muốn thay)</label>
                    <input type="file" name="image" accept="image/*" class="form-control" id="imageInput">
                    <div class="mt-2">
                        <?php if (!empty($product['img'])): ?>
                            <img id="imagePreview" src="<?= BASE_ASSETS_UPLOADS . $product['img'] ?>" alt="Preview" style="max-width:120px; display:block;" />
                        <?php else: ?>
                            <img id="imagePreview" src="<?= BASE_URL ?>assets/no-image.png" alt="Preview" style="max-width:120px; display:block;" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <script>
            document.getElementById('imageInput')?.addEventListener('change', function(e){
                const f = e.target.files[0];
                const img = document.getElementById('imagePreview');
                if (!f) { img.style.display='none'; img.src=''; return; }
                const url = URL.createObjectURL(f);
                img.src = url;
                img.style.display = 'block';
            });
            </script>

            <button class="btn btn-primary">Lưu</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=list-product" class="btn btn-secondary">Hủy</a>
        </form>
        <?php endif; ?>
    </div>
</div>
