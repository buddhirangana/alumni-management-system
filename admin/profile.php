<?php
include("../config.php");
session_start();

if (!isset($_SESSION['usermail']) || empty($_SESSION['usermail']) || $_SESSION['user_type'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

$usermail = $_SESSION['usermail'];

$sql = "SELECT * FROM user WHERE Email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usermail);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>User Profile | Alumni Association SICT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
    <?php include('includes/global_styles.php'); ?>
    <style>
        .table-responsive {
            padding: 4px;
            padding-top: 8px;
            margin-bottom: -14px;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 10px;
        }

        table.table td:last-child {
            width: auto;
        }
    </style>
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
                            <h3 class="mb-0">User Profile</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                                    <div class="card-title">Welcome, Admin!</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php if ($user): ?>
                                                    <div class="profile-info">
                                                        <tr>
                                                            <th>User ID</th>
                                                            <td><?php echo htmlspecialchars($user['User_id']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td><?php echo htmlspecialchars($user['Email']); ?></td>
                                                        </tr>
                                                    </div>
                                                <?php else: ?>
                                                    <p>User data not found.</p>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="edit_profile.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>&nbsp; Edit Profile</a>
                                </div>
                            </div>
                            <?php if (isset($_GET['update']) && htmlspecialchars($_GET['update']) == 'success'): ?>
                                <div class="callout callout-success">Profile updated successfully!</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("includes/footer.php"); ?>
        
    </div>

</body>

</html>