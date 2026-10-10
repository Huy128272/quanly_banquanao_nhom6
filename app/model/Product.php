<?php
require_once __DIR__ . '/../config/Database.php';

class Product {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Lấy tất cả sản phẩm, kèm tên danh mục
    public function getAllProducts() {
        $sql = "SELECT p.*, c.TenDanhMuc
                FROM tblproduct p
                JOIN tblcategory c ON p.MaDanhMucSP = c.MaDanhMuc
                ORDER BY p.MaSanPham DESC";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute();
        return $stml->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM tblproduct WHERE MaSanPham = :id";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute(['id' => $id]);
        return $stml->fetch(PDO::FETCH_OBJ);
    }

    public function createProduct($maDanhMuc, $ten, $anh, $gia, $thuongHieu, $moTa) {
        $sql = "INSERT INTO tblproduct (MaDanhMucSP, TenSanPham, AnhSanPham, Gia, ThuongHieu, MoTa)
                VALUES (:maDanhMuc, :ten, :anh, :gia, :thuongHieu, :moTa)";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute([
            'maDanhMuc'  => $maDanhMuc,
            'ten'        => $ten,
            'anh'        => $anh,
            'gia'        => $gia,
            'thuongHieu' => $thuongHieu,
            'moTa'       => $moTa
        ]);
        return $this->db->pdo->lastInsertId();
    }

    public function updateProduct($id, $maDanhMuc, $ten, $anh, $gia, $thuongHieu, $moTa) {
        $sql = "UPDATE tblproduct
                SET MaDanhMucSP = :maDanhMuc, TenSanPham = :ten, AnhSanPham = :anh,
                    Gia = :gia, ThuongHieu = :thuongHieu, MoTa = :moTa
                WHERE MaSanPham = :id";
        $stml = $this->db->pdo->prepare($sql);
        return $stml->execute([
            'maDanhMuc'  => $maDanhMuc,
            'ten'        => $ten,
            'anh'        => $anh,
            'gia'        => $gia,
            'thuongHieu' => $thuongHieu,
            'moTa'       => $moTa,
            'id'         => $id
        ]);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM tblproduct WHERE MaSanPham = :id";
        $stml = $this->db->pdo->prepare($sql);
        return $stml->execute(['id' => $id]);
    }
}
