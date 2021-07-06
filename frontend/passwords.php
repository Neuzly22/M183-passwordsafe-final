<?php


?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<style>
span{
    border: 1px solid black;
    text-align: center;
}
</style>
<body>
<h1>Übersicht</h1>
<br>
<h2>Deine Passwörter</h2>
<?php
$link = mysqli_connect('127.0.0.1', 'root', '', 'passwordsafe');

$sql = "SELECT * from password;";

$passwords = $link->query($sql);
while($row = $passwords->fetch_assoc()) {
    ?>
        <div>
            <span>
                Titel: <?= $row["password_title"]?>
            </span>
            <span>
                Notizen: <?=  $row["password_notes"]?>
            </span>
            <span>
                Passwort: <?= $row["password_password"]?>
            </span>
        </div>
    <?php
  }

?>
<h2>Neues Passwort erstellen</h2>
<form method="POST">
  <label for="password-title">
  Titel
  <input type="text" name="password-title">
  </label>
  <label for="password-password">
    Passwort
    <input type="password" name="password-password">
</label>
<label for="password-notes">
Notizen:
<textarea name="password-notes">
</textarea>
</label>
<input type="submit" value="Erstellen" onclick="">
</form>

</body>
