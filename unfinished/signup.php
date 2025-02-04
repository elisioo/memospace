<?php include 'database/datosbase.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memo Space-SignUp</title>
    <link href="statics/css/bootstrap.min.css" rel="stylesheet">
    <script src="statics/js/bootstrap.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="parallax d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="container text-center mb-5">
            <h1 class="display-1 fw-bold text-white" style="margin-bottom:-5px;">Memo Space</h1>
            <p class="text-white">Make your story out of space</p>
        </div>

        <div class="input-container" style="margin-top: -30px;">
            <p class="text-white text-left  py-1">Username</p>
            <form>
                <input type="text" placeholder="Username" required>
            </form>
            <p class="text-white text-left  py-1 mt-3">Password</p>
            <form>
                <input type="password" placeholder="Password" required>
            </form>
            <p class="text-white text-left  py-1 mt-3">Confirm Password</p>
            <form>
                <input type="password" placeholder="Confirm Password" required>
            </form>
            <button type="submit">Sign up</button>
            <div class="signup">
                <p class="text-white">Do you have an account? <a href="memospace_main.php">Sign in</a></p>
            </div>
        </div>

    </div>
    <div class=" container-fluid text-start bg-black text-light contacts">
        <p>© 2025 Eli Sorono. All rights reserved.</p>
    </div>
</body>

</html>