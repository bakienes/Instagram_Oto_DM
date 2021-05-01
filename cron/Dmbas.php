<?php
$rand2 = rand(0,1); 
$yazı = array('Sky Türk Oto Smm Panel Test'); 
$sayi = 1; 

set_time_limit(0);
date_default_timezone_set('UTC');
require '../data/data/autoload.php'; 
include("../app/config/config2.php");
//////////////////////
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
/////// CONFIG ///////
$username = "eflin7171"; // username 
$password = "gamze6666"; // pw
///////////////////////////////
$debug = false; 
$truncatedDebug = false;
///////////////////////////////
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
/////////////////////////////////
try {
    $ig->login($username, $password); //Giriş işlemi.
} catch (\Exception $e) {
    echo 'Giriş Yapılmadı: '.$e->getMessage()."\n";
}
try {
$sorgu = mysqli_query($con,"SELECT * FROM otodm WHERE submit='no' LIMIT 55");
while($sonuc = mysqli_fetch_assoc($sorgu)){
$id = $sonuc['id'];
$nick = $sonuc['username'];
$userid = $sonuc['userid'];
$cevir = rand(000000,999999);
for($i=0; $i < $sayi; $i++){ 
$ig->direct->sendText(['users' => ["$userid"]], $yazı[$rand2]);
mysqli_query($con,"UPDATE otodm SET submit='yes' WHERE id='".$sonuc['id']."'");
}
}
} catch (\Exception $e) {
    echo 'Yöneticye Başvur: '.$e->getMessage()."\n";
} 