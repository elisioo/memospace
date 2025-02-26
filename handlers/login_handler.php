<?php

include '../database/datosbase.php';
session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = verify_user($username, $password);

        if ($user) {
            // Generate a unique token
            $token = bin2hex(random_bytes(32));

            // Store user ID and token in session
            $_SESSION['user_id'] = $user['id'];  // Store the user's ID
            $_SESSION['access_token'] = $token;

            // Redirect to the main page
            header("Location: ../views/simple-crud-main.php");
            exit;
        } else {
            $_SESSION['errors'] = "Invalid username or password!";
            header("Location: ../index.php");
            exit;
        }
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Function to verify user credentials
function verify_user($username, $password)
{
    global $conn;

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            return $row; // Return user info
        }
    }
    return false;
}