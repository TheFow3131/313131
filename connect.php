<?php

#BASKA SAYFALARDAN BAGLANTI YAPMANIZA GEREK YOKTUR SADECE BU DOSYADAN YAPMANIZ YETERLIDIR.
#ICQ @r3yd3r - DANIEL PANEL

$servername = "localhost";
$username   = "paparausr";
$password   = "";
$dbname     = "paparadb";

try {
     $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
    }
catch(PDOException $e)
    {
     echo "Connection failed: " . $e->getMessage();
    }

?>