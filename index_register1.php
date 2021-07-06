<!DOCTYPE HTML>
<html>
    <head>
    </head>
    <body>
    <h1>Registrieren</h1>
    <div class="form-section">
        <form action="./backend/register_controller.php" method="POST" >
            <div>
                <label for="user-username">
                    Benutzername
                </label>
                <input type="text" name="user-username">
            </div>
            <div>
                <label for="user-password">
                    Passwort
                </label>
                <input type="password" name="user-password">
            </div>
            <div>
                <input type="submit">
            </div>
        </form>
        
    </div>
    </body>
</html>

<?php 
phpinfo();

?>