<?php
    $filename = basename($_SERVER['PHP_SELF']);
?>
<nav style="background-color: #FF8E8E;">
    <div class="logo">
        <h1>HMS</h1>
    </div>
    <div class="nav-links">
        <a class="nav-link <?php echo ($filename == 'dashboard.php') ? 'active' : ''; ?>" href="dashboard.php">Dashboard</a>
        <a class="nav-link <?php echo ($filename == 'appointment-view.php') ? 'active' : ''; ?>" href="appointment-view.php">Appointment</a>
        <a class="nav-link <?php echo ($filename == 'patients.php') ? 'active' : ''; ?>" href="patients.php">Patient</a>
        <a class="nav-link <?php echo ($filename == 'search-patient-report.php') ? 'active' : ''; ?>" href="search-patient-report.php">Report</a>
    </div>
    <div class="profile">
        <span class="prof-img"><img src="../assets/img/recp-profile.png" alt="" width="30"></span>
        <div class="dropdown-content">
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>
</nav>