<?php
session_start(); // Starting session

if (!isset($_SESSION['username'])) { // If session is not set then redirect to Login Page
    header("Location: login.php"); // Redirecting to Login Page
    exit(); // Stop script
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body class="bg-light">

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
</style>
</head>
<body class="bg-light">

    <!-- Navbar -->
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
        <h2 class="text-center mb-4">List of Faculty Computing Year 1 Registered Students</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" style="border-color: #6c757d;">
                <thead style="background-color: #d4edda;">
                    <tr>
                        <th style="color: black;">ID</th>
                        <th style="color: black;">Name</th>
                        <th style="color: black;">Email</th>
                        <th style="color: black;">Gender</th>
                        <th style="color: black;">Birthday</th>
                        <th style="color: black;">Program</th>
                        <th style="color: black;">Update</th>
                        <th style="color: black;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db.php"; 

                    $sql = "SELECT * FROM users";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { 
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['birthday']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['program']) . "</td>";
                            echo "<td> <a href='update.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-warning btn-sm'>Update</a> </td>";
                            echo "<td> <a href='delete.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-danger btn-sm'>Delete</a> </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No Data Found</td></tr>";
                    }

                    mysqli_stmt_close($stmt);
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <a href="addStudent.php" class="btn btn-primary">Add New User</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
