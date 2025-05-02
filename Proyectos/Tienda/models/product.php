<?php

class Product {
  private $id;
  private $categoryId;
  private $name;
  private $description;
  private $price;
  private $stock;
  private $offer;
  private $dateAdded;
  private $image;

  public function __construct($id = null, $categoryId = null, $name = null, $description = null,  $price = null, $stock = null, $offer = null, $dateAdded = null, $image = null) {
    $this->id = $id;
    $this->categoryId = $categoryId;
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->stock = $stock;
    $this->offer = $offer;
    $this->dateAdded = $dateAdded;
    $this->image = $image;
  }

  // Getters
  public function getId() {
    return $this->id;
  }

  public function getCategoryId() {
    return $this->categoryId;
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getPrice() {
    return $this->price;
  }

  public function getStock() {
    return $this->stock;
  }

  public function getOffer() {
    return $this->offer;
  }

  public function getDateAdded() {
    return $this->dateAdded;
  }

  public function getImage() {
    return $this->image;
  }

  // Setters
  public function setId($id) {
    $this->id = $id;
  }

  public function setCategoryId($categoryId) {
    $this->categoryId = $categoryId;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function setPrice($price) {
    $this->price = $price;
  }

  public function setStock($stock) {
    $this->stock = $stock;
  }

  public function setOffer($offer) {
    $this->offer = $offer;
  }

  public function setDateAdded($dateAdded) {
    $this->dateAdded = $dateAdded;
  }

  public function setImage($image) {
    $this->image = $image;
  }

}
