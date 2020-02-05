<?php
$hashedpassword = hash('sha512', $_POST["password"]);

$conn = mysqli_connect("localhost", "root", "", "leave_application_system") or die("Could not connect to database");

$sql = "INSERT INTO login (staff_id, password, email) VALUES ('$_POST[id]', '$hashedpassword', '$_POST[email]')";

if ($conn->query($sql) === TRUE)
{
    print "Successfully registered. You will be redirected back to the login page.";
    $conn->close();
}
else
{
    print "User is already registered! Please proceed to login. ";
    $conn->close();
    //print "Error: " . $sql . "<br>" . $conn->error;
}

header("refresh:3; url=index.html");
?>
