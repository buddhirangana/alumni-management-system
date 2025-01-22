<?php
$memberName = '';
$stmt = $conn->prepare("SELECT Name FROM member WHERE Email = ?");
$stmt->bind_param("s", $usermail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $memberName = $row['Name'];
} else {
    echo "<script>alert('Member not found in the database.');</script>";
}
?>

<nav class="app-header navbar navbar-expand bg-body-secondary">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list" style="font-size: 22px;"></i> </a> </li>
            <form class="form-inline ml-3 mt-1 mb-1">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" id="Search" placeholder="Search" aria-label="Search" onkeyup="search()">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a></li>
            <li class="nav-item dropdown">
                <button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                    <span class="theme-icon-active">
                        <i class="my-1"></i>
                    </span>
                    <span class="d-lg-none ms-2" id="bd-theme-text">Theme</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text" style="--bs-dropdown-min-width: 8rem;">
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="false">
                            <i class="bi bi-sun-fill me-2"></i> Light <i class="bi bi-check-lg ms-auto d-none"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                            <i class="bi bi-moon-fill me-2"></i> Dark <i class="bi bi-check-lg ms-auto d-none"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="true">
                            <i class="bi bi-circle-half me-2"></i> Auto <i class="bi bi-check-lg ms-auto d-none"></i>
                        </button>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="img/user.webp" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline">Hi, <?php echo htmlspecialchars($memberName); ?></span> </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary"> <img src="img/user.webp" class="rounded-circle shadow" alt="User Image">
                        <p><?php echo htmlspecialchars($memberName); ?><small>Alumni Association SICT</small></p>
                    </li>
                    <li class="user-footer"> <a href="profile.php" class="btn btn-default btn-flat"><i class="bi bi-person"></i>&nbsp; Profile</a> <a href="#" class="btn btn-default btn-flat float-end" onclick="logout()"><i class="nav-icon bi bi-box-arrow-in-right"></i>&nbsp; Sign out</a> </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>