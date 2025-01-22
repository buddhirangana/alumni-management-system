<?php
include("../config.php");
session_start();

if (!isset($_SESSION['usermail']) || empty($_SESSION['usermail']) || $_SESSION['user_type'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

$usermail = $_SESSION['usermail'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "UPDATE user SET Email = ?, Password = ? WHERE User_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $email, $password, $user_id);
    $stmt->execute();
    $stmt->close();

    header("Location: profile.php?update=success");
    exit();
} else {
    $sql = "SELECT * FROM user WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usermail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Edit Profile | Alumni Association SICT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
    <?php include('includes/global_styles.php'); ?>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        <?php
        include('includes/navbar.php');
        include('includes/sidebar.php');
        ?>

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Profile</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline mb-4">
                                <div class="card-header">
                                    <div class="card-title">Hello, Admin! Please update the information below to improve your profile.</div>
                                </div>
                                <form method="POST" action="">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">User ID</label>
                                            <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo htmlspecialchars($user['User_id']); ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="conf_password" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="conf_password" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i>&nbsp; Save Changes</button>
                                        <a href="profile.php" class="btn float-end"><i class="bi bi-arrow-left-circle"></i>&nbsp; Back to Profile</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("includes/footer.php"); ?>

    </div>

    <script>
        document.getElementById('conf_password').oninput = function() {
            const password = document.getElementById('password').value;
            const confPassword = this.value;
            if (password !== confPassword) {
                this.setCustomValidity("Passwords do not match.");
            } else {
                this.setCustomValidity("");
            }
        };
    </script>

</body>

</html>