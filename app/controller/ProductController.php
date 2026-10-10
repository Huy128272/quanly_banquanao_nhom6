<?php
require_once __DIR__ . '/../model/Product.php';
require_once __DIR__ . '/../model/Category.php';

class ProductController {

    private Product $productModel;
    private Category $categoryModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }

    public function index() {
        $dsSanPham = $this->productModel->getAllProducts();
        require_once __DIR__ . '/../views/product/product_view.php';
    }

    private function layDuLieuForm() {
        return [
            'MaDanhMucSP' => trim($_POST['MaDanhMucSP'] ?? ''),
            'TenSanPham'  => trim($_POST['TenSanPham'] ?? ''),
            'AnhSanPham'  => trim($_POST['AnhSanPham'] ?? ''),
            'Gia'         => trim($_POST['Gia'] ?? ''),
            'ThuongHieu'  => trim($_POST['ThuongHieu'] ?? ''),
            'MoTa'        => trim($_POST['MoTa'] ?? '')
        ];
    }

    private function kiemTra($f) {
        $errors = [];
        if ($f['MaDanhMucSP'] === '') {
            $errors[] = 'Vui lòng chọn danh mục!';
        }
        if ($f['TenSanPham'] === '') {
            $errors[] = 'Tên sản phẩm không được để trống!';
        }
        if ($f['Gia'] === '' || !is_numeric($f['Gia']) || $f['Gia'] < 0) {
            $errors[] = 'Giá phải là số và không được âm!';
        }
        return $errors;
    }

    public function create() {
        $errors = [];
        $dsDanhMuc = $this->categoryModel->getAll();
        $form = ['MaDanhMucSP' => '', 'TenSanPham' => '', 'AnhSanPham' => '',
                 'Gia' => '', 'ThuongHieu' => '', 'MoTa' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form);

            if (empty($errors)) {
                $this->productModel->createProduct(
                    $form['MaDanhMucSP'], $form['TenSanPham'], $form['AnhSanPham'],
                    $form['Gia'], $form['ThuongHieu'], $form['MoTa']
                );
                header('Location: index.php?modun=Sanpham');
                exit();
            }
        }

        require_once __DIR__ . '/../views/product/product_create.php';
    }

    public function edit($id) {
        $sanPham = $this->productModel->getProductById($id);
        if (!$sanPham) {
            header('Location: index.php?modun=Sanpham');
            exit();
        }

        $errors = [];
        $dsDanhMuc = $this->categoryModel->getAll();
        $form = [
            'MaDanhMucSP' => $sanPham->MaDanhMucSP,
            'TenSanPham'  => $sanPham->TenSanPham,
            'AnhSanPham'  => $sanPham->AnhSanPham,
            'Gia'         => $sanPham->Gia,
            'ThuongHieu'  => $sanPham->ThuongHieu,
            'MoTa'        => $sanPham->MoTa
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form);

            if (empty($errors)) {
                $this->productModel->updateProduct(
                    $id, $form['MaDanhMucSP'], $form['TenSanPham'], $form['AnhSanPham'],
                    $form['Gia'], $form['ThuongHieu'], $form['MoTa']
                );
                header('Location: index.php?modun=Sanpham');
                exit();
            }
        }

        require_once __DIR__ . '/../views/product/product_edit.php';
    }

    public function delete($id) {
        $this->productModel->deleteProduct($id);
        header('Location: index.php?modun=Sanpham');
        exit();
    }
}
