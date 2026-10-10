<?php require_once __DIR__ . '/../header.php'; ?>

<div class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Quản lý Danh Mục</h1>
        <a href="index.php?modun=Danhmuc&action=Them" class="btn btn-primary">+ Thêm danh mục</a>
    </div>

    <?php if (!empty($loi)): ?>
        <div class="alert alert-danger"><?= h($loi) ?></div>
    <?php endif; ?>

    <table class="table table-striped table-hover align-middle bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th colspan="2" class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dsDanhMuc as $dm): ?>
                <tr>
                    <td><?= h($dm->MaDanhMuc) ?></td>
                    <td class="fw-semibold"><?= h($dm->TenDanhMuc) ?></td>
                    <td><?= h($dm->MoTa) ?></td>
                    <td><a href="index.php?modun=Danhmuc&action=Sua&id=<?= h($dm->MaDanhMuc) ?>" class="btn btn-sm btn-warning">Sửa</a></td>
                    <td><a href="index.php?modun=Danhmuc&action=Xoa&id=<?= h($dm->MaDanhMuc) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($dsDanhMuc)): ?>
                <tr><td colspan="5" class="text-center text-muted py-4">Chưa có danh mục nào.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>