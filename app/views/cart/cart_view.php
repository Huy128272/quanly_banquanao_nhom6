<?php require_once __DIR__ . '/../header.php'; ?>

<div class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Quản lý Giỏ Hàng</h1>
        <a href="index.php?modun=Giohang&action=Them" class="btn btn-primary">+ Thêm vào giỏ</a>
    </div>

    <table class="table table-striped table-hover align-middle bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Size</th>
                <th>Màu</th>
                <th>Số lượng</th>
                <th colspan="2" class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dsGioHang as $g): ?>
                <tr>
                    <td><?= h($g->MaGioHang) ?></td>
                    <td><?= h($g->full_name !== '' ? $g->full_name : $g->user_name) ?></td>
                    <td class="fw-semibold"><?= h($g->TenSanPham) ?></td>
                    <td><?= h($g->Size) ?></td>
                    <td><?= h($g->Mau) ?></td>
                    <td><?= h($g->SoLuongThem) ?></td>
                    <td><a href="index.php?modun=Giohang&action=Sua&id=<?= h($g->MaGioHang) ?>" class="btn btn-sm btn-warning">Sửa</a></td>
                    <td><a href="index.php?modun=Giohang&action=Xoa&id=<?= h($g->MaGioHang) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa mục này khỏi giỏ hàng?')">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($dsGioHang)): ?>
                <tr><td colspan="8" class="text-center text-muted py-4">Giỏ hàng trống.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>
