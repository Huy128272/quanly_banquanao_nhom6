<?php
require_once __DIR__ . '/../model/User.php';

class UserController {

    private User $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $dsNguoiDung = $this->userModel->getAllUsers();
        require_once __DIR__ . '/../views/user/user_view.php';
    }

    private function layDuLieuForm() {
        return [
            'user_name' => trim($_POST['user_name'] ?? ''),
            'password'  => $_POST['password'] ?? '',
            'full_name' => trim($_POST['full_name'] ?? ''),
            'phone'     => trim($_POST['phone'] ?? ''),
            'address'   => trim($_POST['address'] ?? ''),
            'role'      => trim($_POST['role'] ?? '')
        ];
    }

    // $batBuocMatKhau = true khi thêm mới, false khi sửa (để trống = giữ mật khẩu cũ)
    private function kiemTra($f, $batBuocMatKhau) {
        $errors = [];
        if ($f['user_name'] === '') {
            $errors[] = 'Tên đăng nhập không được để trống!';
        }
        if ($batBuocMatKhau && $f['password'] === '') {
            $errors[] = 'Mật khẩu không được để trống!';
        }
        if ($f['full_name'] === '') {
            $errors[] = 'Họ tên không được để trống!';
        }
        if ($f['phone'] !== '' && !preg_match('/^[0-9]{10,11}$/', $f['phone'])) {
            $errors[] = 'Số điện thoại phải gồm 10-11 chữ số!';
        }
        if ($f['role'] === '') {
            $errors[] = 'Vai trò không được để trống!';
        }
        return $errors;
    }

    public function create() {
        $errors = [];
        $form = ['user_name' => '', 'password' => '', 'full_name' => '',
                 'phone' => '', 'address' => '', 'role' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form, true);

            if (empty($errors)) {
                $this->userModel->create(
                    $form['user_name'], $form['password'], $form['full_name'],
                    $form['phone'], $form['address'], $form['role']
                );
                header('Location: index.php?modun=Nguoidung');
                exit();
            }
        }

        require_once __DIR__ . '/../views/user/user_create.php';
    }

    public function edit($id) {
        $nguoiDung = $this->userModel->getById($id);
        if (!$nguoiDung) {
            header('Location: index.php?modun=Nguoidung');
            exit();
        }

        $errors = [];
        $form = [
            'user_name' => $nguoiDung->user_name,
            'password'  => '',
            'full_name' => $nguoiDung->full_name,
            'phone'     => $nguoiDung->phone,
            'address'   => $nguoiDung->address,
            'role'      => $nguoiDung->role
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->layDuLieuForm();
            $errors = $this->kiemTra($form, false);

            if (empty($errors)) {
                $this->userModel->update(
                    $id, $form['user_name'], $form['password'], $form['full_name'],
                    $form['phone'], $form['address'], $form['role']
                );
                header('Location: index.php?modun=Nguoidung');
                exit();
            }
        }

        require_once __DIR__ . '/../views/user/user_edit.php';
    }

    public function delete($id) {
        $this->userModel->delete($id);
        header('Location: index.php?modun=Nguoidung');
        exit();
    }
}
