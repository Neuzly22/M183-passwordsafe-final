<?php
require_once "./../config.php";
session_start();
$browserPW = $_SESSION["masterPW"];

$loggeduserid = $_SESSION['id'];

$sql = "SELECT * from password WHERE user_idfs = $loggeduserid";



if($_POST['password-password']){
    $unencryptedPW = $_POST['password-password'];
    $pwTitle = $_POST['password-title'];
    $pwNotes = $_POST['password-notes'];

    $ciphering = "AES-128-CTR";
  
    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
      
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';
      
    // Store the encryption key
    $encryption_key = $browserPW;
      
    // Use openssl_encrypt() function to encrypt the data
    $encryption = openssl_encrypt($unencryptedPW, $ciphering,
    $encryption_key, $options, $encryption_iv);
    

    $link1 = mysqli_connect('127.0.0.1', 'root', '', 'passwordsafe');
   
    
    $sqlPW = "INSERT INTO password (password_title, password_password, password_notes, user_idfs)
    VALUES ('$pwTitle', '$encryption', '$pwNotes', '$loggeduserid')";
    if ($link1->query($sqlPW) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sqlPW . "<br>" . $link1->error;
      }
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

.showPassword::after{
content: "anzeigen";
    
}
</style>
<body>
<h1>Übersicht</h1>
<br>
<h2>Deine Passwörter</h2>
<?php
$userID = $_SESSION["users"];
$link = mysqli_connect('127.0.0.1', 'root', '', 'passwordsafe');


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
            <?php 
  
                // Non-NULL Initialization Vector for decryption
                $decryption_iv = '1234567891011121';
                  
                // Store the decryption key
                $decryption_key = $browserPW;

                $ciphering = "AES-128-CTR";
                  
                // Use openssl_decrypt() function to decrypt the data
                $decryption=openssl_decrypt ($row["password_password"], $ciphering, 
                        $decryption_key, $options, $decryption_iv);
                         
                ?>
                Passwort:
                
                <input type="password" value="<?= $decryption?>" onclick="myFunction(this)" class="showPassword">
                

                
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

<script>
function myFunction(currentElement) {
  var x = currentElement;
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
