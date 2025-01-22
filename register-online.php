<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Online | Alumni Association SICT</title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert.min.js"></script>
</head>

<body>

    <?php include('includes/header.php'); ?>

    <section class="py-5 py-xl-8">
        <div class="page-header-area">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="section-title-wrapper text-white">
                            <div class="text-white hidden">
                                <h1 class="text-white mb-3 mt-4">Register Online</h1>
                                <p class="text-white"><a href="/">Home </a> &nbsp; <i class="bi bi-arrow-right"></i> &nbsp; <span class="lnr lnr-arrow-right"></span>
                                    <a href="join-with-us.php">Join with Us</a> &nbsp; <i class="bi bi-arrow-right"></i> &nbsp; <span class="lnr lnr-arrow-right"></span>
                                    <a href="register-online.php">Register Online</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 py-xl-8 pb-6 mb-4">
        <div class="container">
            <div class="row justify-content-md-center hidden">
                <div class="col-md-9 mb-4">
                    <div class="bg-white border shadow-sm overflow-hidden hidden" style="border-radius: 20px;">
                        <form action="" method="POST">
                            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                <div class="col-12">
                                    <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" value="" required style="border-radius: 20px;">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="border-radius: 20px 0px 0px 20px;">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" value="" required style="border-radius: 0px 20px 20px 0px;">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="border-radius: 20px 0px 0px 20px;">
                                            <i class="bi bi-telephone"></i>
                                        </span>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="" maxlength="10" pattern="[0][0-9]{9}" required style="border-radius: 0px 20px 20px 0px;">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="nic" class="form-label">NIC / Passport Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nic" name="nic" value="" required style="border-radius: 20px;">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="id" class="form-label">Registration Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="id" name="id" value="" required style="border-radius: 20px;">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="year" class="form-label">Academic Year <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="year" name="year" value="" required style="border-radius: 20px;">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="programme" class="form-label">Programme <span class="text-danger">*</span></label>
                                    <select class="form-control form-select form-select-m" name="programme" required style="border-radius: 20px;">
                                        <option selected>Select</option>
                                        <option value="Degree">Degree Programme</option>
                                        <option value="Diploma">Diploma Programme</option>
                                        <option value="Advanced Certificate">Advanced Certificate Programme</option>
                                        <option value="Certificate">Certificate Programme</option>
                                    </select>

                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="subject" class="form-label">Member Type <span class="text-danger">*</span></label>
                                    <select class="form-control form-select form-select-m" name="member_type" required style="border-radius: 20px;">
                                        <option selected>Select</option>
                                        <option value="Member">Member</option>
                                        <option value="Associate Member">Associate Member</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" value="" required style="border-radius: 20px;">
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="address" name="address" rows="4" required style="border-radius: 20px;"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn calltoactionbtn btn-lg" type="submit" name="member_registration" style="width: auto; height: auto;">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['member_registration'])) {
                            $Name = $_POST['fullname'];
                            $Email = $_POST['email'];
                            $Phone = $_POST['phone'];
                            $NIC = $_POST['nic'];
                            $Reg_no = $_POST['id'];
                            $AC_year = $_POST['year'];
                            $Programme = $_POST['programme'];
                            $Member_type = $_POST['member_type'];
                            $Password = md5($_POST['password']);
                            $Address = $_POST['address'];

                            if ($Name == "" || $Email == "" || $Phone == "" || $NIC == "" || $Reg_no == "" || $AC_year == "" || $Programme == "Select" || $Member_type == "Select" || $Password == "" || $Address == "") {
                                echo "<script>swal({
                                    title: 'Fill the proper details',
                                    icon: 'error',
                                    });
                                </script>";
                            } else {
                                $sta = "NotConfirm";
                                $sql = "INSERT INTO member (Name,Email,Phone,NIC,Reg_no,Academic_year,Programme,Member_type,Password,Address) VALUES ('$Name','$Email','$Phone','$NIC','$Reg_no','$AC_year','$Programme','$Member_type','$Password','$Address')";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    echo "<script>swal({
                                        title: 'Registration successful',
                                        icon: 'success',
                                    });
                                    </script>";
                                    echo "<meta http-equiv='Refresh' Content='2'; url='" . $_SERVER . "'>";
                                } else {
                                    echo "<script>swal({
                                        title: 'Something went wrong',
                                        icon: 'error',
                                    });
                                </script>";
                                }
                            }
                        }
                        ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="hidden">
                        <div class="card h-100 border-1">
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="executive-committee.php">
                                    <div class="h6 card-title mb-0"><i class="bi bi-people" style="font-size: 20px;"></i> &nbsp; Executive Committee</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden mt-3">
                        <div class="card h-100 border-1">
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="benefits.php">
                                    <div class="h6 card-title mb-0"><i class="bi bi-info-lg" style="font-size: 20px;"></i> &nbsp; Benefits</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden mt-3">
                        <div class="card h-100 border-1">
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <div class="h6 card-title mb-0"><i class="bi bi-download" style="font-size: 20px;"></i> &nbsp; Membership Application</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden mt-3">
                        <div class="card h-100 border-1">
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="register-online.php">
                                    <div class="h6 card-title mb-0"><i class="bi bi-link-45deg" style="font-size: 20px;"></i> &nbsp; Register Online</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

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

    <?php include('includes/footer.php'); ?>

</body>

</html>