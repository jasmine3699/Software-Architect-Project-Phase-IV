<?php
include('../database/connect.php');
session_start();

if (isset($_POST['patient-login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM patient WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);
        $db_pass = $row['Password'];
        if($db_pass===$password){
            $_SESSION['id'] = $row['PatID'];
            $_SESSION['name'] = $row['Name'];
            header('Location: dashboard.php');
        }else{
            $_SESSION['error-pass'] = 'Invalid password';
            header('Location: login.php');
        }
    } else {
        $_SESSION['error-email'] = 'Email does not exist';
        header('Location: login.php');
    }

} else {
    header('Location: login.php');
}

?>