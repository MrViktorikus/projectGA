<?php
session_start();

if (isset($_POST["action"]) == "signout") {
    session_unset();
    session_destroy();
    if (isset($_SESSION["user"]) === NULL) {
        echo "You have logged out. Please come back.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title></title>
    </head>
    <body>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
        <a href="kill.php">Sign Out</a>
        <a href="db.php">Database</a>
        <a href="cart.php">Cart</a><br><br>
        <form method="POST">
            <button type="submit" value="signout" name="action">Sign Out</button>
        </form>
        <?php
        if (isset($_SESSION["user"]) != NULL) {
            echo "Logged in as " . $_SESSION["user"];
//        var_dump($_SESSION);
        } else {
            echo "You are not logged in. Please log in.";
        }
        ?>
        <br><br><br>
        <form method="POST">
            <input type="submit" name="action" value="add">
        </form>
    </body>
</html>
