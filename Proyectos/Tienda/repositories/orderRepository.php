<?php

class orderRepository {

  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function findAll() {
    return $this->db->query("SELECT * FROM orders ORDER BY id DESC");
  }

  public function findById($id) {
    $sql = "SELECT * FROM orders WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_object();
  }

  public function findByUser($userId) {
    $sql = "SELECT id, cost FROM orders
      WHERE user_id = ?
      ORDER BY id DESC LIMIT 1";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    return $stmt->get_result()->fetch_object();
  }

  public function findAllByUser($userId) {
    $sql = "SELECT * FROM orders
      WHERE user_id = ?
      ORDER BY id DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    return $stmt->get_result();
  }

  public function findProductsByOrder($id) {
    $sql = "SELECT pr.*, ol.units FROM products pr 
      INNER JOIN order_lines ol ON pr.id = ol.product_id 
      WHERE ol.order_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
  }

  public function save($userId, $province, $city, $address, $cost) {
    $sql = "INSERT INTO orders (user_id, province, city, address, cost, status, date_order, time_order) 
      VALUES (?, ?, ?, ?, ?, 'confirm', CURDATE(), CURTIME())";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("sssss",$userId, $province, $city, $address, $cost);

    $save = $stmt->execute();
    $orderId = $this->db->insert_id;
    $stmt->close();

    return $save ? $orderId : false; 
  }

  public function update($status, $id) {
    $sql = "UPDATE orders SET status = ? WHERE id = ?";
    
    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("si", $status, $id);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }
}