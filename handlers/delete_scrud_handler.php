<?php

include "../database/datosbase.php";

try {

  $upid = $_GET['upid'];

  $stmt = $conn->prepare("DELETE FROM simple_crud WHERE upid = ? ");

  $stmt->bind_param("i", $upid);

  if ($stmt->execute()) {
    header("Location: ../views/uploads.php");
    exit;
  } else {
    echo "operation failed";
  }
} catch (\Exception $e) {
  echo "Error: " . $e;
}
