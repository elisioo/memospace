<?php
include "../database/datosbase.php";

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $caption = $_POST['caption'];
        $description = $_POST['description'];
        $img_dir = $_FILE['img_dir']['name'];
        $time = date("Y-m-d H:i:s");

        $stmt = $conn->prepare("INSERT INTO simple_crud (caption, description, img_dir, time) VALUES (?, ?, ?,?)");
        $stmt->bind_param("sss", $caption, $description, $img_dir, $time);

        if ($stmt->execute()) {
            header("Location: ../simple-crud/uploads.php");
            exit;
        } else {
            echo "operation failed";
        }
    }
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>