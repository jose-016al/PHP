<?php

class Database {
  public static function connect() {
    $db = new mysqli('localhost', 'user', 'user', 'store');
    $db->query("SET NAMES 'utf8'");
    return $db;
  }
}