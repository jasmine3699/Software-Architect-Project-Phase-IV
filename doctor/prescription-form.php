<?php
session_start();
if (isset($_SESSION['id'])) {
    include('../database/connect.php');
    include('./includes/header.php');
    if(isset($_POST['prescribe'])){
        $patient_id = $_POST['patient_id'];
        $apt_id = $_POST['apt_id'];
        $patient_sql = "SELECT * FROM patient WHERE PatID = '" . $patient_id . "'";
        $patient_result = mysqli_query($conn, $patient_sql);
        $patient_row = mysqli_fetch_assoc($patient_result);
    ?>

    <body>
        <?php
        include('./includes/navbar.php');
        ?>
        <div class="container">
            <h2 style="font-weight: 700">Prescription Form</h2>
            <form action="prescribe.php" method="post" class="d-form">
                <div class="form-row">
                    <label for="" class="form-label">Patient Name</label>
                    <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
                    <input type="hidden" name="apt_id" value="<?php echo $apt_id; ?>">
                    <input type="text" class="form-input" disabled value="<?php echo $patient_row['Name'] ?>" name="patient-name">
                </div>
                <div class="form-row">
                    <label for="" class="form-label">Blood Group</label>
                    <select name="blood-group" id="blood-group" class="form-select">
                        <option value="" selected disabled>Select Blood Group</option>
                        <option value="A-">A-</option>
                        <option value="A+">A+</option>
                        <option value="B-">B-</option>
                        <option value="B+">B+</option>
                        <option value="AB-">AB-</option>
                        <option value="AB+">AB+</option>
                        <option value="O-">O-</option>
                        <option value="O+">O+</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="" class="form-label">Temperature</label>
                    <input type="number" class="form-input" name="temperature">
                </div>
                <div class="form-row">
                    <label for="" class="form-label">Sugar</label>
                    <input type="number" class="form-input" name="sugar">
                </div>
                <div class="form-row">
                    <label for="" class="form-label">Blood Pressure</label>
                    <input type="numbere" name="blood-pressure" class="form-input">
                </div>
                <div class="form-row">
                    <label for="" class="form-label">Prescription</label>
                    <textarea type="text" class="form-input" rows="5" name="prescription"></textarea>
                </div>
                <div class="login-form-button">
                    <button class="btn-secondary" type="submit" name="prescribe">Submit</button>
                </div>
            </form>
        </div>
    </body>

    </html>
    <?php
    }else{
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}
?>