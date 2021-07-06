<?php
if($_POST['password-password']){
    $unencryptedPW = $_POST['password-password'];
    $ciphering = "AES-128-CTR";
  
    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
      
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';
      
    // Store the encryption key
    $encryption_key = "Modul183Modul183";
      
    // Use openssl_encrypt() function to encrypt the data
    $encryption = openssl_encrypt($unencryptedPW, $ciphering,
    $encryption_key, $options, $encryption_iv);

    $link1 = mysqli_connect('127.0.0.1', 'root', '', 'passwordsafe');
   
    
    $sqlPW = "INSERT INTO password (password_title, password_password, password_notes)
    VALUES ('$_POST["password-title"]', '$_POST["password-password"]', '$_POST["password-notes"]');
    $link1->query($sqlPW)
}


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
<input type="submit" value="Erstellen">
</form>

</body>
