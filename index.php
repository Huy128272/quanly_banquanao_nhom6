<?php
require_once __DIR__ . '/app/config/helpers.php';
require_once __DIR__ . '/app/controller/DashboardController.php';
require_once __DIR__ . '/app/controller/ProductController.php';
require_once __DIR__ . '/app/controller/CategoryController.php';
require_once __DIR__ . '/app/controller/ProductDetailController.php';
require_once __DIR__ . '/app/controller/CartController.php';
require_once __DIR__ . '/app/controller/UserController.php';

$modun  = $_GET['modun'] ?? "";
$action = $_GET['action'] ?? "";
$id     = $_GET['id'] ?? "";

// Chạy đúng hành động CRUD của 1 controller
function chayAction($controller, $action, $id) {
    if ($action === 'Sua') {
        $controller->edit($id);
    } elseif ($action === 'Xoa') {
        $controller->delete($id);
    } elseif ($action === 'Them') {
        $controller->create();
    } else {
        $controller->index();
    }
}

switch ($modun) {
    case 'Sanpham':
        chayAction(new ProductController(), $action, $id);
        break;
    case 'Danhmuc':
        chayAction(new CategoryController(), $action, $id);
        break;
    case 'Chitiet':
        chayAction(new ProductDetailController(), $action, $id);
        break;
    case 'Giohang':
        chayAction(new CartController(), $action, $id);
        break;
    case 'Nguoidung':
        chayAction(new UserController(), $action, $id);
        break;
    default:
        $controller = new DashboardController();
        $controller->index();
        break;
}
