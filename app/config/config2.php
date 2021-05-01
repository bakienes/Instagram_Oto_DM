<?php

/**
 *sky config 
 */
 $dbHost = 'localhost';

    // MySQL ADINIZI DB AD GIBI GECER
 $dbUsername = 'sky';

    // MySQL ŞİFRE
 $dbPassword = 'sky';

    // MySQL Veritabanı Adı
 $dbName = 'sky'; //BEN GENELDE IKISINI AYNI YAPARIM  UNUTMAYAYIM DIYE
$con = mysqli_connect("$dbHost","$dbUsername","$dbPassword","$dbName");
mysqli_set_charset($con, "utf8");

?>
