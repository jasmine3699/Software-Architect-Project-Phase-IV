<?php
session_start();
if (isset($_SESSION['id'])) {
    include('../database/connect.php');
    include('./includes/header.php');
    if (isset($_POST['view-patient-details'])) {
        $pat_id = $_POST['patient_id'];
        $patient_sql = "SELECT * FROM patient WHERE PatID = '" . $pat_id . "'";
        $patient_result = mysqli_query($conn, $patient_sql);
        $patient_row = mysqli_fetch_assoc($patient_result);
        $patient_name = $patient_row['Name'];
        ?>


        <body>
            <?php
            include('./includes/navbar.php');
            ?>
            <div class="container">
                <h2 style="font-weight: 700">Patient</h2>
                <div class="d-form">
                    <div class="form-row">
                        <p>Patient ID</p>
                        <p><?php echo $pat_id; ?></p>
                    </div>
                    <div class="form-row">
                        <p>Patient Name</p>
                        <p><?php echo $patient_row['Name']; ?></p>
                    </div>
                    <div class="form-row">
                        <p>Age</p>
                        <p><?php echo $patient_row['Age']; ?></p>
                    </div>
                    <div class="form-row">
                        <p>Gender</p>
                        <p><?php echo $patient_row['Gender']; ?></p>
                    </div>
                    <div class="form-row">
                        <p>Address</p>
                        <p><?php echo $patient_row['Address']; ?></p>
                    </div>
                    <div class="form-row">
                        <p>Date</p>
                        <p><?php echo $patient_row['Date']; ?></p>
                    </div>
                </div>
            </div>
        </body>

        </html>
        <?php
    }
} else {
    header('Location: login.php');
}
?>