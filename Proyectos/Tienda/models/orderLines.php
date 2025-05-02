<?php

class orderLines {
  private $id;
  private $orderId;
  private $productId;
  private $units;

  public function __construct($id = null, $orderId = null, $productId = null, $units = null) {
    $this->id = $id;
    $this->orderId = $orderId;
    $this->productId = $productId;
    $this->units = $units;
  }

  public function getId() {
    return $this->id;
  }

  public function getOrderId() {
    return $this->orderId;
  }

  public function getProductId() {
    return $this->productId;
  }

  public function getUnits() {
    return $this->units;
  }

  public function setId($id) {
    return $this->id = $id;
  }

  public function setOrderId($orderId) {
    return $this->orderId = $orderId;
  }

  public function setProductId($productId) {
    return $this->productId = $productId;
  }

  public function setUnits($units) {
    return $this->units = $units;
  }

}