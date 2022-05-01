<?php
$targetDir = "uploads/images/";
$error = false;
$uzenet = '';
if(isset($_POST["kepfeltoltes"])) {
    $baseFile = basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($baseFile,PATHINFO_EXTENSION));
    $targetFile = $targetDir . time() . '.' . $imageFileType;

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uzenet = "A fájl mérete túl nagy";
        $error = true;
    }
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uzenet = "Csak az alábbi fájl formátumok tölthetőek fel: JPG, JPEG, PNG, GIF";
        $error = true;
    }

    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        $uzenet = "A fájl feltöltése: ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " sikeres volt.";
    }
    
}

$listDirectory = array_diff(scandir($targetDir), ['..', '.']);