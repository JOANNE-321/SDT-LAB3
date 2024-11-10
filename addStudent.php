<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Registration Page</title>
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
            width: 30%;
            margin: 0 auto;
            background-color: white;
            border-radius: 15px;    
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

    <h1 class="text-center mb-4 display-4" style="color: black; padding: 25px; font-size: 36px; font-weight: bold;">New Student Registration Form</h1>

    <form action="addStudent.php" method="POST" class="form-container p-4 border border-dark rounded-3 shadow-sm" style="font-size: 18px;">
        <div class="text-center mb-4 bg-warning text-dark p-3 fs-4 font-weight-bold">
            Student Personal Details:
        </div>

        <div class="mb-3">
            <label class="form-label" style="font-size: 20px;"><b>Full Name:</b></label>
            <input type="text" name="name" class="form-control" required style="font-size: 20px; padding: 12px;">
        </div>

        <div class="mb-3">
            <label class="form-label" style="font-size: 20px;"><b>Email:</b></label>
            <input type="email" name="email" class="form-control" required style="font-size: 20px; padding: 12px;">
        </div>

        <div class="mb-3">
            <label class="form-label" style="font-size: 20px;"><b>Gender:</b></label><br>
            <div class="form-check form-check-inline">
                <input type="radio" name="gender" value="Male" class="form-check-input" required style="font-size: 20px;">
                <label class="form-check-label" for="male" style="font-size: 20px;">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="gender" value="Female" class="form-check-input" required style="font-size: 20px;">
                <label class="form-check-label" for="female" style="font-size: 20px;">Female</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" style="font-size: 20px;"><b>Date of Birth:</b></label>
            <input type="date" id="birthday" name="birthday" class="form-control" required style="font-size: 20px; padding: 12px;">
        </div>

        <div class="text-center mb-4 bg-warning text-dark p-3 fs-4 font-weight-bold">
            Academic Information:
        </div>

        <div class="mb-3">
            <label class="form-label" for="program" style="font-size: 20px;"><b>Program of Study:</b></label>
            <select name="program" id="program" class="form-select" required style="font-size: 20px; padding: 12px;">
                <option value="">Please Select</option>
                <option value="Data Engineering">Data Engineering</option>
                <option value="Software Engineering">Software Engineering</option>
                <option value="Graphic Design and Multimedia">Graphic Design and Multimedia</option>
                <option value="Bioinformatics">Bioinformatics</option>
                <option value="Network and Security">Network and Security</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success w-100 fw-bold" style="font-size: 20px; padding: 15px;">Add Student</button>
    </form>

    <div class="text-center mt-3">
        <a href="view.php" class="text-decoration-underline" style="font-size: 18px;">Back to List</a>
    </div>

    <?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $program = $_POST['program'];

        $stmt = $conn->prepare("INSERT INTO users (name, email, gender, birthday, program) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $gender, $birthday, $program);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center mt-3'>New record created successfully</div>";
        } else {
            echo "<div class='alert alert-danger text-center mt-3'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0zGzj2DRb3CLt78bF6DY5V0Y5EjDRSrtgzfjlWAGglc3s8Dg" crossorigin="anonymous"></script>
</body>

</html>
