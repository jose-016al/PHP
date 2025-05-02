<?php
require_once './repositories/cartItemRepository.php';

class cartController {

  private $cartItemRepository;

  public function __construct() {
    $this->cartItemRepository = new CartItemRepository();
  }

  public function index() {
    !isset($_SESSION['user']) ?? header("Location:".base_url."user/register");
    $cart = Utils::getCart();
    require_once './views/cart/index.php';
  }

  public function add() {
    $productId = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url);
    $cartId = Utils::getCart()['cartId'];
    $cartItem = $this->cartItemRepository->findProductByCart($cartId, $productId);

    if ($cartItem) {
      $this->cartItemRepository->update($cartItem->units + 1, $cartId, $productId); 
    } else {
      $this->cartItemRepository->save($cartId, $productId);
    }
    header("Location:".base_url."cart/index");
  }

  public function remove() {
    $productId = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url);
    $cartId = Utils::getCart()['cartId'];
    $cartItem = $this->cartItemRepository->findProductByCart($cartId, $productId);
    if ($cartItem) {
      $this->cartItemRepository->delete($cartItem->id);
    }
    header("Location:".base_url."cart/index");
  }

  public function up() {
    $productId = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url);
    $cartId = Utils::getCart()['cartId'];
    $cartItem = $this->cartItemRepository->findProductByCart($cartId, $productId);
    if ($productId) {
      $this->cartItemRepository->update($cartItem->units + 1, $cartId, $productId); 
    }
    header("Location:".base_url."cart/index");
  }

  public function down() {
    $productId = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url);
    $cartId = Utils::getCart()['cartId'];
    $cartItem = $this->cartItemRepository->findProductByCart($cartId, $productId);
    if ($productId) {
      if ($cartItem->units != 1) {
        $this->cartItemRepository->update($cartItem->units - 1, $cartId, $productId); 
      } else {
        $this->cartItemRepository->delete($cartItem->id);
      }
    }
    header("Location:".base_url."cart/index");
  }

  public function delete_all() {
    $cartId = Utils::getCart()['cartId'];
    $this->cartItemRepository->deleteAll($cartId);
    header("Location:".base_url."cart/index");
  }
}