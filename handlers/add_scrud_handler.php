<?php

include "../database/datosbase.php";

try {

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $img_dir = $_POST['img_dir'];

    $stmt = $conn->prepare("INSERT INTO simple_crud (caption, description, img_dir) VALUES (?, ?, ?)");

    $stmt->bind_param("ssi", $title, $description, $img_dir);

    if ($stmt->execute()) {
      header("Location: ../simple-crud/simple-crud.php");
      exit;
    } else {
      echo "operation failed";
    }
  }
} catch (\Exception $e) {
  echo "Error: " . $e;
}