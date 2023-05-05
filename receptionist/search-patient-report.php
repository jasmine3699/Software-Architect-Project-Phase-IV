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
            <form class="d-form">
                <div class="form-row" style="justify-content: center; margin-bottom: 30px;">
                    <input type="search" class="form-input" onkeyup="searchByName()" id="search"
                        placeholder="Search By Patient Name...">
                </div>
            </form>
            <div class="table">
                <div id="table_head" class="table-head">
                    <b style="width: 5%; text-align: center;">Sr#</b>
                    <b style="width: 20%; text-align: center;">Patient Name</b>
                    <b style="width: 20%; text-align: center;">Doctor Name</b>
                    <b style="width: 7%; text-align: center;">Age</b>
                    <b style="width: 8%; text-align: center;">Gender</b>
                    <b style="width: 20%; text-align: center;">Address</b>
                    <b style="width: 10%; text-align: center;">Date Time</b>
                    <b style="width: 10%; text-align: center;">View Report</b>
                </div>
                <div id="table" class="table">
                    <?php
                    $sql = "SELECT * FROM appointment";
                    $result = mysqli_query($conn, $sql);
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div name="patient" class="table-row">
                            <p style="width: 5%; text-align: center;">
                                <?php echo $counter ?>
                            </p>
                            <p name="patient-name" style="width: 20%; text-align: center;">
                                <?php
                                $patient_id = $row['PatID'];
                                $p_sql = "SELECT * FROM patient WHERE PatID = '" . $patient_id . "'";
                                $p_result = mysqli_query($conn, $p_sql);
                                $p_row = mysqli_fetch_assoc($p_result);
                                echo $p_row['Name'];
                                ?>
                            </p>
                            <p style="width: 20%; text-align: center;">
                                <?php
                                $doctor_id = $row['DoctorID'];
                                $d_sql = "SELECT * FROM doctor WHERE DoctorID = '" . $doctor_id . "'";
                                $d_result = mysqli_query($conn, $d_sql);
                                $d_row = mysqli_fetch_assoc($d_result);
                                echo $d_row['Name'];
                                ?>
                            </p>
                            <p style="width: 7%; text-align: center;">
                                <?php echo $p_row['Age'] ?>
                            </p>
                            <p style="width: 8%; text-align: center;">
                                <?php echo $p_row['Gender'] ?>
                            </p>
                            <p style="width: 20%; text-align: center;">
                                <?php echo $p_row['Address'] ?>
                            </p>
                            <p style="width: 10%; text-align: center;">
                                <?php echo $row['Date'] . " " . substr($row['Time'], 0, 5) ?>
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
        <script>
            function searchByName() {
                var search, filter, patients, patient, i, txtValue;
                search = document.getElementById("search");
                filter = search.value.toUpperCase();
                patients = document.getElementById("table");
                patient = patients.getElementsByTagName("div");
                for (i = 0; i < patient.length; i++) {
                    p = patient[i].getElementsByTagName("p")[2];
                    txtValue = p.textContent || p.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        patient[i].style.display = "";
                    } else {
                        patient[i].style.display = "none";
                    }
                }
            }
        </script>
    </body>

    </html>
    <?php
} else {
    header('Location: login.php');
}
?>