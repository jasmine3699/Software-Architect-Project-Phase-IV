<?php
include('../database/connect.php');

if (isset($_POST['register-recp'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirm-password'];
  $address = $_POST['address'];

  if ($password == $confirmpassword) {
    $sql = "INSERT INTO receptionist (Name, PhoneNumber, Email, Password, Address) VALUES ('" . $name . "', '" . $contact . "', '" . $email . "', '" . $password . "', '" . $address . "');";
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