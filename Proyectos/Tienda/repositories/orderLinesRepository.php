<?php

class orderLinesRepository {

  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function save($orderId, $productId, $units) {
    $sql = "INSERT INTO order_lines (order_id, product_id, units) 
                VALUES (?, ?, ?)";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("iii", $orderId, $productId, $units);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }
}