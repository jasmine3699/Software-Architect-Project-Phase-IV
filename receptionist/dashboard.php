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
            <h2 style="font-weight: 500">Welcome <?php echo $_SESSION['name'] ?></h2>
            <p>Doctors</p>
            <div class="table">
                <div class="table-head">
                    <b style="width: 10%; text-align: center;">Sr#</b>
                    <b style="width: 10%; text-align: center;">Doctor ID</b>
                    <b style="width: 60%; text-align: center;">Doctor Name</b>
                    <b style="width: 20%; text-align: center;">Contact</b>
                </div>
                <?php
                $sql = "SELECT * FROM doctor";
                $result = mysqli_query($conn, $sql);
                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="table-row">
                        <p style="width: 10%; text-align: center;">
                            <?php echo $counter ?>
                        </p>
                        <p style="width: 10%; text-align: center;">
                            <?php echo $row['DoctorID'] ?>
                        </p>
                        <p style="width: 60%; text-align: center;">
                            <?php echo $row['Name'] ?>
                        </p>
                        <p style="width: 20%; text-align: center;">
                            <?php echo $row['PhoneNumber'] ?>
                        </p>
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