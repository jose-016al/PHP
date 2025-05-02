<?php 

class cartItem {

  private $id;
  private $cartId;
  private $productId;
  private $units;

  public function __construct($id = null, $cartId = null, $productId = null, $units = null) {
    $this->id = $id;
    $this->cartId = $cartId;
    $this->productId = $productId;
    $this->units = $units;
  }

  public function getId() {
    return $this->id;
  }

  public function getCartId() {
    return $this->cartId;
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

  public function setCartId($cartId) {
    return $this->cartId = $cartId;
  }

  public function setProductId($productId) {
    return $this->productId = $productId;
  }

  public function setUnits($units) {
    return $this->units = $units;
  }
}