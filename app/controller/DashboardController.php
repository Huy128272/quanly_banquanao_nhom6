<?php 
require_once __DIR__ . '/../model/User.php';


class DashboardController{
    private User $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function index(){
        $tongSP = 100;
        $tongDanhMuc = 8;
        $tongDonHang = 200;
        $tongNguoiDung = $this->userModel->countUsers();

        require_once __DIR__ . '/../views/dashboard/dashboard_view.php';
    }
}


?>