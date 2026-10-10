<?php require_once __DIR__ . '/../header.php'; ?>
<div class="p-4">
    <h1 class="h3 mb-3">Thêm danh mục</h1>
    <?php
    $formAction = 'index.php?modun=Danhmuc&action=Them';
    require __DIR__ . '/category_form.php';
    ?>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
