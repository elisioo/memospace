<?php 
include "../database/datosbase.php";  

try {     
    if ($_SERVER['REQUEST_METHOD'] == "POST") {         
        $caption = $_POST['caption'];         
        $description = $_POST['description'];         
        $time = date("Y-m-d H:i:s");  

        // Check if a file was uploaded
        if (isset($_FILES['img_dir']) && $_FILES['img_dir']['error'] == 0) {
            $upload_dir = "../uploads/"; // Make sure this directory exists
            $img_name = basename($_FILES["img_dir"]["name"]);
            $target_file = $upload_dir . $img_name;

            // Move uploaded file to the desired directory
            if (move_uploaded_file($_FILES["img_dir"]["tmp_name"], $target_file)) {
                // Insert into database
                $stmt = $conn->prepare("INSERT INTO simple_crud (caption, description, img_dir, time) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $caption, $description, $img_name, $time);  

                if ($stmt->execute()) {             
                    header("Location: ../simple-crud/uploads.php");             
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
?>