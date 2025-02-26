<?php
include "../database/datosbase.php";

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $caption = $_POST['caption'];
        $description = $_POST['description'];
        $time = date("Y-m-d H:i:s");

        if (isset($_FILES['img_dir']) && $_FILES['img_dir']['error'] == 0) {
            $upload_dir = "../uploads/";
            $img_name = basename($_FILES["img_dir"]["name"]);
            $target_file = $upload_dir . $img_name;


            if (move_uploaded_file($_FILES["img_dir"]["tmp_name"], $target_file)) {

                $stmt = $conn->prepare("INSERT INTO simple_crud (caption, description, img_dir, time) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $caption, $description, $img_name, $time);

                if ($stmt->execute()) {
                    header("Location: ../views/uploads.php");
                    exit;
                } else {
                    echo "Operation failed";
                }
            } else {
                echo "File upload failed.";
            }
        } else {
            echo "No file uploaded or upload error.";
        }
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}