<?php

class categoryRepository {

  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function findAll() {
    return $this->db->query("SELECT * FROM categories ORDER BY id DESC");
  }

  public function findById($categoryId) {
    $sql = "SELECT * FROM categories WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    return $stmt->get_result()->fetch_object();
  }

  public function save($name) {
    $sql = "INSERT INTO categories (name) VALUES (?)";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("s", $name);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }

  public function update($name, $categoryId) {
    $sql = "UPDATE categories 
            SET name = ? WHERE id = ?";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("si", $name, $categoryId);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }

  public function delete($categoryId) {
    $sql = "DELETE FROM categories WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $categoryId);
    return $stmt->execute();
  }
}