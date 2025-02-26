<?php
include 'helpers/not_authenticated.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="statics/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="statics/js/bootstrap.bundle.js"></script>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center py-5 vh-100">
        <div class="col-md-4">
            <div class="d-flex align-items-center justify-content-center py-5">
                <img src="assets/bee-removebg-preview.png" alt="Bee" width="30" height="30" id="bee" class="bee">
                <p class="display-5 fw-bold text-warning mb-0 me-2">Register</p>
            </div>
            <div class="border border-warning p-5 rounded-2 shadow">
                <form class="form" action="handlers/register_handler.php" method="POST">
                    <div class="row mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control py-2" placeholder="Username" name="username" required>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control py-2" placeholder="Password" name="password"
                            required>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control py-2" name="confirm_password"
                            placeholder="Confirm Password" required />
                    </div>
                    <div class="row mb-3">
                        <button class="btn btn-warning btn-sm p-2 rounded-5 w-100" type="submit">Register</button>
                    </div>

                    <div class="text-end">
                        Already have an account? &nbsp;
                        <a href="index.php" class="text-warning">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>