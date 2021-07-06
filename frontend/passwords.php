<?php


?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<?php
$link = mysqli_connect('127.0.0.1', 'root', '', 'passwordsafe');

$sql = "SELECT * from password;";

$passwords = $link->query($sql);
while($row = $passwords->fetch_assoc()) {
    echo " Password Name: " . $row["password_title"]. " Passwort" . $row["password_password"];
  }

?>

</body>