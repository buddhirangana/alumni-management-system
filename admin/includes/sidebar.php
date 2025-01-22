<aside class="app-sidebar bg-primary-subtle shadow" data-bs-theme="dark">
            <div class="sidebar-brand"><a href="dashboard.php" class="brand-link"><img src="img/sict_alumi_logo_white.webp" alt="AASICT Logo" class="brand-image shadow"> </a></div>
            <?php
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
            ?>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"> <a href="dashboard.php" class="nav-link <?= ($activePage == 'dashboard') ? 'active':''; ?>"> <i class="nav-icon bi bi-speedometer"></i><p>Dashboard</p></a></li>
                        <li class="nav-item"> <a href="#" class="nav-link <?= ($activePage == 'add_alumnus') || ($activePage == 'all_alumni') ? 'active':''; ?>"> <i class="nav-icon bi bi-people"></i><p>Manage Alumni<i class="nav-arrow bi bi-chevron-right"></i></p></a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="add_alumnus.php" class="nav-link <?= ($activePage == 'add_alumnus') ? 'active':''; ?>"> <i class="nav-icon bi bi-circle"></i><p>Add Alumnus</p></a> </li>
                                <li class="nav-item"> <a href="all_alumni.php" class="nav-link <?= ($activePage == 'all_alumni') ? 'active':''; ?>"> <i class="nav-icon bi bi-circle"></i><p>All Alumni</p></a> </li>
                            </ul>
                        </li>
                        <li class="nav-item"> <a href="profile.php" class="nav-link <?= ($activePage == 'profile') ? 'active':''; ?>"> <i class="nav-icon bi bi-person"></i><p>Profile</p></a></li>
                        <li class="nav-header">OPTIONS</li>
                        <li class="nav-item"> <a href="#" class="nav-link" onclick="logout()"> <i class="nav-icon bi bi-box-arrow-in-right"></i><p>Sign out</p></a></li>
                </nav>
            </div> 
        </aside>