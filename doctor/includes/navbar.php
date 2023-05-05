<?php
    $filename = basename($_SERVER['PHP_SELF']);
?>
<nav style="background-color: #DDDDDD;">
    <div class="logo">
        <h1>HMS</h1>
    </div>
    <div class="nav-links">
        <a class="nav-link <?php echo ($filename == 'dashboard.php') ? 'active' : ''; ?>" href="dashboard.php">Dashboard</a>
        <a class="nav-link <?php echo ($filename == 'appointment-view.php') ? 'active' : ''; ?>" href="appointment-view.php">Appointment</a>
    </div>
    <div class="profile">
        <span class="prof-img"><img src="../assets/img/dr-profile.png" alt="" width="30"></span>
        <div class="dropdown-content">
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>
</nav>