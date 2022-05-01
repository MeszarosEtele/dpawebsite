<?php
$oldalak = array(
	'/' => array('fajl' => 'cimlap', 'szoveg' => 'Címlap', 'menun' => array(1,1)),
    'galeria' => array('fajl' => 'galeria', 'szoveg' => 'Galéria', 'menun' => array(1,1)),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'tablazat' => array('fajl' => 'tablazat', 'szoveg' => 'Táblázat', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
);
$meta = array(
    'title' => 'DPA',
);
$footer = array(
    'title' => 'Drogprevenciós Alapítvány',
    'phone1' => '+36 20 939 4331',
    'phone2' => '+36 1 306 2584',
    'email' => 'info@dpa.hu',
    'web' => 'www.dpa.hu',
    'webLink' => 'http://drogprevenciosalapitvany.hu'
);
$dbConnect = array(
    'dbName' => 'dpa',
    'dbUser' => 'root',
    'dbPass' => ''
)
?>