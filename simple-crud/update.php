<?php include'../database/datosbase.php';
try {


    $upid = $_GET['upid'];
  
    $stmt = $conn->prepare("SELECT * FROM simple_crud WHERE upid = ?");
    $stmt->bind_param("i", $upid);
    $stmt->execute();
    $result = $stmt->get_result();
  
    if ($result && $result->num_rows > 0) {
      $todo = $result->fetch_assoc();
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
                <form class="form" action="../handlers/update_todo_handler.php" method="POST" required>
                    <input name="upid" value="<?= $todo['upid'] ?>" hidden />
                    <div class="my-3">
                        <label>Caption</label>
                        <input class="form-control" type="text" name="caption" value="<?= $todo['caption'] ?>" />
                    </div>
                    <div class="my-3">
                        <label>Description</label>
                        <textarea class="form-control" type="text" name="description"
                            required><?= $todo['description'] ?></textarea>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-outline-success">Save Edit</button>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</body>

</html>