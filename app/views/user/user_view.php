<?php require_once __DIR__ . '/../header.php'; ?>

<div class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Quản lý Người Dùng</h1>
        <a href="index.php?modun=Nguoidung&action=Them" class="btn btn-primary">+ Thêm người dùng</a>
    </div>

    <table class="table table-striped table-hover align-middle bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên đăng nhập</th>
                <th>Họ và tên</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Vai trò</th>
                <th colspan="2" class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dsNguoiDung as $u): ?>
                <tr>
                    <td><?= h($u->id) ?></td>
                    <td class="fw-semibold"><?= h($u->user_name) ?></td>
                    <td><?= h($u->full_name) ?></td>
                    <td><?= h($u->phone) ?></td>
                    <td><?= h($u->address) ?></td>
                    <td><span class="badge bg-info text-dark"><?= h($u->role) ?></span></td>
                    <td><a href="index.php?modun=Nguoidung&action=Sua&id=<?= h($u->id) ?>" class="btn btn-sm btn-warning">Sửa</a></td>
                    <td><a href="index.php?modun=Nguoidung&action=Xoa&id=<?= h($u->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xóa người dùng sẽ xóa luôn giỏ hàng của họ. Bạn chắc chắn chứ?')">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($dsNguoiDung)): ?>
                <tr><td colspan="8" class="text-center text-muted py-4">Chưa có người dùng nào.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>
