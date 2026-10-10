<?php
require_once __DIR__ . '/../model/Category.php';

class CategoryController {

    private Category $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    public function index() {
        $dsDanhMuc = $this->categoryModel->getAll();
        require_once __DIR__ . '/../views/category/category_view.php';
    }

    private function layDuLieuForm() {
        return [
            'TenDanhMuc' => trim($_POST['TenDanhMuc'] ?? ''),
            'MoTa'       => trim($_POST['MoTa'] ?? '')
        ];
    }

    private function kiemTra($f) {
        $errors = [];
        if ($f['TenDanhMuc'] === '') {
            $errors[] = 'Tên danh mục không được để trống!';
        }
        return $errors;
    }

    public function create() {
        $errors = [];
        $form = ['TenDanhMuc' => '', 'MoTa' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form);

            if (empty($errors)) {
                $this->categoryModel->create($form['TenDanhMuc'], $form['MoTa']);
                header('Location: index.php?modun=Danhmuc');
                exit();
            }
        }

        require_once __DIR__ . '/../views/category/category_create.php';
    }

    public function edit($id) {
        $danhMuc = $this->categoryModel->getById($id);
        if (!$danhMuc) {
            header('Location: index.php?modun=Danhmuc');
            exit();
        }

        $errors = [];
        $form = ['TenDanhMuc' => $danhMuc->TenDanhMuc, 'MoTa' => $danhMuc->MoTa];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form);

            if (empty($errors)) {
                $this->categoryModel->update($id, $form['TenDanhMuc'], $form['MoTa']);
                header('Location: index.php?modun=Danhmuc');
                exit();
            }
        }

        require_once __DIR__ . '/../views/category/category_edit.php';
    }

    public function delete($id) {
        try {
            $this->categoryModel->delete($id);
            header('Location: index.php?modun=Danhmuc');
            exit();
        } catch (PDOException $e) {
            // Danh mục đang có sản phẩm -> khóa ngoại chặn xóa
            $loi = 'Không thể xóa danh mục này vì vẫn còn sản phẩm thuộc danh mục.';
            $dsDanhMuc = $this->categoryModel->getAll();
            require_once __DIR__ . '/../views/category/category_view.php';
        }
    }
}
