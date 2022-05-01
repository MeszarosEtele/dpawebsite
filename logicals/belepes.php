<?php
    if (isset($_POST['belepes'])) {
        if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
            try {
                $error = false;
                $dbh = new PDO('mysql:host=localhost;dbname=' . $dbConnect['dbName'], $dbConnect['dbUser'], $dbConnect['dbPass'],
                                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
                
                $sqlSelect = "select azonosito, vezeteknev, keresztnev from felhasznalok where felhasznalonev = :felhasznalonev and jelszo = sha1(:jelszo)";
                $sth = $dbh->prepare($sqlSelect);
                $sth->execute(array(':felhasznalonev' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
                if($row) {
                    $_SESSION['userSession'] = $row; 
                    $_SESSION['un'] = $row['uto_nev']; 
                    $_SESSION['login'] = $_POST['felhasznalo'];
                    header("Location: .");
                } else {
                    $uzenet = "Nincs ilyen felhasználó";
                    $error = true;
                }
            }
            catch (PDOException $e) {
                $uzenet = "Hiba: ".$e->getMessage();
                $error = true;
            }      
        } else {
            $uzenet = "Minden mező kitöltése kötelező";
            $error = true;
        }
    }
    if (isset($_POST['regisztral'])) {
        if ($_POST) {
            $success = false;
            $error = false;
            $hibaArray = [];
            if (!preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/", $_POST['email'])) {
                $error = true;
                $hibaArray[] = "Nem megfelelő az email cím formátuma";
            }
            if (strlen($_POST['felhasznalonev']) < 4) {
                $error = true;
                $hibaArray[] = "A felhasználónévnek legalább 4 karakternek kell lennie";
            }
            if (strlen($_POST['vezeteknev']) < 5) {
                $error = true;
                $hibaArray[] = "A vezetéknévnek legalább 5 karakternek kell lennie";
            }
            if (strlen($_POST['keresztnev']) < 5) {
                $error = true;
                $hibaArray[] = "A keresztnévnek legalább 5 karakternek kell lennie";
            }
            if (strlen($_POST['jelszo']) < 5) {
                $error = true;
                $hibaArray[] = "A jelszónak legalább 5 karakternek kell lennie";
            }
            if (count($hibaArray) > 0) {
                foreach ($hibaArray as $hiba) {
                    $uzenet .= $hiba . "<br>";
                }
            } else {
                try {
                    // Kapcsolódás
                    $dbh = new PDO('mysql:host=localhost;dbname=' . $dbConnect['dbName'], $dbConnect['dbUser'], $dbConnect['dbPass'],
                                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
                    
                    // Létezik már a felhasználói név?
                    $sqlSelect = "select azonosito from felhasznalok where felhasznalonev = :felhasznalonev";
                    $sth = $dbh->prepare($sqlSelect);
                    $sth->execute(array(':felhasznalonev' => $_POST['felhasznalonev']));
                    if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        $uzenet = "A felhasználói név már foglalt!";
                        $ujra = "true";
                        $error = true;
                    }
                    else {
                        // Ha nem létezik, akkor regisztráljuk
                        $sqlInsert = "insert into felhasznalok(azonosito, vezeteknev, keresztnev, felhasznalonev, email, jelszo)
                                    values(0, :vezeteknev, :keresztnev, :felhasznalonev, :email, :jelszo)";
                        $stmt = $dbh->prepare($sqlInsert); 
                        $stmt->execute(array(':vezeteknev' => $_POST['vezeteknev'], ':keresztnev' => $_POST['keresztnev'],
                                            ':felhasznalonev' => $_POST['felhasznalonev'], ':email' => $_POST['email'], ':jelszo' => sha1($_POST['jelszo']))); 
                        if($count = $stmt->rowCount()) {
                            $newid = $dbh->lastInsertId();
                            $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";                     
                            $ujra = false;
                            $error = false;

                        }
                        else {
                            $uzenet = "A regisztráció nem sikerült.";
                            $ujra = true;
                            $error = true;
                        }
                    }
                }
                catch (PDOException $e) {
                    $uzenet = "Hiba: ".$e->getMessage();
                    $ujra = true;
                    $error = true;
                }
            }
        }
    }