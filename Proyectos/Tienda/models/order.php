<?php

class Order {
  private $id;
  private $userId;
  private $province;
  private $city;
  private $address;
  private $cost;
  private $status;
  private $dateOrder;
  private $timeOrder;

  public function __construct($id = null, $userId = null, $province = null, $city = null, $address = null, $cost = null, $status = null, $dateOrder = null, $timeOrder = null) {
    $this->id = $id;
    $this->userId = $userId;
    $this->province = $province;
    $this->city = $city;
    $this->address = $address;
    $this->cost = $cost;
    $this->status = $status;
    $this->dateOrder = $dateOrder;
    $this->timeOrder = $timeOrder;
  }

  // Getters
  public function getId() {
    return $this->id;
  }

  public function getUserId() {
    return $this->userId;
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
    return $this->dateOrder;
  }

  public function getTimeOrder() {
    return $this->timeOrder;
  }

  // Setters
  public function setId($id) {
    $this->id = $id;
  }

  public function setUserId($userId) {
    $this->userId = $userId;
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

  public function setDateOrder($dateOrder) {
    $this->dateOrder = $dateOrder;
  }

  public function setTimeOrder($timeOrder) {
    $this->timeOrder = $timeOrder;
  }
}