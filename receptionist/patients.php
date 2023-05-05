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
            <h2>Patients</h2>
            <div class="table">
                <div class="table-head">
                    <b style="width: 10%; text-align: center;">Sr#</b>
                    <b style="width: 10%; text-align: center;">Patient ID</b>
                    <b style="width: 20%; text-align: center;">Patient Name</b>
                    <b style="width: 10%; text-align: center;">Age</b>
                    <b style="width: 10%; text-align: center;">Gender</b>
                    <b style="width: 20%; text-align: center;">Address</b>
                    <b style="width: 10%; text-align: center;">Date</b>
                    <b style="width: 10%; text-align: center;">View</b>
                </div>
                <?php
                $sql = "SELECT * FROM patient ORDER BY Date ASC";
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
                            $patient_id = $row['PatID'];
                            echo $patient_id; ?>
                        </p>
                        <p style="width: 20%; text-align: center;">
                            <?php echo $row['Name'] ?>
                        </p>
                        <p style="width: 10%; text-align: center;">
                            <?php echo $row['Age'] ?>
                        </p>
                        <p style="width: 10%; text-align: center;">
                            <?php echo $row['Gender'] ?>
                        </p>
                        <p style="width: 20%; text-align: center;">
                            <?php echo $row['Address'] ?>
                        </p>
                        <p style="width: 10%; text-align: center;">
                            <?php echo $row['Date'] ?>
                        </p>
                        <form style="width: 10%; text-align: center;" action="patient-details.php" method="post">
                            <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
                            <button type="submit" name="view-patient-details" class="btn-success">View</button>
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