<?php

class User
{
  private $id;
  private $firstName;
  private $lastName;
  private $email;
  private $password;
  private $role;
  private $image;

  public function __construct($id = null, $firstName = null, $lastName = null, $email = null, $password = null, $role = 'user', $image = null) {
    $this->id = $id;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->password = $password;
    $this->role = $role;
    $this->image = $image;
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
    return $this->password;
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
}
