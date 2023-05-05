<?php
session_start();
if (isset($_SESSION['id'])) {
    include('../database/connect.php');
    include('./includes/header.php');
    if (isset($_POST['cancel'])) {
        $pat_id = $_POST['patient_id'];
        $update_sql = "UPDATE appointment SET Status = 'Cancel' WHERE PatID = '" . $pat_id . "'";
        $result = mysqli_query($conn, $update_sql);
    }
    ?>

    <body>
        <?php
        include('./includes/navbar.php');
        ?>
    <div class="container">
        <h2 style="font-weight: 500">Welcome <?php echo $_SESSION['name'] ?></h2>
        <p>Today's Appointments</p>
        <div class="table">
            <div class="table-head">
                <b style="width: 10%; text-align: center;">Sr#</b>
                <b style="width: 10%; text-align: center;">Patient ID</b>
                <b style="width: 30%; text-align: center;">Patient Name</b>
                <b style="width: 20%; text-align: center;">Date Time</b>
                <b style="width: 15%; text-align: center;">Prescribe</b>
                <b style="width: 15%; text-align: center;">Cancel</b>
            </div>
            <?php
                $today = date('Y-m-d');
                $sql = "SELECT * FROM appointment WHERE Date = '" . $today . "' ORDER BY Date ASC";
                $result = mysqli_query($conn, $sql);
                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="table-row">
                        <p style="width: 10%; text-align: center;">
                            <?php echo $counter ?>
                        </p>
                        <p style="width: 10%; text-align: center;">
                            <?php
                            $pat_id = $row['PatID'];
                            echo $pat_id;
                            $patient_sql = "SELECT * FROM patient WHERE PatID = '" . $pat_id . "'";
                            $patient_result = mysqli_query($conn, $patient_sql);
                            $patient_row = mysqli_fetch_assoc($patient_result);
                            $patient_name = $patient_row['Name'];
                            $patient_id = $patient_row['PatID'];
                            ?>
                        </p>
                        <p style="width: 30%; text-align: center;">
                            <?php echo $patient_name ?>
                        </p>
                        <p style="width: 20%; text-align: center;">
                            <?php echo $row['Date'] . substr($row['Time'], 0, 5) ?>
                        </p>
                        <form action="prescription-form.php" method="POST" style="width: 15%; text-align: center;">
                            <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
                            <input type="hidden" name="apt_id" value="<?php echo $row['AptID']; ?>">
                            <?php
                            $prescribe = true;
                            if ($row['Status'] == 'Cancelled' || $row['Status'] == 'Done') {
                                $prescribe = false;
                            }
                            if ($row['Status'] == "Done") {
                                echo 'Prescribed';
                            } else {
                                ?>
                                <button type="submit" name="prescribe"
                                    class="<?php echo ($prescribe) ? 'btn-success' : 'btn-disabled'; ?>" <?php echo ($prescribe) ? '' : 'disabled'; ?>>Prescribe</button>
                                <?php
                            }
                            ?>
                        </form>

                        <form action="" method="POST" style="width: 15%; text-align: center;">
                            <?php
                            if ($row['Status'] == "Cancelled") {
                                echo "Cancelled";
                            } else {
                                ?>
                                <input type="hidden" name="apt_id" value="<?php echo $row['AptID']; ?>">
                                <button type="submit" name="cancel"
                                    class="<?php echo ($prescribe) ? 'btn-danger' : 'btn-disabled'; ?>" <?php echo ($prescribe) ? '' : 'disabled'; ?>>Cancel</button>
                                <?php
                            }
                            ?>
                        </form>
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