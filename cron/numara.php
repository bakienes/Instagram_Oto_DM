<?php
include("../app/config/config2.php");

set_time_limit(0);
date_default_timezone_set('UTC');
require '../data/data/autoload.php';

/////// CONFIG ///////
$debug = false;
$truncatedDebug = false;
//////////////////////
$usernameler = array('404team1','404team2','404team3','404team4','404team7','404otobot','404otobot1');
$is = rand(0,7);
$hesapad = $usernameler[$is];

$hesapsifre = "taner4646"; // PASSWORD
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
//////////////////////
$ig = new \InstagramAPI\Instagram($debug,$truncatedDebug);
try {  $ig->login($hesapad,$hesapsifre); //USERNAME - PASSWORD
	} catch (\Exception $e) {
 $a = $e->getMessage()."\n";
	echo $a;
    exit(0);
}
$sorgu = mysqli_query($con,"SELECT * FROM words WHERE submit='no' LIMIT 1");
try{
	while($sonuc = mysqli_fetch_assoc($sorgu)){
$idsi = $sonuc['id'];
$kelime = $sonuc['word'];
$ara = $ig->discover->search($kelime);
$gb = json_decode($ara,true)['list'];
$sayi = count($gb);
if($sayi<0){
mysqli_query($con,"UPDATE words SET submit='yes' WHERE id='$idsi'");
}else{
for($i=0; $i < $sayi; $i++){
		if ($ids = $gb[$i]['user']['pk']){
		$followers =  $ig->people->getInfoById($ids)->getUser()->getFollowerCount();
		
		if($followers >= 1500 ){ // bu kısmı unutmuyak bu kısım lımıtıdır kac  bın ayarlarsanız o kadar yuksek bulur
	// MİNİMUM TAKİPÇİLİ MAİL TOPLAMA SINIRI 
		  $id = $gb[$i]['user']['pk']; 
		       $username = $gb[$i]['user']['username'];
	             $info = $ig->people->getInfoById($id)->getUser();
				   $zn = json_decode($info,true)['contact_phone_number'];
	       if(!empty($zn) || $zn == " "){
	$sorgumail = mysqli_query($con, "SELECT * FROM numara WHERE no='$zn'");
	$sonucmail = mysqli_fetch_assoc($sorgumail);
	if(!$sonucmail>0){
			mysqli_query($con,"INSERT INTO numara (no,username,submit) VALUES ('$zn','$username','no')");
			echo "";
			}else{
				echo "numara eklenmedi [$zn] <br>";
			}
	}
}else {echo""; }
		
		}
			
		
}
mysqli_query($con,"UPDATE words SET submit='yes' WHERE id='$idsi'");
}
}
} catch (\Exception $e) {
    $a = $e->getMessage()."\n";
	echo $a;
    exit(0);
}
?>