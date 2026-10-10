<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?><li><?= h($e) ?></li><?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= h($formAction) ?>" method="POST" class="card card-body" style="max-width: 600px;">
    <div class="mb-3">
        <label class="form-label fw-semibold">Người dùng</label>
        <select name="MaNguoiDung" class="form-select">
            <option value="">-- Chọn người dùng --</option>
            <?php foreach ($dsNguoiDung as $u): ?>
                <option value="<?= h($u->id) ?>" <?= ((string)$form['MaNguoiDung'] === (string)$u->id) ? 'selected' : '' ?>>
                    <?= h($u->full_name !== '' ? $u->full_name : $u->user_name) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">Sản phẩm (size - màu)</label>
        <select name="MaChiTietSP" class="form-select">
            <option value="">-- Chọn sản phẩm --</option>
            <?php foreach ($dsChiTiet as $ct): ?>
                <option value="<?= h($ct->MaChiTietSP) ?>" <?= ((string)$form['MaChiTietSP'] === (string)$ct->MaChiTietSP) ? 'selected' : '' ?>>
                    <?= h($ct->TenSanPham) ?> - Size <?= h($ct->Size) ?> - <?= h($ct->Mau) ?> (còn <?= h($ct->SoLuong) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">Số lượng</label>
        <input type="number" name="SoLuongThem" class="form-control" min="1" value="<?= h($form['SoLuongThem']) ?>">
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="index.php?modun=Giohang" class="btn btn-secondary">Quay lại</a>
    </div>
</form>
