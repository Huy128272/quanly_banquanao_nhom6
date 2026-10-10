<?php require_once __DIR__ . '/../header.php'; ?>
<div class="p-4">
    <h1 class="h3 mb-3">Sửa người dùng</h1>
    <?php
    $formAction = 'index.php?modun=Nguoidung&action=Sua&id=' . urlencode($id);
    require __DIR__ . '/user_form.php';
    ?>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
