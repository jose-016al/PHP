<?php

class User {
  private $id;
  private $firstName;
  private $lastName;
  private $email;
  private $password;
  private $role;
  private $image;
  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  // Getters
  public function getId() {
    return $this->id;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPassword() {
    return password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 4]);
  }

  public function getRole() {
    return $this->role;
  }

  public function getImage() {
    return $this->image;
  }

  // Setters
  public function setId($id) {
    $this->id = $id;
  }

  public function setFirstName($firstName) {
    $this->firstName = $firstName;
  }

  public function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function setRole($role) {
    $this->role = $role;
  }

  public function setImage($image) {
    $this->image = $image;
  }

  public function save() {
    $sql = "INSERT INTO users (first_name, last_name, email, password, role, image) 
            VALUES (?, ?, ?, ?, 'user', NULL)";

    $stmt = $this->db->prepare($sql);
    if (!$stmt) {
      return false;
    }

    $stmt->bind_param("ssss", 
      $this->firstName, 
      $this->lastName, 
      $this->email, 
      $this->getPassword()
    );

    $save = $stmt->execute();
    $stmt->close();

    return $save; 
  }

  public function login() {
    $email = $this->email;
    $password = $this->password;

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $login = $this->db->query($sql);

    if ($login && mysqli_num_rows($login) == 1) {
      $user = mysqli_fetch_object($login);
      $verify = password_verify($password, $user->password);
      if ($verify) {
        return $user;
      } else {
        return false;
      }
  } else {
      return false;
  }
  }
}