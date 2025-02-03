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

            <div class="row mb-3">
                <div class="image-button text-center ">
                    <label for="imageInput" class="btn btn-outline-success btn-xl">Add Image</label>
                    <input type="file" id="imageInput" accept="image/*" style="display: none;">
                    <div class="image-preview-container " style="display: none;">
                        <img id="previewImage" src="" alt="Uploaded Image" class="mt-3 img-preview text-center"
                            style="max-width: 100%; height: auto;">
                        <button id="removeImageBtn" class="btn btn-danger btn-sm mt-2">Remove Image</button>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="captionform" class="form-label">Caption</label>
                <input type="text" class="form-control" placeholder="Caption" id="captionform">
            </div>
            <div class="row mb-3">
                <label for="descriptionform" class="form-label">Description</label>
                <textarea id="descriptionform" class="form-control"
                    placeholder="Write something about your day..."></textarea>
            </div>
            <div class="row mb-3">
                <a href="views/add_day.php" class="btn btn-warning btn-sm p-3 rounded-5">Add Day</a>
            </div>
            <div class="row ">
                <a href="views/add_day.php" class="btn btn-outline-success btn-sm p-3 rounded-5">My Life</a>
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
    });


    document.getElementById("removeImageBtn").addEventListener("click", function() {
        document.getElementById("previewImage").src = "";
        document.querySelector(".image-preview-container").style.display = "none";
        document.getElementById("removeImageBtn").style.display = "none";
        document.getElementById("imageInput").value = "";
    });
    </script>

</body>

</html>