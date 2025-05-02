<?php
require_once './models/user.php';

class userRepository {

  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function findAll() {
    return $this->db->query("SELECT * FROM users WHERE status = 1 ORDER BY id DESC");
  }

  public function findById($id) {
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_object();
  }

  public function save($firstName, $lastName, $email, $password) {
    $sql = "INSERT INTO users (first_name, last_name, email, password, role, image) 
            VALUES (?, ?, ?, ?, 'user', NULL)";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("ssss", 
      $firstName, 
      $lastName, 
      $email, 
      password_hash($password, PASSWORD_BCRYPT, ['cost' => 4])
    );

    $save = $stmt->execute();
    $userId = $this->db->insert_id;
    $stmt->close();

    return $save ? $userId : false;
  }

  public function login($email, $password) {
    $sql = "SELECT * FROM users WHERE email = ? AND status = 1";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
      $user = $result->fetch_object();
      if (password_verify($password, $user->password)) {
        return $user;
      }
    }
    return false;
  }

  public function update($id) {
    $sql = "UPDATE users 
            SET status = 0 WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("i", $id);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }

  public function delete($id) {
    $sql = "UPDATE users 
            SET status = 0 WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("i", $id);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }
}