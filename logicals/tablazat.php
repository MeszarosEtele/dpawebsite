<?php
try {
    $tablazatData = [];
    $dbh = new PDO('mysql:host=localhost;dbname=' . $dbConnect['dbName'], $dbConnect['dbUser'], $dbConnect['dbPass'],
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    $sqlSelect = "select azonosito, nev, email, uzenet, idobelyeg from uzenetek order by idobelyeg desc";
    $sth = $dbh->prepare($sqlSelect);
    $sth->execute();

    $tablazatData = $sth->fetchAll();
} catch (PDOException $e) {
    $error = true;
    $uzenet = "Hiba: ".$e->getMessage();
}