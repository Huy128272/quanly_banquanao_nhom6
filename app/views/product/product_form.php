<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?><li><?= h($e) ?></li><?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= h($formAction) ?>" method="POST" class="card card-body" style="max-width: 650px;">
    <div class="mb-3">
        <label class="form-label fw-semibold">Danh mục</label>
        <select name="MaDanhMucSP" class="form-select">
            <option value="">-- Chọn danh mục --</option>
            <?php foreach ($dsDanhMuc as $dm): ?>
                <option value="<?= h($dm->MaDanhMuc) ?>" <?= ((string)$form['MaDanhMucSP'] === (string)$dm->MaDanhMuc) ? 'selected' : '' ?>>
                    <?= h($dm->TenDanhMuc) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">Tên sản phẩm</label>
        <input type="text" name="TenSanPham" class="form-control" maxlength="100" value="<?= h($form['TenSanPham']) ?>">
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Giá (VNĐ)</label>
            <input type="number" name="Gia" class="form-control" min="0" step="any" value="<?= h($form['Gia']) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Thương hiệu</label>
            <input type="text" name="ThuongHieu" class="form-control" maxlength="50" value="<?= h($form['ThuongHieu']) ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">Ảnh sản phẩm (tên file / URL)</label>
        <input type="text" name="AnhSanPham" class="form-control" maxlength="255" value="<?= h($form['AnhSanPham']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">Mô tả</label>
        <textarea name="MoTa" class="form-control" rows="3" maxlength="255"><?= h($form['MoTa']) ?></textarea>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="index.php?modun=Sanpham" class="btn btn-secondary">Quay lại</a>
    </div>
</form>
