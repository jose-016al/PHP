<?php 
require_once './models/product.php';

class productRepository {

  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function findAll() {
    return $this->db->query("SELECT * FROM products ORDER BY id DESC");
  }

  public function findAllCategory($categoryId) {
    $sql = "SELECT p.*, c.name AS 'catName' FROM products p 
      INNER JOIN categories c ON c.id = p.category_id 
      WHERE p.category_id = ? AND p.stock >= 1
      ORDER BY id DESC";

    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    return $stmt->get_result();
  }

  public function findRandom($limit) {
    $sql = "SELECT * FROM products WHERE stock >= 1 ORDER BY RAND() LIMIT ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    return $stmt->get_result();
  }

  public function findById($id) {
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_object();
  }

  public function save(Product $product) {
    $sql = "INSERT INTO products (category_id, name, description, price, stock, offer, date_added, image) 
      VALUES (?, ?, ?, ?, ?, NULL, CURDATE(), ?)";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $categoryId = $product->getCategoryId();
    $name = $product->getName();
    $description = $product->getDescription();
    $price = $product->getPrice();
    $stock = $product->getStock();
    $image = $product->getImage();

    $stmt->bind_param("isssis", $categoryId, $name, $description, $price, $stock, $image);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }

  public function delete($id) {
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }

  public function update(Product $product) {
    $sql = "UPDATE products 
            SET category_id = ?, name = ?, description = ?, price = ?, stock = ?";

    $id = $product->getId();
    $categoryId = $product->getCategoryId();
    $name = $product->getName();
    $description = $product->getDescription();
    $price = $product->getPrice();
    $stock = $product->getStock();
    $image = $product->getImage();

    $params = ["isssi", $categoryId, $name, $description, $price, $stock];

    if ($image !== null) {
        $sql .= ", image = ?";
        $params[0] .= "s"; 
        $params[] = $image;
    }

    $sql .= " WHERE id = ?";
    $params[0] .= "i";
    $params[] = $id;

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param(...$params);
    return $stmt->execute();
  }


  public function stock($stock, $productId) {
    $sql = "UPDATE products 
            SET stock = ? WHERE id = ?";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param("ii", $stock, $productId);

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }
}