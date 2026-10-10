<?php
require_once __DIR__ . '/../model/Cart.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/ProductDetail.php';

class CartController {

    private Cart $cartModel;
    private User $userModel;
    private ProductDetail $detailModel;

    public function __construct() {
        $this->cartModel = new Cart();
        $this->userModel = new User();
        $this->detailModel = new ProductDetail();
    }

    public function index() {
        $dsGioHang = $this->cartModel->getAll();
        require_once __DIR__ . '/../views/cart/cart_view.php';
    }

    private function layDuLieuForm() {
        return [
            'MaNguoiDung' => trim($_POST['MaNguoiDung'] ?? ''),
            'MaChiTietSP' => trim($_POST['MaChiTietSP'] ?? ''),
            'SoLuongThem' => trim($_POST['SoLuongThem'] ?? '')
        ];
    }

    private function kiemTra($f) {
        $errors = [];
        if ($f['MaNguoiDung'] === '') {
            $errors[] = 'Vui lòng chọn người dùng!';
        }
        if ($f['MaChiTietSP'] === '') {
            $errors[] = 'Vui lòng chọn sản phẩm!';
        }
        if ($f['SoLuongThem'] === '' || !ctype_digit($f['SoLuongThem']) || (int)$f['SoLuongThem'] <= 0) {
            $errors[] = 'Số lượng phải là số nguyên lớn hơn 0!';
        }
        return $errors;
    }

    public function create() {
        $errors = [];
        $dsNguoiDung = $this->userModel->getAllUsers();
        $dsChiTiet = $this->detailModel->getAll();
        $form = ['MaNguoiDung' => '', 'MaChiTietSP' => '', 'SoLuongThem' => '1'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form);

            if (empty($errors)) {
                $this->cartModel->create($form['MaNguoiDung'], $form['MaChiTietSP'], $form['SoLuongThem']);
                header('Location: index.php?modun=Giohang');
                exit();
            }
        }

        require_once __DIR__ . '/../views/cart/cart_create.php';
    }

    public function edit($id) {
        $gioHang = $this->cartModel->getById($id);
        if (!$gioHang) {
            header('Location: index.php?modun=Giohang');
            exit();
        }

        $errors = [];
        $dsNguoiDung = $this->userModel->getAllUsers();
        $dsChiTiet = $this->detailModel->getAll();
        $form = [
            'MaNguoiDung' => $gioHang->MaNguoiDung,
            'MaChiTietSP' => $gioHang->MaChiTietSP,
            'SoLuongThem' => $gioHang->SoLuongThem
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form);

            if (empty($errors)) {
                $this->cartModel->update($id, $form['MaNguoiDung'], $form['MaChiTietSP'], $form['SoLuongThem']);
                header('Location: index.php?modun=Giohang');
                exit();
            }
        }

        require_once __DIR__ . '/../views/cart/cart_edit.php';
    }

    public function delete($id) {
        $this->cartModel->delete($id);
        header('Location: index.php?modun=Giohang');
        exit();
    }
}
