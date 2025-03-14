<?php
require_once './models/product.php';

class cartController {

  public function index() {
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    require_once './views/cart/index.php';
  }

  public function add() {
    $product_id = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url);

    if (isset($_SESSION['cart'])) {
      $counter = 0;
      foreach($_SESSION['cart'] as $index => $value) {
        if ($value['id_product'] == $product_id) {
          $_SESSION['cart'][$index]['units']++;
          $counter++;
        }
      }
    }
    if (!isset($counter) || $counter == 0) {
      $product = new Product();
      $product->setId($product_id);
      $product = $product->findById();

      if (is_object($product)) {
        $_SESSION['cart'][] = array(
          "id_product" => $product->id,
          "price" => $product->price,
          "units" => 1,
          "product" => $product
        );
      }
    }
    
    header("Location:".base_url."cart/index");
  }

  public function remove() {
    if (isset($_GET['index'])) {
      $index = $_GET['index'];
      unset($_SESSION['cart'][$index]);
    }
    header("Location:".base_url."cart/index");
  }

  public function up() {
    if (isset($_GET['index'])) {
      $index = $_GET['index'];
      $_SESSION['cart'][$index]['units']++;
    }
    header("Location:".base_url."cart/index");
  }

  public function down() {
    if (isset($_GET['index'])) {
      $index = $_GET['index'];
      $_SESSION['cart'][$index]['units']--;
      if ($_SESSION['cart'][$index]['units'] == 0) {
        unset($_SESSION['cart'][$index]);
      }
    }
    header("Location:".base_url."cart/index");
  }

  public function delete_all() {
    unset($_SESSION['cart']);
    header("Location:".base_url."cart/index");
  }
}