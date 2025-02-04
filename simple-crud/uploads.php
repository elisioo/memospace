<?php include '../database/datosbase.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bee-Uploads</title>
    <link rel="stylesheet" href="../statics/css/bootstrap.min.css">
    <link rel="stylesheet" href="../statics/js/bootstrap.bundle.js">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6 ">
            <?php
          $res = $conn->query("SELECT * FROM simple_crud");
        ?>
            <?php if($res->num_rows > 0): ?>
            <?php while($row = $res->fetch_assoc()): ?>
            <div class="card mb-3 border-warning shadow" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['caption']; ?></h5>
                            <p class="card-text"><?= $row['description']; ?></p>
                            <div class="row">
                                <div class="col-6">
                                    <p class="card-text"><small class="text-body-secondary">Date added
                                            <?= $row['time']; ?></small></p>
                                </div>
                                <div class="col-3">
                                    <a href="update.php?upid=<?=$row['upid'];?>" class="btn btn-sm btn-warning">Edit</a>
                                </div>
                                <div class="col-3">
                                    <a href="../handlers/delete_scrud_handler.php?upid=<?=$row['upid'];?>"
                                        class="btn btn-sm btn-danger">Delete</a>
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
</body>

</html>