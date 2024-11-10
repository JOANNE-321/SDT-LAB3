<?php
session_start(); 

if (!isset($_SESSION['username'])) { 
    header("Location: login.php");
    exit(); 
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <style>
        .navbar-custom {
            background-color: slateblue; 
        }
        .navbar-custom .navbar-nav .nav-link {
            color: white;
            font-size: 18px; 
        }
        .navbar-custom .navbar-nav .nav-link:hover {
            color: #FFD700; 
        }
        .navbar-custom .navbar-brand {
            color: white; 
            font-size: 24px;  
        }

        .navbar-nav {
            margin-left: auto; 
        }

        .navbar-nav .nav-item {
            margin-right: 15px; 
        }

        .form-container {
            width: 45%; 
            margin: 0 auto; 
            padding: 25px;
            background-color:white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .form-container h2 {
            margin-top: 50px;;
            margin-bottom: 50px;
        }
    </style>
</head>
<body class="bg-light">


<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Student List</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="view.php">List of Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addStudent.php">Add Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center">Update Information</h2>

        <?php
        include "db.php"; 
        
        if (isset($_GET['id'])) {
            $id = $_GET['id']; 
            $sql = "SELECT * FROM users WHERE id=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id); 
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
        }
        ?>

        <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <input type="text" name="gender" value="<?php echo htmlspecialchars($row['gender']); ?>" id="gender" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday:</label>
                <input type="date" name="birthday" value="<?php echo htmlspecialchars($row['birthday']); ?>" id="birthday" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="program" class="form-label">Program:</label>
                <input type="text" name="program" value="<?php echo htmlspecialchars($row['program']); ?>" id="program" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Update User</button>
            <a href="view.php" class="d-block text-center mt-3">Back to User List</a>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $program = $_POST['program'];

            $sql = "UPDATE users SET name=?, email=?, gender=?, birthday=?, program=? WHERE id=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssi", $name, $email, $gender, $birthday, $program, $id);

            if (mysqli_stmt_execute($stmt)) {
                echo "<div class='alert alert-success text-center mt-3'>Record updated successfully</div>";
            } else {
                echo "<div class='alert alert-danger text-center mt-3'>Error: " . mysqli_error($conn) . "</div>";
            }

            mysqli_stmt_close($stmt);
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0zGzj2DRb3CLt78bF6DY5V0Y5EjDRSrtgzfjlWAGglc3s8Dg" crossorigin="anonymous"></script>
</body>
</html>
