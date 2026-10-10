<?php
class Database{
      private $host = 'localhost';
      private $port = 3306;
      private $database = 'quanly_banquanao';
      private $username = 'root';
      private $password = '';

      public PDO $pdo;

      public function __construct(){
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4";

          $options = [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
              PDO::ATTR_EMULATE_PREPARES => false,
          ];

          try {
              $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
          } catch (PDOException $exception) {
              // Trong môi trường học tập có thể tạm thời bật dòng dưới để xem lỗi:
              // exit($exception->getMessage());
              exit('Không thể kết nối cơ sở dữ liệu. Vui lòng kiểm tra MySQL và file cấu hình.');
          }
  }

}