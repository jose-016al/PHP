<?php

class cart {

  private $id;
  private $userId;

  public function __construct($id = null, $userId = null) {
    $this->id = $id;
    $this->userId = $userId;
  }

  public function getId() {
    return $this->id;
  }

  public function getUserId() {
    return $this->userId;
  }

  public function setId($id) {
    return $this->id = $id;
  }

  public function setUserId($userId) {
    return $this->userId = $userId;
  }
}