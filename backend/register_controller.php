
<?php
//GET FORMDATA
$unhashedPW = $_POST['user-password'];
$username = $_POST['user-username'];


function hashPassword($pw, $username){
    $hashedPW = password_hash($pw, PASSWORD_BCRYPT);
    saveToDB($username, $hashedPW);   
}

hashPassword($unhashedPW, $username);


function saveToDB($usr, $pass){
    $link = mysqli_connect('127.0.0.1', 'root', '', 'passwordsafe');
    if (!$link) {
        die('Verbindung schlug fehl: ' . mysqli_error());
    }
    echo 'Erfolgreich verbunden';
    
    $sql = "INSERT INTO users (username, password)
    VALUES ('$usr', '$pass')";

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $link->error;
  }
}

  

?>

