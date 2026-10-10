<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?><li><?= h($e) ?></li><?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= h($formAction) ?>" method="POST" class="card card-body" style="max-width: 650px;">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Tên đăng nhập</label>
            <input type="text" name="user_name" class="form-control" maxlength="50" value="<?= h($form['user_name']) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Vai trò</label>
            <input type="text" name="role" class="form-control" maxlength="20" value="<?= h($form['role']) ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">Mật khẩu</label>
        <input type="password" name="password" class="form-control" maxlength="50"
               placeholder="<?= !empty($nguoiDung) ? 'Để trống nếu không đổi mật khẩu' : '' ?>">
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Họ và tên</label>
            <input type="text" name="full_name" class="form-control" maxlength="100" value="<?= h($form['full_name']) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" maxlength="15" value="<?= h($form['phone']) ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">Địa chỉ</label>
        <textarea name="address" class="form-control" rows="2" maxlength="255"><?= h($form['address']) ?></textarea>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="index.php?modun=Nguoidung" class="btn btn-secondary">Quay lại</a>
    </div>
</form>
