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
            <h2>Appointment</h2>
            <div class="table">
                <div class="table-head">
                    <b style="width: 40%; text-align: center;">Doctor Name</b>
                    <b style="width: 20%; text-align: center;">Date</b>
                    <b style="width: 20%; text-align: center;">Time</b>
                    <b style="width: 20%; text-align: center;">Status</b>
                </div>
                <?php
                $pat_id = $_SESSION['id'];
                $sql = "SELECT * FROM appointment WHERE PatID = '" . $pat_id . "'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="table-row">
                        <p style="width: 40%; text-align: center;">
                            <?php
                            $doctor_id = $row['DoctorID'];
                            $doctor_sql = "SELECT * FROM doctor WHERE DoctorID = '" . $doctor_id . "'";
                            $doctor_result = mysqli_query($conn, $doctor_sql);
                            $doctor_row = mysqli_fetch_assoc($doctor_result);
                            echo $doctor_row['Name'];
                            ?>
                        </p>
                        <p style="width: 20%; text-align: center;">
                            <?php echo $row['Date'] ?>
                        </p>
                        <p style="width: 20%; text-align: center;">
                            <?php echo substr($row['Time'], 0, 5) ?>
                        </p>
                        <p style="width: 20%; text-align: center;">
                            <?php echo $row['Status'] ?>
                        </p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    header('Location: login.php');
}
?>