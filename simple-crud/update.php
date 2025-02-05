<?php include'../database/datosbase.php';
try {


    $upid = $_GET['upid'];
  
    $stmt = $conn->prepare("SELECT * FROM simple_crud WHERE upid = ?");
    $stmt->bind_param("i", $upid);
    $stmt->execute();
    $result = $stmt->get_result();
  
    if ($result && $result->num_rows > 0) {
      $beeday = $result->fetch_assoc();
    } else {
      die("Todo not found");
    }
    $stmt->close();
  } catch (\Exception $e) {
    echo "Error: " . $e;
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<!-- not finish -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update-Bee</title>
    <link rel="stylesheet" href="../statics/css/bootstrap.min.css">
    <link rel="stylesheet" href="../statics/js/bootstrap.bundle.js">
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-6">
            <div class="row">
                <p class="display-5 fw-bold text-warning">Edit your Day</p>
            </div>
            <div class="row">
                <div class="border border-warning p-5 rounded-2 shadow">
                    <form class="form" action="../handlers/update_scrud_handler.php" method="POST"
                        enctype="multipart/form-data">
                        <input name="upid" value="<?= $beeday['upid'] ?>" hidden />
                        <div class="row mb-3">
                            <div class="image-button text-center ">
                                <label for="imageInput" class="btn btn-outline-success btn-xl">Add Image</label>
                                <input type="file" name="img_dir" accept="image/*" style="display: none;">
                                <div class="image-preview-container " style="display: none;">
                                    <img id="previewImage" src="" alt="Uploaded Image"
                                        class="mt-3 img-preview text-center" style="max-width: 100%; height: auto;">
                                    <button id="removeImageBtn" class="btn btn-danger btn-sm mt-2">Remove Image</button>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>Caption</label>
                            <input type="text" class="form-control" placeholder="Caption" name="caption"
                                value="<?= $beeday['caption']?>" required>
                        </div>
                        <div class="row mb-3">
                            <label>Description</label>
                            <textarea class="form-control" placeholder="Write something about your day..."
                                name="description" required><?= $beeday['description']?></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <button class="btn btn-outline-warning btn-sm p-3 rounded-2" type="submit">Save
                                    Edit</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>