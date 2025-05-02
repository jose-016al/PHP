<?php

class cartRepository {

  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function findByUser($userId) {
    $sql = "SELECT * FROM carts WHERE user_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    return $stmt->get_result()->fetch_object();
  }

  public function save($userId) {
    $sql = "INSERT INTO carts (user_id) VALUES (?)";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("i", $userId);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }
}