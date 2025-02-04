<?php

  include "../database/datosbase.php";

  try
  {
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $id = $_POST['upid'];
      $caption = $_POST['caption'];
      $description = $_POST['description'];

      $stmt = $conn->prepare("UPDATE simple_crud SET caption = ?, description = ? WHERE id = ?");
      $stmt->bind_param("ssii", $caption, $description, $upid);

      if($stmt->execute())
      {
        header("Location: ../simple-crud/uploads.php");
        exit;
      }
      else
      {
        echo "operation failed";
      }
    }


  }
  catch(\Exception $e)
  {
    echo "Error: ".$e;
  }





?>