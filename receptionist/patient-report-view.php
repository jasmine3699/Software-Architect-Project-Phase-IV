<?php
session_start();
if (isset($_SESSION['id'])) {
    include('../database/connect.php');
    include('./includes/header.php');
    if (isset($_POST['report'])) {
        $pat_id = $_POST['patient_id'];

        $patient_sql = "SELECT * FROM patient WHERE PatID = '" . $pat_id . "'";
        $patient_result = mysqli_query($conn, $patient_sql);
        $patient_row = mysqli_fetch_assoc($patient_result);

        $report_sql = "SELECT * FROM report WHERE PatID = '" . $pat_id . "'";
        $report_result = mysqli_query($conn, $report_sql);
        $report = false;
        if (mysqli_num_rows($report_result) > 0) {
            $report = true;
            $report_row = mysqli_fetch_assoc($report_result);
        }

        $prescription_sql = "SELECT * FROM prescription WHERE PatID = '" . $pat_id . "'";
        $prescription_result = mysqli_query($conn, $prescription_sql);
        $prescription = false;
        if (mysqli_num_rows($prescription_result) > 0) {
            $prescription = true;
            $prescription_row = mysqli_fetch_assoc($prescription_result);
        }
        ?>

        <body>
            <?php
            include('./includes/navbar.php');
            ?>
            <div class="container">
                <h2 style="font-weight: 700">Report</h2>
                <div class="d-form">
                    <div class="form-row">
                        <p>Patient Name</p>
                        <p>
                            <?php echo $patient_row['Name'];
                            ; ?>
                        </p>
                    </div>
                    <div class="form-row">
                        <p>Date</p>
                        <p>
                            <?php echo $patient_row['Date']; ?>
                        </p>
                    </div>
                    <div class="form-row">
                        <p>Blood Group</p>
                        <p>
                            <?php echo ($report) ? $report_row['BloodGroup'] : '-'; ?>
                        </p>
                    </div>
                    <div class="form-row">
                        <p>Temperature</p>
                        <p>
                            <?php echo ($report) ? $report_row['Temperature'] : '-'; ?>
                        </p>
                    </div>
                    <div class="form-row">
                        <p>Sugar</p>
                        <p>
                            <?php echo ($report) ? $report_row['Sugar'] : '-'; ?>
                        </p>
                    </div>
                    <div class="form-row">
                        <p>Blood Pressure</p>
                        <p>
                            <?php echo ($report) ? $report_row['BloodPressure'] : '-'; ?>
                        </p>
                    </div>
                    <div class="form-row">
                        <p>Prescription</p>
                        <p>
                            <?php echo ($prescription) ? $prescription_row['Prescription'] : '-'; ?>
                        </p>
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