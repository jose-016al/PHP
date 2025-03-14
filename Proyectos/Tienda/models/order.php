<?php

class Order {
  private $id;
  private $user_id;
  private $province;
  private $city;
  private $address;
  private $cost;
  private $status;
  private $date_order;
  private $time_order;
  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  // Getters
  public function getId() {
    return $this->id;
  }

  public function getUserId() {
    return $this->user_id;
  }

  public function getProvince() {
    return $this->province;
  }

  public function getCity() {
    return $this->city;
  }

  public function getAddress() {
    return $this->address;
  }

  public function getCost() {
    return $this->cost;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getDateOrder() {
    return $this->date_order;
  }

  public function getTimeOrder() {
    return $this->time_order;
  }

  // Setters
  public function setId($id) {
    $this->id = $id;
  }

  public function setUserId($user_id) {
    $this->user_id = $user_id;
  }

  public function setProvince($province) {
    $this->province = $province;
  }

  public function setCity($city) {
    $this->city = $city;
  }

  public function setAddress($address) {
    $this->address = $address;
  }

  public function setCost($cost) {
    $this->cost = $cost;
  }

  public function setStatus($status) {
    $this->status = $status;
  }

  public function setDateOrder($date_order) {
    $this->date_order = $date_order;
  }

  public function setTimeOrder($time_order) {
    $this->time_order = $time_order;
  }

  public function findAll() {
    return $this->db->query("SELECT * FROM orders ORDER BY id DESC");
  }

  public function findById() {
    return $this->db->query("SELECT * FROM orders WHERE id = {$this->id}")->fetch_object();
  }

  public function findByUser() {
    return $this->db->query("SELECT id, cost FROM orders
      WHERE user_id = {$this->user_id} 
      ORDER BY id DESC LIMIT 1")->fetch_object();
  }

  public function findAllByUser() {
    return $this->db->query("SELECT * FROM orders
      WHERE user_id = {$this->user_id} 
      ORDER BY id DESC");
  }

  public function findProductsByOrder($id) {
    return $this->db->query("SELECT pr.*, ol.units FROM products pr 
    INNER JOIN order_lines ol ON pr.id = ol.product_id 
    WHERE ol.order_id = {$id}");
  }

  public function save() {
    $sql = "INSERT INTO orders (user_id, province, city, address, cost, status, date_order, time_order) 
      VALUES (?, ?, ?, ?, ?, 'confirm', CURDATE(), CURTIME())";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) {
      return false;
    }

    $stmt->bind_param("sssss",
      $this->user_id,
      $this->province, 
      $this->city,
      $this->address,
      $this->cost
    );

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }

  public function saveLines() {
    $result = $this->db->query("SELECT LAST_INSERT_ID() AS 'order_id';");
    $order_id = $result->fetch_object()->order_id;
    $success = true;

    foreach ($_SESSION['cart'] as $value) {
        $product = $value['product'];
        
        $sql = "INSERT INTO order_lines (order_id, product_id, units) 
                VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("iii", 
            $order_id,
            $product->id,
            $value['units']
        );

        if (!$stmt->execute()) {
            $success = false;
        }

        $stmt->close();
    }

    return $success; 
  }

  public function update() {
    $sql = "UPDATE orders SET status = ? WHERE id = ?";
    
    $stmt = $this->db->prepare($sql);
    if (!$stmt) {
      return false;
    }

    $stmt->bind_param("si",
      $this->status,
      $this->id
    );

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }
}