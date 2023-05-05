<?php
session_start();
include('../database/connect.php');

if (isset($_POST['prescribe'])) {
    $doctor_id = $_SESSION['id'];
    $patient_id = $_POST['patient_id'];
    $patient_name = $_POST['patient-name'];
    $blood_pressure = $_POST['blood-group'];
    $temperature = $_POST['temperature'];
    $sugar = $_POST['sugar'];
    $blood_pressure = $_POST['blood-pressure'];
    $prescription = $_POST['prescription'];
    $apt_id = $_POST['apt_id'];

    $prescription_sql = "INSERT INTO prescription (PatID, AptID, DoctorID, Prescription) VALUES ('" . $patient_id . "', '" . $apt_id . "', '" . $doctor_id . "', '" . $prescription . "');";
    mysqli_query($conn, $prescription_sql);

    $report_sql = "INSERT INTO report (PatID, AptID, BloodGroup, Temperature, Sugar, BloodPressure) VALUES ('" . $patient_id . "', '" . $apt_id . "', '" . $blood_pressure . "', '" . $temperature . "', '" . $sugar . "', '" . $blood_pressure . "');";
    mysqli_query($conn, $report_sql);

    $update_sql = "UPDATE appointment SET Status = 'Done' WHERE AptID = '" . $apt_id . "'";
    $result = mysqli_query($conn, $update_sql);

    header('Location: appointment-view.php');

} else {
    header('Location: appointment-view.php');
}

?>