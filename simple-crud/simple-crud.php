<?php include '../database/datosbase.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD</title>
    <link rel="stylesheet" href="simple.css">
    <link rel="stylesheet" href="../statics/css/bootstrap.min.css">
    <link rel="stylesheet" href="../statics/js/bootstrap.bundle.js">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6 ">
            <div class="text-center">
                
                <img src="../assets/bee-removebg-preview.png" alt="Bee" width="100" height="100" id="bee" class="bee">
                <p class="display-5 fw-bold text-warning">A day in my life</p>
            </div>
            <div class="border border-warning p-5 rounded-2 shadow">
             <form class="form" action="../handlers/add_scrud_handler.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="image-button text-center ">
                        <label for="imageInput" class="btn btn-outline-success btn-xl">Add Image</label>
                        <input type="file" name="img_dir" accept="image/*" style="display: none;">
                        <div class="image-preview-container " style="display: none;">
                            <img id="previewImage" src="" alt="Uploaded Image" class="mt-3 img-preview text-center"
                                style="max-width: 100%; height: auto;">
                            <button id="removeImageBtn" class="btn btn-danger btn-sm mt-2">Remove Image</button>
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
                        <button class="btn btn-warning btn-sm p-3 rounded-5" type="submit">Add Day</button>
                    </div>
                </form>
                <div class="row ">
                    <a href="uploads.php" class="btn btn-outline-success btn-sm p-3 rounded-5">My Life</a>
                </div>
             </form>
            </div>
        </div>
    </div>

    <script>
    document.getElementById("imageInput").addEventListener("change", function(event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {

                let previewImage = document.getElementById("previewImage");
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
                document.getElementById("removeImageBtn").style.display = "block";
                document.querySelector(".image-preview-container").style.display =
                    "block";
            };
            reader.readAsDataURL(file);
        }

        let bee = document.getElementById("bee");
        bee.classList.add("bee-rotate");

        setTimeout(() => {
            bee.classList.remove("bee-rotate");
        }, 500);
    });


    document.getElementById("removeImageBtn").addEventListener("click", function() {
        document.getElementById("previewImage").src = "";
        document.querySelector(".image-preview-container").style.display = "none";
        document.getElementById("removeImageBtn").style.display = "none";
        document.getElementById("imageInput").value = "";

        let bee = document.getElementById("bee");
        bee.classList.add("bee-animation");


        setTimeout(() => {
            bee.classList.remove("bee-animation");
        }, 500);
    });
    </script>

</body>

</html>
