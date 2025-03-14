<?php

class Product {
  private $id;
  private $category_id;
  private $name;
  private $description;
  private $price;
  private $stock;
  private $offer;
  private $date_added;
  private $image;
  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  // Getters
  public function getId() {
    return $this->id;
  }

  public function getCategoryId() {
    return $this->category_id;
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getPrice() {
    return $this->price;
  }

  public function getStock() {
    return $this->stock;
  }

  public function getOffer() {
    return $this->offer;
  }

  public function getDateAdded() {
    return $this->date_added;
  }

  public function getImage() {
    return $this->image;
  }

  public function getDb() {
    return $this->db;
  }

  // Setters
  public function setId($id) {
    $this->id = $id;
  }

  public function setCategoryId($category_id) {
    $this->category_id = $category_id;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function setPrice($price) {
    $this->price = $price;
  }

  public function setStock($stock) {
    $this->stock = $stock;
  }

  public function setOffer($offer) {
    $this->offer = $offer;
  }

  public function setDateAdded($date_added) {
    $this->date_added = $date_added;
  }

  public function setImage($image) {
    $this->image = $image;
  }

  public function findAll() {
    return $this->db->query("SELECT * FROM products ORDER BY id DESC");
  }

  public function findAllCategory() {
    return $this->db->query("SELECT p.*, c.name AS 'catName' FROM products p 
      INNER JOIN categories c ON c.id = p.category_id 
      WHERE p.category_id = {$this->category_id} 
      ORDER BY id DESC");
  }

  public function findRandom($limit) {
    return $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT $limit");
  }

  public function findById() {
    return $this->db->query("SELECT * FROM products WHERE id = {$this->id}")->fetch_object();
  }

  public function save() {
    $sql = "INSERT INTO products (category_id, name, description, price, stock, offer, date_added, image) 
      VALUES (?, ?, ?, ?, ?, NULL, CURDATE(), ?)";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) {
      return false;
    }

    $stmt->bind_param("ssssss", 
      $this->category_id,
      $this->name, 
      $this->description,
      $this->price,
      $this->stock,
      $this->image
    );

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }

  public function delete() {
    $sql = "DELETE FROM products WHERE id={$this->id}";
    $delete = $this->db->query($sql);
    if ($delete) {
      return true;
    }
    return false;
  }

  public function update() {
    $sql = "UPDATE products 
            SET category_id = ?, name = ?, description = ?, price = ?, stock = ?";
    
    $params = ["ssssi", $this->category_id, $this->name, $this->description, $this->price, $this->stock];

    if ($this->image !== null) {
        $sql .= ", image = ?";
        $params[0] .= "s"; 
        $params[] = $this->image;
    }

    $sql .= " WHERE id = ?";
    $params[0] .= "i";
    $params[] = $this->id;

    $stmt = $this->db->prepare($sql);
    if (!$stmt) {
        return false;
    }

    $stmt->bind_param(...$params);

    $updated = $stmt->execute();
    $stmt->close();

    return $updated;
  }

}
