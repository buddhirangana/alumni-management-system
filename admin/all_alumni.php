<?php
include("../config.php");
session_start();

if (!isset($_SESSION['usermail']) || empty($_SESSION['usermail']) || $_SESSION['user_type'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

$usermail = $_SESSION['usermail'];

$limit = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$ret = mysqli_query($conn, "SELECT * FROM member LIMIT $limit OFFSET $offset");
$total_records_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM member");
$total_records_row = mysqli_fetch_assoc($total_records_query);
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);

if (isset($_GET['id'])) {
    $rid = intval($_GET['id']);
    $sql = mysqli_query($conn, "delete from member where Member_id=$rid");
    header("Location: all_alumni.php?delete=success");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>All Alumni | Alumni Association SICT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
    <?php include('includes/global_styles.php'); ?>

    <style>
        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 10px;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
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
                            <h3 class="mb-0">All Alumni</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Alumni</li>
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
                                    <div class="card-title">All alumni are shown here</div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="table-data">
                                            <thead>
                                                <tr class="align-middle">
                                                    <th style="width: 10px">#</th>
                                                    <th>Name</th>
                                                    <th>Programme</th>
                                                    <th>Academic Year</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th style="width: 40px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $cnt = $offset + 1;
                                                if (mysqli_num_rows($ret) > 0) {
                                                    while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                        <tr class="align-middle">
                                                            <td><?php echo $cnt; ?></td>
                                                            <td><?php echo $row['Name']; ?></td>
                                                            <td><?php echo $row['Programme']; ?></td>
                                                            <td><?php echo $row['Academic_year']; ?></td>
                                                            <td><?php echo $row['Email']; ?></td>
                                                            <td><?php echo $row['Phone']; ?></td>
                                                            <td>
                                                                <a href="view_alumnus.php?id=<?php echo htmlentities($row['Member_id']); ?>" class="view" title="View" data-toggle="tooltip"><i class="bi bi-eye-fill"></i></a>
                                                                <a href="edit_alumnus.php?id=<?php echo htmlentities($row['Member_id']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="bi bi-pencil-fill"></i></a>
                                                                <a href="all_alumni.php?id=<?php echo ($row['Member_id']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete?');"><i class="bi bi-trash-fill"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $cnt = $cnt + 1;
                                                    }
                                                } else { ?>
                                                    <tr>
                                                        <th style="text-align:center; color:red;" colspan="7">No Record Found</th>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <form action="export_data.php" method="POST">
                                        <a href="add_alumnus.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>&nbsp; Add New Alumnus</a>
                                        <button class="exportexcel btn btn-success" id="exportexcel" name="exportexcel" type="submit"><i class="bi bi-download"></i>&nbsp; Export Data</button>
                                        <ul class="pagination pagination-sm m-0 float-end">
                                            <?php if ($page > 1): ?>
                                                <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">&laquo; Previous</a></li>
                                            <?php endif; ?>
                                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                </li>
                                            <?php endfor; ?>
                                            <?php if ($page < $total_pages): ?>
                                                <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next &raquo;</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <?php if (isset($_GET['update']) && htmlspecialchars($_GET['update']) == 'success'): ?>
                                <div class="callout callout-success">Alumnus Details updated successfully!</div>
                            <?php endif; ?>
                            <?php if (isset($_GET['delete']) && htmlspecialchars($_GET['delete']) == 'success'): ?>
                                <div class="callout callout-success">Alumnus Details deleted successfully!</div>
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