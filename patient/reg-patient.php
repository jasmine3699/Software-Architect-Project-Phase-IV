<?php
include('../database/connect.php');

if (isset($_POST['register-patient'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirm-password'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $date = date("Y/m/d");

  if ($password == $confirmpassword) {
    $sql = "INSERT INTO patient (Name, Email, Password, Gender, Age, Address, Date) VALUES ('" . $name . "', '" . $email . "', '" . $password . "', '" . $gender . "', '" . $age . "', '" . $address . "', '" . $date . "');";
    if (mysqli_query($conn, $sql)) {
      header('Location: login.php');
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

} else {
  header('Location: register.php');
}

?>