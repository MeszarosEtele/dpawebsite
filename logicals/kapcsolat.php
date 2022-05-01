<?php
$success = false;
$uzenet = '';
if ($_POST) {
    $error = false;
    $hibaArray = [];
    if (!preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/", $_POST['email'])) {
        $error = true;
        $hibaArray[] = "Nem megfelelő az email cím formátuma";
    }
    if (strlen($_POST['uzenet']) < 5) {
        $error = true;
        $hibaArray[] = "Az üzenetnek legalább 5 karakternek kell lennie";
    }

    if (count($hibaArray) > 0) {
        foreach ($hibaArray as $hiba) {
            $uzenet .= $hiba . "<br>";
        }
    } else {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=' . $dbConnect['dbName'], $dbConnect['dbUser'], $dbConnect['dbPass'],
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            $sqlInsert = "insert into uzenetek(nev, email, uzenet)
                          values(:nev, :email, :uzenet)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':nev' => $_SESSION['login'] ? $_SESSION['login'] : 'Vendég' , ':email' => $_POST['email'],
                                 ':uzenet' => $_POST['uzenet'])); 
            if($count = $stmt->rowCount()) {
                $uzenet = "A kapcsolatfelvételi űrlap elküldése sikeres.";
                $ujra = false;
                $error = false;
                $success = true;
            }
            else {
                $uzenet = "A kapcsolatfelvételi űrlap elküldése nem sikerült.";
                $ujra = true;
                $error = true;
            }
        } catch (PDOException $e) {
            // Error logger
            $uzenet = "Hiba: ".$e->getMessage();
            $ujra = true;
            $error = true;
        }
    }
}


?>