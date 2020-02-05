<?php

$conn = mysqli_connect("localhost", "root", "", "leave_application_system") or die("Could not connect to database");

//print $staff_id . " " . $dateOfApplication . " " . $startDate . " " . $endDate . " " . $duration . " " . $reason . " ". $leave_type;
$staff_id = $_COOKIE["staff_id"];
$dateOfApplication = date("Y-m-d");
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$duration = $_POST["duration"];
$leave_type = $_POST["leave_type"];

$sql = $conn->prepare("INSERT INTO leave_application (staff_id, dateOfApplication, startDate, endDate, duration, reason, leave_code)
VALUES ('$staff_id', '$dateOfApplication', '$startDate', '$endDate', '$duration', ?, '$leave_type')");
$sql->bind_param("s", $reason);

$reason = $_POST["reason"];


if ($sql->execute())
{
    print "Leave application submited.";
    $conn->close();
    header("refresh:2; url=user_main.html");
}
else
{
    print "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
}
?>
