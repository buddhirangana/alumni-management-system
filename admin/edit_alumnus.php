<?php
include("../config.php");
session_start();

if (!isset($_SESSION['usermail']) || empty($_SESSION['usermail']) || $_SESSION['user_type'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

$usermail = $_SESSION['usermail'];

if (isset($_POST['member_registration'])) {
    $eid = $_GET['id'];
    $Name = $_POST['fullname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $NIC = $_POST['nic'];
    $Reg_no = $_POST['id'];
    $AC_year = $_POST['year'];
    $Programme = $_POST['programme'];
    $Member_type = $_POST['member_type'];
    $Address = $_POST['address'];

    if ($Name == "" || $Email == "" || $Phone == "" || $NIC == "" || $Reg_no == "" || $AC_year == "" || $Programme == "Select" || $Member_type == "Select" || $Address == "") {
        echo '<div class="callout callout-danger">Please fill in all required fields.</div>';
    } else {
        $sql = "UPDATE member set Name='$Name',Email='$Email', Phone='$Phone', NIC='$NIC', Reg_no='$Reg_no', Academic_year='$AC_year', Programme='$Programme',  Member_type='$Member_type', Address='$Address' where Member_id='$eid'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: all_alumni.php?update=success");
            exit();
        } else {
            echo '<div class="callout callout-warning">Something went wrong. Please try again!</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Update Alumnus Details | Alumni Association SICT</title>
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
                            <h3 class="mb-0">Update Alumnus Details</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Alumnus Details</li>
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
                                <form method="POST">
                                    <?php
                                    $eid = $_GET['id'];
                                    $ret = mysqli_query($conn, "SELECT * from member where Member_id='$eid'");
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($row['Name']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['Email']); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                                        <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($row['Phone']); ?>" maxlength="10" pattern="[0][0-9]{9}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="nic" class="form-label">NIC / Passport Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nic" name="nic" value="<?php echo htmlspecialchars($row['NIC']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="id" class="form-label">Registration Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($row['Reg_no']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="year" class="form-label">Academic Year <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="year" name="year" value="<?php echo htmlspecialchars($row['Academic_year']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="programme" class="form-label">Programme <span class="text-danger">*</span></label>
                                                    <select class="form-control form-select" id="programme" name="programme" required>
                                                        <option value="" selected>Select</option>
                                                        <option value="Degree" <?php echo ($row['Programme'] == 'Degree' ? 'selected' : ''); ?>>Degree Programme</option>
                                                        <option value="Diploma" <?php echo ($row['Programme'] == 'Diploma' ? 'selected' : ''); ?>>Diploma Programme</option>
                                                        <option value="Advanced Certificate" <?php echo ($row['Programme'] == 'Advanced Certificate' ? 'selected' : ''); ?>>Advanced Certificate Programme</option>
                                                        <option value="Certificate" <?php echo ($row['Programme'] == 'Certificate' ? 'selected' : ''); ?>>Certificate Programme</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="member_type" class="form-label">Member Type <span class="text-danger">*</span></label>
                                                    <select class="form-control form-select" id="member_type" name="member_type" value="<?php echo $row['Member_type']; ?>" required>
                                                        <option value="" selected>Select</option>
                                                        <option value="Member" <?php echo ($row['Member_type'] == 'Member' ? 'selected' : ''); ?>>Member</option>
                                                        <option value="Associate Member" <?php echo ($row['Member_type'] == 'Associate Member' ? 'selected' : ''); ?>>Associate Member</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="address" name="address" rows="4" required><?php echo htmlspecialchars($row['Address']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" name="member_registration" type="submit"><i class="bi bi-floppy"></i>&nbsp; Save Changes</button>
                                        <a href="all_alumni.php" class="btn float-end"><i class="bi bi-arrow-left-circle"></i>&nbsp; Back to All Alumni</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            var phone_input = document.getElementById("phone");

            phone_input.addEventListener('input', () => {
                phone_input.setCustomValidity('');
                phone_input.checkValidity();
            });

            phone_input.addEventListener('invalid', () => {
                if (phone_input.value === '') {
                    phone_input.setCustomValidity('Enter phone number!');
                } else {
                    phone_input.setCustomValidity('Enter phone number in this format: 071-4566-789');
                }
            });
        </script>

        <?php include("includes/footer.php"); ?>

    </div>

</body>

</html>