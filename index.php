<?php
session_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

//om tömma
if (isset($_GET["empty"])) {
    session_destroy();
    header("Location: ?");
    exit();
}


//kolla om ta bort enskild rad ur vagnen
if (isset($_GET["action"]) and $_GET["action"] == "delete") {
    //loopa igenom värdena
    for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
        //kolla om ID:t ska tas bort
        if ($_SESSION["cart"][$i]["id"] == $_GET["id"]) {
            //radera ett index ur en array
            array_splice($_SESSION["cart"], $i, 1);
            //avbryt loopen
            break;
        }
    }
    //ladda om sidan och visa kundvagn
    header("Location: ?cart");
    exit();
}

//kolla om vi ska uppdatera en rad ur vagnen
//denna del skulle kunna ingå i ovanstående
if (isset($_GET["action"]) and $_GET["action"] == "update") {
    //loopa igenom sessionsvariabeln
    for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
        if ($_SESSION["cart"][$i]["id"] == $_GET["id"]) {
            $_SESSION["cart"][$i]["antal"] = $_GET["antal"];
            break;
        }
    }
    //ladda om sidan och visa kundvagnen
    header("Location: ?");
    exit();
}


//kolla om vi fått nya grejer i vagnen och lägg dem där annars
if (isset($_GET["action"]) and $_GET["action"] == "buy") {

    $laggTill = true;

    //loopa igenom kundvagnen för att kolla om varan man lägger till redan finns
    //här kan jag inte göra en foreach eftersom jag behöver kunna skriva der uppdaterade antalet tillbaka till sessionen
    for ($i = 0; $i < count($_SESSION["vagn"]); $i++) {
        //foreach ($_SESSION["vagn"] as $pryl) {
        //kolla om varan redan finns
        if ($_SESSION["vagn"][$i]["id"]) {
            
        }
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
        <a href="kill.php">Kill</a>
        <a href="db.php">Database</a><br><br>
        <?php
        
        var_dump($_SESSION);
        ?>
    </body>
</html>