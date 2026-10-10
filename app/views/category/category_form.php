<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?><li><?= h($e) ?></li><?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= h($formAction) ?>" method="POST" class="card card-body" style="max-width: 600px;">
    <div class="mb-3">
        <label class="form-label fw-semibold">Tên danh mục</label>
        <input type="text" name="TenDanhMuc" class="form-control" maxlength="50" value="<?= h($form['TenDanhMuc']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">Mô tả</label>
        <textarea name="MoTa" class="form-control" rows="3" maxlength="255"><?= h($form['MoTa']) ?></textarea>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="index.php?modun=Danhmuc" class="btn btn-secondary">Quay lại</a>
    </div>
</form>
