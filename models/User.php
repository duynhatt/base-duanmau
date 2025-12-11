<?php
class User extends BaseModel{
    protected $table = "users";
    public function getAll()
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function find($id)
{
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT id, username, email, password, is_main FROM {$this->table} WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
    public function create($username, $email, $password_hash, $is_main = 0) {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (username, email, password, is_main) VALUES (:username, :email, :password, :is_main)");
        return $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password_hash,
            'is_main' => $is_main 
        ]);
    }
     public function update($id, $username, $email, $is_main)
    {
        $sql = "UPDATE users SET username=?, email=?, is_main=? WHERE id=?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$username, $email, $is_main, $id]);
    }

    // Xoá
    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>