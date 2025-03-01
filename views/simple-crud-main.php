<?php
include '../database/datosbase.php';
include '../helpers/authenticated.php';

session_start(); // Start session

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php"); // Redirect if not logged in
    exit();
}

$user_id = $_SESSION['user_id']; // Get the user ID from session

// Fetch username from database
$res = $conn->query("SELECT username FROM users WHERE id = $user_id");
$row = $res->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD</title>
    <link rel="stylesheet" href="simple.css">
    <link rel="stylesheet" href="../statics/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="../statics/js/bootstrap.bundle.js"></script>
</head>

<body>
    <a href="../handlers/logout_handler.php" class="btn btn-danger btn-sm position-fixed top-0 start-0 mt-3 ms-3 z-3">
        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Leave
    </a>

    <div class="container d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6 ">
            <div class="text-center">
                <img src="../assets/bee-removebg-preview.png" alt="Bee" width="100" height="100" id="bee" class="bee">
                <p class="display-5 fw-bold text-warning">A day in my life</p>
                <p class="fw-bold text-secondary">Hello, <?= htmlspecialchars($row['username']); ?> 👋</p>
            </div>

            <div class="border border-warning p-5 rounded-2 shadow">
                <form class="form" action="../handlers/add_scrud_handler.php" method="POST"
                    enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="image-button text-center ">
                            <label for="imageInput" class="btn btn-outline-success btn-sm"><i
                                    class="fa-solid fa-plus"></i>
                                Add Image</label>
                            <input type="file" name="img_dir" id="imageInput" style="display: none;">
                            <div class="image-preview-container" style="display: none;">
                                <img id="previewImage" src="" alt="Uploaded Image" class="mt-3 img-preview text-center"
                                    style="max-width: 100%; height: auto;">
                                <button id="removeImageBtn" class="btn btn-danger btn-sm mt-2" style="display: none;">
                                    Remove Image
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label>Caption</label>
                        <input type="text" class="form-control" placeholder="Caption" name="caption" required>
                    </div>
                    <div class="row mb-3">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Write something about your day..."
                            name="description" required></textarea>
                    </div>
                    <div class="row mb-3">
                        <button class="btn btn-warning btn-sm p-2 rounded-5" type="submit"><i
                                class="fa-solid fa-plus"></i>
                            Add Day</button>
                    </div>
                </form>
                <div class="row ">
                    <a href="uploads.php" class="btn btn-outline-success btn-sm p-2 rounded-5"><i
                            class="fa-solid fa-leaf" style="color:rgb(6, 116, 17);"></i> My Life</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="d-flex justify-content-between align-items-center p-3">
        <a href="simple-crud-main.php" class="mx-auto">
            <img src="../assets/plus-removebg-preview.png" alt="" width="35" height="35">
        </a>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let imageInput = document.getElementById("imageInput");
            let previewImage = document.getElementById("previewImage");
            let removeImageBtn = document.getElementById("removeImageBtn");
            let previewContainer = document.querySelector(".image-preview-container");
            let bee = document.getElementById("bee");

            imageInput.addEventListener("change", function(event) {
                let file = event.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = "block";
                        removeImageBtn.style.display = "block";
                        previewContainer.style.display = "block";
                    };
                    reader.readAsDataURL(file);
                }

                bee.classList.add("bee-rotate");
                setTimeout(() => {
                    bee.classList.remove("bee-rotate");
                }, 500);
            });

            removeImageBtn.addEventListener("click", function(event) {
                event.preventDefault();
                previewImage.src = "";
                previewContainer.style.display = "none";
                removeImageBtn.style.display = "none";
                imageInput.value = "";

                bee.classList.add("bee-animation");
                setTimeout(() => {
                    bee.classList.remove("bee-animation");
                }, 500);
            });
        });
    </script>
</body>

</html>