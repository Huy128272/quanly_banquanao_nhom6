<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?><li><?= h($e) ?></li><?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= h($formAction) ?>" method="POST" class="card card-body" style="max-width: 600px;">
    <div class="mb-3">
        <label class="form-label fw-semibold">Sản phẩm</label>
        <select name="MaSanPham" class="form-select">
            <option value="">-- Chọn sản phẩm --</option>
            <?php foreach ($dsSanPham as $sp): ?>
                <option value="<?= h($sp->MaSanPham) ?>" <?= ((string)$form['MaSanPham'] === (string)$sp->MaSanPham) ? 'selected' : '' ?>>
                    <?= h($sp->TenSanPham) ?> (<?= h($sp->TenDanhMuc) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Kích cỡ</label>
            <input type="text" name="Size" class="form-control" maxlength="5" placeholder="S, M, L, XL" value="<?= h($form['Size']) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Màu sắc</label>
            <input type="text" name="Mau" class="form-control" maxlength="10" value="<?= h($form['Mau']) ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">Số lượng tồn kho</label>
        <input type="number" name="SoLuong" class="form-control" min="0" value="<?= h($form['SoLuong']) ?>">
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="index.php?modun=Chitiet" class="btn btn-secondary">Quay lại</a>
    </div>
</form>