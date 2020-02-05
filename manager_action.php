<?php
error_reporting(E_ERROR);

$conn = mysqli_connect("localhost", "root", "", "leave_application_system") or die("Could not connect to database");
$submit = "";
if($_POST["submit"] == "Approve")
{
  $submit = "Approved";
}
else
{
  $submit = "Denied";
}
for($i = 1; $i <= 100; $i++)
{
  if ($_POST[$i])
  {
    print $_POST[$i];
    $sql = "UPDATE leave_application SET status='$submit' WHERE refNo='$_POST[$i]'";
    $conn->query($sql);
  }
}
header('Location: authority_view_leave.php');
$conn->close();
?>
