<?php

class cartItemRepository {

  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function findAllProducts($cartId) {
    $sql = "SELECT p.*, ci.units, ci.cart_id AS 'cartId' FROM cart_items ci 
            INNER JOIN products p ON p.id = ci.product_id  
            WHERE cart_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $cartId);
    $stmt->execute();
    return $stmt->get_result();
  }

  public function findProductByCart($cartId, $productId) {
    $sql = "SELECT * FROM cart_items WHERE cart_id = ? AND product_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("ii", $cartId, $productId);
    $stmt->execute();
    return $stmt->get_result()->fetch_object();
  }

  public function save($cartId, $productId) {
    $sql = "INSERT INTO cart_items (cart_id, product_id, units) VALUES (?, ?, '1')";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("ii", $cartId, $productId);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }

  public function update($units, $cartId, $productId) {
    $sql = "UPDATE cart_items 
            SET units = ? WHERE cart_id = ? AND product_id = ?";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("iii", $units, $cartId, $productId);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }

  public function delete($cartItemId) {
    $sql = "DELETE FROM cart_items WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $cartItemId);
    return $stmt->execute();
  }

  public function deleteAll($cartId) {
    $sql = "DELETE FROM cart_items WHERE cart_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $cartId);
    return $stmt->execute();
  }
}