<?php
session_start();
if (isset($_SESSION['id'])) {
    include('../database/connect.php');
    include('./includes/header.php');
    if (isset($_POST['appointment'])) {
        $pat_id = $_POST['patient_id'];
        $doctor_id = $_POST['doctor_id'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $sql = "INSERT INTO appointment (PatID, DoctorID, Date, Time, Status) VALUES ('" . $pat_id . "', '" . $doctor_id . "', '" . $date . "', '" . $time . "', 'Pending');";
        if (mysqli_query($conn, $sql)) {
            header('Location: appointment-view.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>


    <body>
        <?php
        include('./includes/navbar.php');
        ?>
        <div class="container">
            <h2 style="font-weight: 700; color: #FF8E8E;">Appointment Form</h2>
            <form action="" class="d-form" method="POST">
                <div class="form-row">
                    <label for="patient_id" class="form-label">Patient</label>
                    <select name="patient_id" id="patient_id" class="form-select">
                        <option value="" selected disabled>Select Patient</option>
                        <?php
                            $patient_sql = "SELECT * FROM patient";
                            $patient_result = mysqli_query($conn, $patient_sql);
                            while ($patient_row = mysqli_fetch_assoc($patient_result)) {
                        ?>
                        <option value="<?php echo $patient_row['PatID'] ?>"><?php echo $patient_row['PatID'] ?> | <?php echo $patient_row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="doctor_id" class="form-label">Doctor</label>
                    <select name="doctor_id" id="doctor_id" class="form-select">
                        <option value="" selected disabled>Select Doctor</option>
                        <?php
                            $doctor_sql = "SELECT * FROM doctor";
                            $doctor_result = mysqli_query($conn, $doctor_sql);
                            while ($doctor_row = mysqli_fetch_assoc($doctor_result)) {
                        ?>
                        <option value="<?php echo $doctor_row['DoctorID'] ?>"><?php echo $doctor_row['DoctorID'] ?> | <?php echo $doctor_row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="" class="form-label">Date</label>
                    <input type="date" class="form-input" name="date">
                </div>
                <div class="form-row">
                    <label for="" class="form-label">Time</label>
                    <input type="time" class="form-input" name="time">
                </div>
                <div class="login-form-button">
                    <button class="btn-primary" type="submit" name="appointment">Submit</button>
                </div>
            </form>
        </div>
    </body>

    </html>
    <?php
} else {
    header('Location: login.php');
}
?>