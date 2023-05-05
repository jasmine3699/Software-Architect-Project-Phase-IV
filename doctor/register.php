<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="login-body">
    <a class="btn-outlined home-btn" href="../index.php">Home</a>
    <div class="login">
        <div class="login-card dr-login-bg">
            <h1>Doctor Register</h1>
            <form class="login-form" action="reg-doctor.php" method="POST">
                <div class="login-form-inputs">
                    <label class="login-label" for="name">Name</label>
                    <input class="login-input" type="text" name="name" id="name" required>
                </div>
                <div class="login-form-inputs">
                    <label class="login-label" for="email">Email Address</label>
                    <input class="login-input" type="email" name="email" id="email" required>
                </div>
                <div class="login-form-inputs">
                    <label class="login-label" for="contact">Contact Number</label>
                    <input class="login-input" type="number" name="contact" id="contact" required>
                </div>
                <div class="login-form-inputs">
                    <label class="login-label" for="password">Password</label>
                    <input class="login-input" type="password" name="password" id="password" required>
                </div>
                <div class="login-form-inputs">
                    <label class="login-label" for="confirm-password">Confirm Password</label>
                    <input class="login-input" type="password" name="confirm-password" id="confirm-password" required>
                </div>
                <div class="login-form-inputs">
                    <label class="login-label" for="address">Address</label>
                    <input class="login-input" type="text" name="address" id="address" required>
                </div>
                <div class="login-form-button">
                    <button class="btn-secondary" type="submit" name="register-doctor">Register</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>