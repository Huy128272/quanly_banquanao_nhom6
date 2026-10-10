<?php
require_once __DIR__ . '/../config/Database.php';

class Cart {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Lấy giỏ hàng kèm tên người dùng, tên sản phẩm, size, màu
    public function getAll() {
        $sql = "SELECT c.*, u.full_name, u.user_name, p.TenSanPham, d.Size, d.Mau
                FROM tblcart c
                JOIN tbluser u ON c.MaNguoiDung = u.id
                JOIN tblproductdetail d ON c.MaChiTietSP = d.MaChiTietSP
                JOIN tblproduct p ON d.MaSanPham = p.MaSanPham
                ORDER BY c.MaGioHang DESC";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute();
        return $stml->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {
        $sql = "SELECT * FROM tblcart WHERE MaGioHang = :id";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute(['id' => $id]);
        return $stml->fetch(PDO::FETCH_OBJ);
    }

    public function create($maNguoiDung, $maChiTiet, $soLuongThem) {
        $sql = "INSERT INTO tblcart (MaNguoiDung, MaChiTietSP, SoLuongThem)
                VALUES (:maNguoiDung, :maChiTiet, :soLuongThem)";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute([
            'maNguoiDung' => $maNguoiDung,
            'maChiTiet'   => $maChiTiet,
            'soLuongThem' => $soLuongThem
        ]);
        return $this->db->pdo->lastInsertId();
    }

    public function update($id, $maNguoiDung, $maChiTiet, $soLuongThem) {
        $sql = "UPDATE tblcart
                SET MaNguoiDung = :maNguoiDung, MaChiTietSP = :maChiTiet, SoLuongThem = :soLuongThem
                WHERE MaGioHang = :id";
        $stml = $this->db->pdo->prepare($sql);
        return $stml->execute([
            'maNguoiDung' => $maNguoiDung,
            'maChiTiet'   => $maChiTiet,
            'soLuongThem' => $soLuongThem,
            'id'          => $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM tblcart WHERE MaGioHang = :id";
        $stml = $this->db->pdo->prepare($sql);
        return $stml->execute(['id' => $id]);
    }
}
