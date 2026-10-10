<?php require_once __DIR__ . '/../header.php'; ?>
<div class="p-4">
    <h1 class="h3 mb-3">Thêm vào giỏ hàng</h1>
    <?php
    $formAction = 'index.php?modun=Giohang&action=Them';
    require __DIR__ . '/cart_form.php';
    ?>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
