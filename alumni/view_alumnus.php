<?php
include("../config.php");
session_start();

if (!isset($_SESSION['usermail']) || empty($_SESSION['usermail']) || $_SESSION['user_type'] !== 'member') {
    header("Location: ../login.php");
    exit();
}

$usermail = $_SESSION['usermail'];
include('includes/fetch_user.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Alumnus Details | Alumni Association SICT</title>
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
                            <h3 class="mb-0">Alumnus Details</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Alumnus Details</li>
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
                                    <div class="card-title">Alumnus details are shown here</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php if ($user): ?>
                                                    <tr>
                                                        <th>Member ID</th>
                                                        <td><?php echo htmlspecialchars($user['Member_id']); ?></td>
                                                        <th>Full Name</th>
                                                        <td><?php echo htmlspecialchars($user['Name']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><?php echo htmlspecialchars($user['Email']); ?></td>
                                                        <th>Phone Number</th>
                                                        <td><?php echo htmlspecialchars($user['Phone']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>NIC / Passport Number</th>
                                                        <td><?php echo htmlspecialchars($user['NIC']); ?></td>
                                                        <th>Registration Number</th>
                                                        <td><?php echo htmlspecialchars($user['Reg_no']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Academic Year</th>
                                                        <td><?php echo htmlspecialchars($user['Academic_year']); ?></td>
                                                        <th>Programme</th>
                                                        <td><?php echo htmlspecialchars($user['Programme']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Member Type</th>
                                                        <td><?php echo htmlspecialchars($user['Member_type']); ?></td>
                                                        <th>Address</th>
                                                        <td><?php echo htmlspecialchars($user['Address']); ?></td>
                                                    </tr>
                                                <?php else: ?>
                                                    <p>User data not found.</p>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="edit_alumnus.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>&nbsp; Edit Details</a>
                                </div>
                            </div>
                            <?php if (isset($_GET['update']) && htmlspecialchars($_GET['update']) == 'success'): ?>
                                <div class="callout callout-success">Details updated successfully!</div>
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