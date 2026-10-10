<?php
require_once __DIR__ . '/../model/ProductDetail.php';
require_once __DIR__ . '/../model/Product.php';

class ProductDetailController {

    private ProductDetail $detailModel;
    private Product $productModel;

    public function __construct() {
        $this->detailModel = new ProductDetail();
        $this->productModel = new Product();
    }

    public function index() {
        $dsChiTiet = $this->detailModel->getAll();
        require_once __DIR__ . '/../views/productdetail/productdetail_view.php';
    }

    private function layDuLieuForm() {
        return [
            'MaSanPham' => trim($_POST['MaSanPham'] ?? ''),
            'Size'      => trim($_POST['Size'] ?? ''),
            'Mau'       => trim($_POST['Mau'] ?? ''),
            'SoLuong'   => trim($_POST['SoLuong'] ?? '')
        ];
    }

    private function kiemTra($f) {
        $errors = [];
        if ($f['MaSanPham'] === '') {
            $errors[] = 'Vui lòng chọn sản phẩm!';
        }
        if ($f['Size'] === '') {
            $errors[] = 'Kích cỡ không được để trống!';
        }
        if ($f['Mau'] === '') {
            $errors[] = 'Màu sắc không được để trống!';
        }
        if ($f['SoLuong'] === '' || !ctype_digit($f['SoLuong'])) {
            $errors[] = 'Số lượng phải là số nguyên không âm!';
        }
        return $errors;
    }

    public function create() {
        $errors = [];
        $dsSanPham = $this->productModel->getAllProducts();
        $form = ['MaSanPham' => '', 'Size' => '', 'Mau' => '', 'SoLuong' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form);

            if (empty($errors)) {
                $this->detailModel->create($form['MaSanPham'], $form['Size'], $form['Mau'], $form['SoLuong']);
                header('Location: index.php?modun=Chitiet');
                exit();
            }
        }

        require_once __DIR__ . '/../views/productdetail/productdetail_create.php';
    }

    public function edit($id) {
        $chiTiet = $this->detailModel->getById($id);
        if (!$chiTiet) {
            header('Location: index.php?modun=Chitiet');
            exit();
        }

        $errors = [];
        $dsSanPham = $this->productModel->getAllProducts();
        $form = [
            'MaSanPham' => $chiTiet->MaSanPham,
            'Size'      => $chiTiet->Size,
            'Mau'       => $chiTiet->Mau,
            'SoLuong'   => $chiTiet->SoLuong
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form);

            if (empty($errors)) {
                $this->detailModel->update($id, $form['MaSanPham'], $form['Size'], $form['Mau'], $form['SoLuong']);
                header('Location: index.php?modun=Chitiet');
                exit();
            }
        }
        require_once __DIR__ . '/../views/productdetail/productdetail_edit.php';
    }

    public function delete($id) {
        $this->detailModel->delete($id);
        header('Location: index.php?modun=Chitiet');
        exit();
    }
}