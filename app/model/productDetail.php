<?php
require_once __DIR__ . '/../config/Database.php';

class ProductDetail {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Lấy tất cả chi tiết, kèm tên sản phẩm
    public function getAll() {
        $sql = "SELECT d.*, p.TenSanPham
                FROM tblproductdetail d
                JOIN tblproduct p ON d.MaSanPham = p.MaSanPham
                ORDER BY d.MaChiTietSP DESC";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute();
        return $stml->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {
        $sql = "SELECT * FROM tblproductdetail WHERE MaChiTietSP = :id";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute(['id' => $id]);
        return $stml->fetch(PDO::FETCH_OBJ);
    }

    public function create($maSanPham, $size, $mau, $soLuong) {
        $sql = "INSERT INTO tblproductdetail (MaSanPham, Size, Mau, SoLuong)
                VALUES (:maSanPham, :size, :mau, :soLuong)";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute([
            'maSanPham' => $maSanPham,
            'size'      => $size,
            'mau'       => $mau,
            'soLuong'   => $soLuong
        ]);
        return $this->db->pdo->lastInsertId();
    }

    public function update($id, $maSanPham, $size, $mau, $soLuong) {
        $sql = "UPDATE tblproductdetail
                SET MaSanPham = :maSanPham, Size = :size, Mau = :mau, SoLuong = :soLuong
                WHERE MaChiTietSP = :id";
        $stml = $this->db->pdo->prepare($sql);
        return $stml->execute([
            'maSanPham' => $maSanPham,
            'size'      => $size,
            'mau'       => $mau,
            'soLuong'   => $soLuong,
            'id'        => $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM tblproductdetail WHERE MaChiTietSP = :id";
        $stml = $this->db->pdo->prepare($sql);
        return $stml->execute(['id' => $id]);
    }
}