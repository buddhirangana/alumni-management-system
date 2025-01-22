<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/sict_alumi_logo.webp" alt="Alumni Association">
      </a>

      <?php
        $activePage = basename($_SERVER['PHP_SELF'], ".php");
        echo '<style>';
        echo '.active{';
        echo 'color: var(--accent-color)!important;';
        echo '}';
        echo '</style>';
      ?>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a class="<?= ($activePage == 'index') ? 'active':''; ?>" href="/" >Home</a></li>
          <li class="dropdown"><a class="<?= ($activePage == 'about-us') || ($activePage == 'vision-mission') || ($activePage == 'presidents-message') || ($activePage == 'executive-committee') || ($activePage == 'downloads') ? 'active':''; ?>" href="#"><span>About</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a class="<?= ($activePage == 'about-us') ? 'active':''; ?>" href="about-us.php">About Us</a></li>
              <li><a class="<?= ($activePage == 'vision-mission') ? 'active':''; ?>" href="vision-mission.php">Vision & Mission</a></li>
              <li><a class="<?= ($activePage == 'presidents-message') ? 'active':''; ?>" href="presidents-message.php">President's Message</a></li>
              <li><a class="<?= ($activePage == 'executive-committee') ? 'active':''; ?>" href="executive-committee.php">Executive Committee</a></li>
              <li><a class="<?= ($activePage == 'downloads') ? 'active':''; ?>" href="downloads.php">Downloads</a></li>
            </ul>
          </li>
          <li><a class="<?= ($activePage == 'join-with-us') ? 'active':''; ?>" href="join-with-us.php">Join with Us</a></li>
          <li><a class="<?= ($activePage == 'projects') ? 'active':''; ?>" href="projects.php">Projects</a></li>
          <li><a class="<?= ($activePage == 'events') ? 'active':''; ?>" href="events.php">Events</a></li>
          <li><a class="<?= ($activePage == 'contact-us') ? 'active':''; ?>" href="contact-us.php">Contact Us</a></li>
          <li class="logbtn"><a href="login.php"><button type="button" class="btn calltoactionbtn login-btn">Login</button></a></li>
          <li class="joinbtn"><a href="register-online.php"><button type="button" class="btn btnjoinaction join-btn">Join Now</button></a></li>

        </ul>
        
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
