<?php
$db = mysqli_connect("localhost", "user", "user", "blog");

mysqli_query($db, "SET NAMES 'utf8'");

session_start();