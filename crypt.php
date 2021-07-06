<?php
$link = mysqli_connect('127.0.0.1', 'root', '', 'passwordsafe');
 
$sql = "SELECT * from password;";
$passwords = $link->query($sql);
// Store a string into the variable which
// need to be Encrypted
$simple_string = "Hallo noah";
  
// Display the original string
echo "Original String: " . $simple_string;

// Store the cipher method
$ciphering = "AES-128-CTR";
  
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
  
// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';
  
// Store the encryption key
$encryption_key = "Modul183Modul183";
  
// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($simple_string, $ciphering,
            $encryption_key, $options, $encryption_iv);
  
// Display the encrypted string
echo "Encrypted String: " . $encryption . "\n";
  
// Non-NULL Initialization Vector for decryption
$decryption_iv = '1234567891011121';
  
// Store the decryption key
$decryption_key = "Modul183Modul183";
  
// Use openssl_decrypt() function to decrypt the data
$decryption=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);
  
// Display the decrypted string
echo "Decrypted String: " . $decryption;
  

 

while($row = $passwords->fetch_assoc()) {
    echo " Password Name: " . $row["password_title"]. " Passwort" . $row["password_password"];
  }  
  
?>
<html>
<body>

<p>Click the radio button to toggle between password visibility:</p>

Password: <input type="password" value="<?php echo $descryption; ?>" id="myInput"><br><br>
<input type="checkbox" onclick="myFunction()">Show Password

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>
</html>
