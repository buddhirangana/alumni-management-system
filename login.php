<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow" />
    <title>Log In | Alumni Association SICT</title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert.min.js"></script>

    <style>
        html,
        body {
            height: 100%;
            background-color: #ededed;
        }
    </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <?php

    if (isset($_POST['user_login_submit'])) {
        $Email = $_POST['Email'];
        $Password = md5($_POST['Password']); 

        $stmt = $conn->prepare("SELECT * FROM user WHERE Email = ? AND Password = BINARY ?");
        $stmt->bind_param("ss", $Email, $Password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['usermail'] = $Email;
            $_SESSION['user_type'] = 'user';
            header("Location: admin/admin.php");
            exit();
        }

        $stmt = $conn->prepare("SELECT * FROM member WHERE Email = ? AND Password = BINARY ?");
        $stmt->bind_param("ss", $Email, $Password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['usermail'] = $Email;
            $_SESSION['user_type'] = 'member'; 
            header("Location: alumni/alumni.php");
            exit();
        }

        echo "<script>
             swal({
                title: 'Invalid email or password!',
                icon: 'error',
             });
          </script>";

        $stmt->close();
    }
    ?>

    <main class="form-signin m-auto">
        <form action="" method="POST">
            <img class="mb-4" src="assets/img/sict_alumi_logo.webp" alt="Alumni Association" width="290" height="auto">
            <div class="form-floating pb-2">
                <input type="email" class="form-control" id="floatingInput" name="Email" placeholder="name@example.com">
                <label for="floatingInput">Email Address</label>
            </div>
            <div class="form-floating pb-3">
                <input type="password" class="form-control" id="floatingPassword" name="Password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="btn btnlogin w-100 py-2" type="submit" name="user_login_submit">Log In</button>
            <hr class="mt-4 mb-4 border-secondary-subtle">
            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-4 mb-2">
                <a href="/" class="text-decoration-none btnback">Back to AASICT</a>
                <a href="register-online.php" class="text-decoration-none btnback">Create new account</a>
            </div>
        </form>
    </main>

</body>

</html>