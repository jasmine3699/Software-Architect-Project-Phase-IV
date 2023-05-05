<?php
    session_start();
    include('./includes/header.php');
?>
<body class="login-body">
    <a class="btn-outlined home-btn" href="../index.php">Home</a>
    <div class="login">
        <div class="login-card dr-login-bg">
            <h1>Patient Login</h1>
            <form class="login-form" action="auth.php" method="POST">
                <div class="login-form-inputs">
                    <label class="login-label" for="email">Email Address</label>
                    <input class="login-input" type="email" name="email" id="email">
                    <?php
                        if(isset($_SESSION['error-email'])){
                            echo '<p style="font-size: 14px; color: red;">' . $_SESSION['error-email'] . '</p>';
                            unset($_SESSION['error-email']);
                        }
                    ?>
                </div>
                <div class="login-form-inputs">
                    <label class="login-label" for="password">Password</label>
                    <input class="login-input" type="password" name="password" id="password">
                    <?php
                        if(isset($_SESSION['error-pass'])){
                            echo '<p style="font-size: 14px; color: red;">' . $_SESSION['error-pass'] . '</p>';
                            unset($_SESSION['error-pass']);
                        }
                    ?>
                </div>
                <div class="login-form-button">
                    <button class="btn-secondary" type="submit" name="patient-login">Login</button>
                </div>
            </form><br>
            <a style="text-decoration: none; color: black; margin-left:15px;" href="register.php">Register New Patient</a>
        </div>
    </div>
    
</body>
</html>