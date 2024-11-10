<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db.php"; // Include the database connection

    // Get the username and password from the POST request
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to get the user from the database
    $sql = "SELECT * FROM users_reg WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // If the username exists in the database
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Login successful, set session and redirect to view.php
            $_SESSION['username'] = $user['username'];
            header("Location: view.php"); // Redirect to view.php
            exit(); // Ensure further code does not execute after the redirection
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "Username not found!";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-color: lightgreen;
            font-size: 18px;
        }
        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }
        .container {
            margin-top: 70px;
        }
        .form-container h2 {
            margin-bottom: 40px;
            font-size: 30px;
        }
        .form-container .form-label {
            font-weight: bold;
            font-size: 20px;
        }
        .form-container input[type="text"], .form-container input[type="password"] {
            font-size: 20px;
            padding: 12px;
        }
        .form-container .btn-block {
            width: 100%;
            font-size: 20px;
            padding: 15px;
        }
        .text-center a {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <!-- Login Form -->
            <div class="col-md-6">
                <div class="form-container">
                    <h2 class="text-center">Login</h2>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="index.php">Don't have an account? Register here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
