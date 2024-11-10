<?php
include "db.php";

$alertMessage = "";
$alertClass = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['confirm'])) {
        
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);

        
        if ($stmt->execute()) {
            $alertMessage = "User Deleted Successfully";
            $alertClass = "alert-success";
        } else {
            $alertMessage = "User Not Deleted";
            $alertClass = "alert-danger";
        }

        $stmt->close();
    } elseif (isset($_POST['cancel'])) {
        header("Location: view.php");
        exit();
    }
} else {
    header("Location: view.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Deletion</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            padding: 25px;
        }

        .form-box {
            width: 50%; 
            padding: 25px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center; 
        }

        .form-box h2 {
            margin-bottom: 30px; 
        }

        .form-box .btn {
            width: 45%; 
            padding: 12px;
            margin: 10px;
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

    <div class="form-container">
        <div class="form-box">
            <h2 class="text-black">Are you sure you want to delete this student?</h2>
            
            <?php if (!empty($alertMessage)) : ?>
                <div class="alert <?php echo $alertClass; ?>" role="alert">
                    <?php echo $alertMessage; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="d-flex justify-content-between">
                    <button type="submit" name="confirm" class="btn btn-danger">Yes, Delete</button>
                    <button type="submit" name="cancel" class="btn btn-success">No, Cancel</button>
                </div>
                <div class="mt-3 text-center">
                    <a href="view.php">Back to view</a>
                </div>
            </form>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html> 
