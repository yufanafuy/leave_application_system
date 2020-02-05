<?php
$hashedpassword = hash('sha512', $_POST["password"]);

$conn = mysqli_connect("localhost", "root", "", "leave_application_system") or die("Could not connect to database");

$sql = "SELECT password FROM login WHERE staff_id=$_POST[id]";
$result = mysqli_query($conn, $sql);
$registered_password = mysqli_fetch_array($result);

$sql = "SELECT authority FROM login WHERE staff_id=$_POST[id]";
$result = mysqli_query($conn, $sql);
$authority = mysqli_fetch_array($result);


if($hashedpassword == $registered_password[0] && $authority[0] == '0')
{
  $conn->close();
  $cookie_value = "$_POST[id]";
  setcookie("staff_id", $cookie_value, time() + (86400), "/", "las.localhost");
  setcookie("authority", "0", time() + (86400), "/", "las.localhost");
  print "Successfully logged in. Redirecting ...... ";
  header("refresh:2; url=user_main.html");
}
else if($hashedpassword == $registered_password[0] && $authority[0] == '1')
{
  $conn->close();
  $cookie_value = "$_POST[id]";
  setcookie("staff_id", $cookie_value, time() + (86400), "/", "las.localhost");
  setcookie("authority", "1", time() + (86400), "/", "las.localhost");
  print "Successfully logged in. Redirecting ...... ";
  header("refresh:2; url=authority_main.html");
}
else
{
  $conn->close();
  print "Incorrect password! Please try again.";
  header("refresh:2; url=index.html");
}
?>
