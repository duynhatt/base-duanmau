<?php

class BaseModel
{
    protected $table;
    protected $pdo;

    // Kết nối CSDL
    public function __construct()
    {
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8', DB_HOST, DB_PORT, DB_NAME);

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OPTIONS);
        } catch (PDOException $e) {
            // Xử lý lỗi kết nối
            die("Kết nối cơ sở dữ liệu thất bại: {$e->getMessage()}. Vui lòng thử lại sau.");
        }
    }

    // Hủy kết nối CSDL
    public function __destruct()
    {
        $this->pdo = null;
    }
    // ... (Hàm __construct() và __destruct() giữ nguyên) ...

    // Hàm chung để thực thi truy vấn (SELECT *...)
    public function pdo_query_all($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Xử lý lỗi truy vấn (Ví dụ: ghi log)
            die("Lỗi truy vấn SELECT: {$e->getMessage()}");
        }
    }

    // Hàm chung để thực thi truy vấn (INSERT, UPDATE, DELETE)
    public function pdo_execute($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            // Xử lý lỗi truy vấn (Ví dụ: ghi log)
            die("Lỗi truy vấn Execute: {$e->getMessage()}");
        }
    }
}