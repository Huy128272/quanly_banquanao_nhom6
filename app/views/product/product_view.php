<?php require_once __DIR__ . '/../header.php'; ?>

<div class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Quản lý Sản Phẩm</h1>
        <a href="index.php?modun=Sanpham&action=Them" class="btn btn-primary">+ Thêm sản phẩm</a>
    </div>

    <table class="table table-striped table-hover align-middle bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Thương hiệu</th>
                <th>Mô tả</th>
                <th colspan="2" class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dsSanPham as $sp): ?>
                <tr>
                    <td><?= h($sp->MaSanPham) ?></td>
                    <td class="fw-semibold"><?= h($sp->TenSanPham) ?></td>
                    <td><?= h($sp->TenDanhMuc) ?></td>
                    <td><?= number_format($sp->Gia) ?> đ</td>
                    <td><?= h($sp->ThuongHieu) ?></td>
                    <td><?= h($sp->MoTa) ?></td>
                    <td><a href="index.php?modun=Sanpham&action=Sua&id=<?= h($sp->MaSanPham) ?>" class="btn btn-sm btn-warning">Sửa</a></td>
                    <td><a href="index.php?modun=Sanpham&action=Xoa&id=<?= h($sp->MaSanPham) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xóa sản phẩm này sẽ xóa luôn các chi tiết của nó. Bạn chắc chắn chứ?')">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($dsSanPham)): ?>
                <tr><td colspan="8" class="text-center text-muted py-4">Chưa có sản phẩm nào.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>
