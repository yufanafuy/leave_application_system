<?php
  setcookie("staff_id", "", time()-3600, "las.localhost");
  setcookie("authority", "", time()-3600, "/", "las.localhost");
  echo "Logged out. Redirecting...";
  header("refresh:1; url=index.html");
?>
