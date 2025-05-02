<?php

class Utils {

  public static function deleteSession($name) {
    if (isset($_SESSION[$name])) {
      $_SESSION[$name] = null;
      unset($_SESSION[$name]);
    }
    return $name;
  }

  public static function isAdmin() {
    if (!isset($_SESSION['admin'])) {
      header("Location:".base_url);
    } else {
      return true;
    }
  }

  public static function isLogin() {
    if (!isset($_SESSION['user'])) {
      header("Location:".base_url);
    } else {
      return $_SESSION['user'];
    }
  }

  public static function showCategories() {
    require_once './repositories/categoryRepository.php';
    $categoryRepository = new CategoryRepository();
    return $categoryRepository->findAll();
  }

  public static function getCart() {
    $cart = array(
      "cartId" => 0,
      "count" => 0,
      "total" => 0,
      "products" => [] 
    );
    if (isset($_SESSION['user'])) {
      require_once './repositories/cartRepository.php';
      require_once './repositories/cartItemRepository.php';
      $cartRepository = new CartRepository();
      $cartItemRepository = new CartItemRepository();
      $cartId = $cartRepository->findByUser(self::isLogin()->id)->id;
      $cartItems = $cartItemRepository->findAllProducts($cartId);
      $cart['cartId'] = $cartId;

      foreach($cartItems as $product) {
        $cart['count'] += $product['units'];
        $cart['total'] += $product['price'] * $product['units'];
        $cart['products'][] = array(
          "id_product" => $product['id'],
          "price" => $product['price'],
          "units" => $product['units'],
          "product" => $product
        );
      }
    }
    return $cart; 
  }

  // public static function statsCart() {
  //   $stats = array(
  //     "count" => 0,
  //     "total" => 0,
  //   );
  //   if (isset($_SESSION['cart'])) {
  //     $stats['count'] = count($_SESSION['cart']);
  //     foreach($_SESSION['cart'] as $index => $product) {
  //       $stats['total'] += $product['price'] * $product['units'];
  //     }
  //   }
  //   return $stats;
  // }

  public static function showStatus($status) {
    switch ($status) {
        case 'confirm':
            return 'Pendiente';
        case 'preparation':
            return 'En preparación';
        case 'ready':
            return 'Preparado para enviar';
        case 'sended':
            return 'Enviado';
        default:
            return 'Pendiente';
    }
  }

}