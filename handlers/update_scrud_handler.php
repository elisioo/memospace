<?php

include "../database/datosbase.php";

try {
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $upid = $_POST['upid'];
    $caption = $_POST['caption'];
    $description = $_POST['description'];
    $Date = date("Y-m-d H:i:s");

    if (isset($_FILES['img_dir']) && $_FILES['img_dir']['error'] == 0) {
      $upload_dir = "../uploads/";
      $img_name = basename($_FILES["img_dir"]["name"]);
      $target_file = $upload_dir . $img_name;

      if (move_uploaded_file($_FILES["img_dir"]["tmp_name"], $target_file)) {

        $stmt = $conn->prepare("UPDATE simple_crud SET caption=?, description=?, img_dir=?, time=NOW(), is_edited=1 WHERE upid=?");
        $stmt->bind_param("ssssi", $caption, $description, $img_name, $Date, $upid);
      } else {
        echo "File upload failed.";
      }
    } else {

      $stmt = $conn->prepare("UPDATE simple_crud SET caption=?, description=?, time=NOW(), is_edited=1  WHERE upid=?");
      $stmt->bind_param("ssi", $caption, $description, $upid);
    }

    if ($stmt->execute()) {
      header("Location: ../views/uploads.php");
      exit;
    } else {
      echo "Operation failed";
    }
  }
} catch (\Exception $e) {
  echo "Error: " . $e;
}