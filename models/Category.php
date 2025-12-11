<?php
// Nhúng BaseModel trước
// require_once PATH_MODEL . 'BaseModel.php'; 

class Category extends BaseModel
{
    protected $table = 'categories';

    public function getAllCategories()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        // Gọi hàm đã định nghĩa trong BaseModel
        return $this->pdo_query_all($sql); 
    }
    
    // Tìm theo id
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Tạo mới
    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (name, description) VALUES (:name, :description)";
        return $this->pdo_execute($sql, [
            'name' => $data['name'] ?? '',
            'description' => $data['description'] ?? ''
        ]);
    }

    // Cập nhật
    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET name = :name, description = :description WHERE id = :id";
        $params = [
            'name' => $data['name'] ?? '',
            'description' => $data['description'] ?? '',
            'id' => $id
        ];
        return $this->pdo_execute($sql, $params);
    }

    // Xóa
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        return $this->pdo_execute($sql, ['id' => $id]);
    }
}
?>