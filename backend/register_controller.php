
<?php
//GET FORMDATA
$unhashedPW = $_POST['user-password'];
$username = $_POST['user-username'];


function hashPassword($pw){
    return password_hash($pw, PASSWORD_BCRYPT);
}



function saveToDB($usr, $pass){
    $link = mysqli_connect('127.0.0.1', 'root', '');
    if (!$link) {
        die('Verbindung schlug fehl: ' . mysqli_error());
    }
    echo 'Erfolgreich verbunden';
    
    $sql = "INSERT INTO  'passwordsafe' 'users' ('username', 'password')
    VALUES ($usr, hashPassword($pass))";
}

saveToDB($username, $unhashedPW);     

?>

