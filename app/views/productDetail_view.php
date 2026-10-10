<?php require_once __DIR__ . '/../header.php'; ?>

<div class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Chi Tiết Sản Phẩm (Size / Màu / Tồn kho)</h1>
        <a href="index.php?modun=Chitiet&action=Them" class="btn btn-primary">+ Thêm chi tiết</a>
    </div>

    <table class="table table-striped table-hover align-middle bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Sản phẩm</th>
                <th>Kích cỡ</th>
                <th>Màu</th>
                <th>Tồn kho</th>
                <th colspan="2" class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dsChiTiet as $ct): ?>
                <tr>
                    <td><?= h($ct->MaChiTietSP) ?></td>
                    <td class="fw-semibold"><?= h($ct->TenSanPham) ?></td>
                    <td><?= h($ct->Size) ?></td>
                    <td><?= h($ct->Mau) ?></td>
                    <td><?= h($ct->SoLuong) ?></td>
                    <td><a href="index.php?modun=Chitiet&action=Sua&id=<?= h($ct->MaChiTietSP) ?>" class="btn btn-sm btn-warning">Sửa</a></td>
                    <td><a href="index.php?modun=Chitiet&action=Xoa&id=<?= h($ct->MaChiTietSP) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa chi tiết này?')">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($dsChiTiet)): ?>
                <tr><td colspan="7" class="text-center text-muted py-4">Chưa có chi tiết nào.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>