<?php
include '../database/datosbase.php';
include '../helpers/authenticated.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bee-Uploads</title>
    <link rel="stylesheet" href="../statics/css/bootstrap.min.css">
    <link rel="stylesheet" href="../statics/js/bootstrap.bundle.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="simple.css">

</head>

<body>
    <a href="../handlers/logout_handler.php" class="btn btn-danger btn-sm position-fixed top-0 start-0 mt-3 ms-3 z-3">
        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Leave
    </a>
    <div class="container d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6">
            <p class="display-5 fw-bold text-center text-warning">My Life 🐝</p>
            <p class="display-12 fw-bold text-center text-secondary">How was your day?</p>

            <?php
            $res = $conn->query("SELECT * FROM simple_crud");
            ?>
            <?php if ($res->num_rows > 0): ?>
                <?php while ($row = $res->fetch_assoc()): ?>
                    <div class="card mb-3 border-warning shadow" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">

                                <img src="../uploads/<?= $row['img_dir']; ?>" class="img-fluid rounded-start"
                                    style="width: 100%; height: 150px; object-fit: cover;" alt="Uploaded Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['caption']; ?></h5>
                                    <p class="card-text"><?= $row['description']; ?></p>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <?php
                                                    if ($row['is_edited'] == 1) {
                                                        echo "Date Edited " . $row['time'];
                                                    } else {
                                                        echo "Date Added " . $row['time'];
                                                    }
                                                    ?>
                                                </small>
                                            </p>
                                        </div>
                                        <div class="col d-flex justify-content-end align-items-center gap-1"
                                            style="height: 35px;">
                                            <a href="update.php?upid=<?= $row['upid']; ?>" class="btn btn-sm">
                                                <i class="fa-solid fa-pen fa-lg" style="color:rgb(255, 200, 0);"></i>
                                            </a>
                                            <a href="../handlers/delete_scrud_handler.php?upid=<?= $row['upid']; ?>"
                                                class="btn btn-sm">
                                                <i class="fa-solid fa-eraser fa-lg" style="color:rgb(255, 0, 0);"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body text-center">
                                <small class="card-title">🤕 No Life Update! You need to go out... </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <a href="simple-crud-main.php"><img src="../assets/plus-removebg-preview.png" alt="" width="35" height="35"></a>
    </footer>
</body>

</html>