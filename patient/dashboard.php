<?php
session_start();
if (isset($_SESSION['id'])) {
    include('../database/connect.php');
    include('./includes/header.php');
    ?>

    <body>
        <?php
        include('./includes/navbar.php');
        $pat_id = $_SESSION['id'];

        $patient_sql = "SELECT * FROM patient WHERE PatID = '" . $pat_id . "'";
        $patient_result = mysqli_query($conn, $patient_sql);
        $patient_row = mysqli_fetch_assoc($patient_result);
        ?>
        <div class="container">
            <h2 style="font-weight: 500">Welcome
                <?php echo $_SESSION['name'] ?>
            </h2>
            <div class="d-form">
                <div class="form-row">
                    <p>Patient Name</p>
                    <p>
                        <?php echo $patient_row['Name'];
                        ; ?>
                    </p>
                </div>
                <div class="form-row">
                    <p>Email</p>
                    <p>
                        <?php echo $patient_row['Email']; ?>
                    </p>
                </div>
                <div class="form-row">
                    <p>Age</p>
                    <p>
                        <?php echo $patient_row['Age']; ?>
                    </p>
                </div>
                <div class="form-row">
                    <p>Gender</p>
                    <p>
                        <?php echo $patient_row['Gender']; ?>
                    </p>
                </div>
                <div class="form-row">
                    <p>Address</p>
                    <p>
                        <?php echo $patient_row['Address']; ?>
                    </p>
                </div>
                <div class="form-row">
                    <p>Date of Registration</p>
                    <p>
                        <?php echo $patient_row['Date']; ?>
                    </p>
                </div>
            </div>
    </body>

    </html>
    <?php
} else {
    header('Location: login.php');
}
?>