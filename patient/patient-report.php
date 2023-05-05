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
            <div class="table">
                <div id="table_head" class="table-head">
                    <b style="width: 10%; text-align: center;">Sr#</b>
                    <b style="width: 30%; text-align: center;">Doctor Name</b>
                    <b style="width: 20%; text-align: center;">Date</b>
                    <b style="width: 20%; text-align: center;">Time</b>
                    <b style="width: 20%; text-align: center;">View Report</b>
                </div>
                <div id="table" class="table">
                    <?php
                    $sql = "SELECT * FROM appointment";
                    $result = mysqli_query($conn, $sql);
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div name="patient" class="table-row">
                            <p style="width: 7%; text-align: center;">
                                <?php echo $counter ?>
                            </p>
                            <p style="width: 8%; text-align: center;">
                                <?php
                                $doctor_id = $row['DoctorID'];
                                $d_sql = "SELECT * FROM doctor WHERE DoctorID = '" . $doctor_id . "'";
                                $d_result = mysqli_query($conn, $d_sql);
                                $d_row = mysqli_fetch_assoc($d_result);
                                echo $d_row['Name'];
                                ?>
                            </p>
                            <p style="width: 10%; text-align: center;">
                                <?php echo $row['Date'] ?>
                            </p>
                            <p style="width: 10%; text-align: center;">
                                <?php echo substr($row['Time'], 0, 5) ?>
                            </p>
                            <?php
                            if ($row['Status'] == "Cancelled") {
                                ?>
                                <p style="width: 10%; text-align: center;">
                                    Cancelled
                                </p>
                                <?php
                            } else {
                                ?>
                                <form action="patient-report-view.php" style="width: 10%; text-align: center;" method="post">
                                    <input type="hidden" name="patient_id" value="<?php echo $row['PatID']; ?>">
                                    <input type="hidden" name="apt_id" value="<?php echo $row['AptID']; ?>">
                                    <button type="submit" name="report" class="btn-success">View Report</button>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                        $counter++;
                    } ?>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    header('Location: login.php');
}
?>