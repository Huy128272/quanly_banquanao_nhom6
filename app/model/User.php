<?php
require_once __DIR__ . '/../config/Database.php';

class User {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM tbluser ORDER BY id DESC";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function countUsers() {
        $sql = "SELECT COUNT(*) AS total FROM tbluser";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getById($id) {
        $sql = "SELECT * FROM tbluser WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function create($userName, $password, $fullName, $phone, $address, $role) {
        $sql = "INSERT INTO tbluser (user_name, `password`, full_name, phone, `address`, `role`)
                VALUES (:userName, :password, :fullName, :phone, :address, :role)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute([
            'userName' => $userName,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'fullName' => $fullName,
            'phone'    => $phone,
            'address'  => $address,
            'role'     => $role
        ]);
        return $this->db->pdo->lastInsertId();
    }

    // $password để rỗng thì giữ nguyên mật khẩu cũ
    public function update($id, $userName, $password, $fullName, $phone, $address, $role) {
        $params = [
            'userName' => $userName,
            'fullName' => $fullName,
            'phone'    => $phone,
            'address'  => $address,
            'role'     => $role,
            'id'       => $id
        ];

        if ($password !== '') {
            $sql = "UPDATE tbluser
                    SET user_name = :userName, `password` = :password, full_name = :fullName,
                        phone = :phone, `address` = :address, `role` = :role
                    WHERE id = :id";
            $params['password'] = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $sql = "UPDATE tbluser
                    SET user_name = :userName, full_name = :fullName,
                        phone = :phone, `address` = :address, `role` = :role
                    WHERE id = :id";
        }

        $stmt = $this->db->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function delete($id) {
        $sql = "DELETE FROM tbluser WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
