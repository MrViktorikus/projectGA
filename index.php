<?php
session_start();

if (isset($_POST["action"]) == "signout") {
    if (isset($_SESSION["user"]) != NULL) {
        session_unset();
        session_destroy();
        $signoutmessage = "You have logged out.";
    } else {
        $signoutmessage = "You are not logged in. Please log in.";
    }
} else {
    $signoutmessage = "You are not logged in. Please log in.";
}

include './style.html';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title></title>
    </head>
    <body>

        <a href="add.php">Lägg till produkt</a>
        <a href="db.php">Database</a>
        <a href="cart.php">Cart</a><br><br>

        <?php
        if (isset($_SESSION["user"]) != NULL) {

            echo "Logged in as " . $_SESSION["user"];
            echo "<form method='POST'>
            <button type='submit' value='signout' name='action'>Sign Out</button>
        </form>";
        } else {
            echo $signoutmessage;
            echo "<br>" . "<a href='login.php'>Login</a>" . "<br>";
            echo "<a href='signup.php'>Sign Up</a>";
        }
        ?>
        <br><br><br>
        <!--<form method="POST">-->
            <!--<input type="submit" name="action" value="add">-->
        <!--</form>-->
    </body>
</html>
