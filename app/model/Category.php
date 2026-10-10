<?php
require_once __DIR__ . '/../config/Database.php';

class Category {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $sql = "SELECT * FROM tblcategory ORDER BY MaDanhMuc DESC";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute();
        return $stml->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {
        $sql = "SELECT * FROM tblcategory WHERE MaDanhMuc = :id";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute(['id' => $id]);
        return $stml->fetch(PDO::FETCH_OBJ);
    }

    public function create($ten, $moTa) {
        $sql = "INSERT INTO tblcategory (TenDanhMuc, MoTa) VALUES (:ten, :moTa)";
        $stml = $this->db->pdo->prepare($sql);
        $stml->execute(['ten' => $ten, 'moTa' => $moTa]);
        return $this->db->pdo->lastInsertId();
    }

    public function update($id, $ten, $moTa) {
        $sql = "UPDATE tblcategory SET TenDanhMuc = :ten, MoTa = :moTa WHERE MaDanhMuc = :id";
        $stml = $this->db->pdo->prepare($sql);
        return $stml->execute(['ten' => $ten, 'moTa' => $moTa, 'id' => $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM tblcategory WHERE MaDanhMuc = :id";
        $stml = $this->db->pdo->prepare($sql);
        return $stml->execute(['id' => $id]);
    }
}
