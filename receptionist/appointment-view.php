<?php
session_start();
if (isset($_SESSION['id'])) {
    include('../database/connect.php');
    include('./includes/header.php');
    ?>

    <body>
        <?php
        include('./includes/navbar.php');
        ?>
        <div class="container">
            <a class="btn-primary" style="position: absolute; left: 8%; top: 120px;" href="appointment-form.php">New
                Appointment</a>
            <h2>Appointments</h2>
            <div class="table">
                <div class="table-head">
                    <b style="width: 10%; text-align: center;">Sr#</b>
                    <b style="width: 10%; text-align: center;">Patient ID</b>
                    <b style="width: 30%; text-align: center;">Patient Name</b>
                    <b style="width: 30%; text-align: center;">Doctor Name</b>
                    <b style="width: 10%; text-align: center;">Date</b>
                    <b style="width: 10%; text-align: center;">Time</b>
                </div>
                <?php
                $sql = "SELECT * FROM appointment ORDER BY Date ASC";
                $result = mysqli_query($conn, $sql);
                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="table-row">
                        <p style="width: 10%; text-align: center;">
                            <?php echo $counter ?>
                        </p>
                        <p style="width: 10%; text-align: center;"><?php 
                            $pat_id = $row['PatID'];
                            echo $pat_id;
                            $patient_sql = "SELECT * FROM patient WHERE PatID = '" . $pat_id . "'";
                            $patient_result = mysqli_query($conn, $patient_sql);
                            $patient_row = mysqli_fetch_assoc($patient_result);
                            $patient_name = $patient_row['Name'];
                            ?></p>
                        <p style="width: 30%; text-align: center;"><?php echo $patient_name ?></p>
                        <p style="width: 30%; text-align: center;"><?php
                            $doctor_sql = "SELECT * FROM doctor WHERE DoctorID = '" . $row['DoctorID'] . "'";
                            $doctor_result = mysqli_query($conn, $doctor_sql);
                            $doctor_row = mysqli_fetch_assoc($doctor_result);
                            echo $doctor_row['Name'];
                        ?></p>
                        <p style="width: 10%; text-align: center;"><?php echo $row['Date'] ?></p>
                        <p style="width: 10%; text-align: center;"><?php echo substr($row['Time'], 0, 5) ?></p>
                    </div>
                    <?php
                    $counter++;
                } ?>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    header('Location: login.php');
}
?>