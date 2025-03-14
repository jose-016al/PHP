<?php

class Category {
  private $id;
  private $name;
  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  // Getters
  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  // Setters
  public function setId($id) {
    $this->id = $id;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function findAll() {
    return $this->db->query("SELECT * FROM categories ORDER BY id DESC");
  }

  public function findById() {
    return $this->db->query("SELECT * FROM categories WHERE id = {$this->id}")->fetch_object();
  }

  public function save() {
    $sql = "INSERT INTO categories (name) VALUES (?)";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) {
      return false;
    }

    $stmt->bind_param("s", 
      $this->name, 
    );

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }
}