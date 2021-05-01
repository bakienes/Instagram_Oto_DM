<?php
include("../app/config/config2.php");
set_time_limit(0);
date_default_timezone_set('UTC');
require '../data/data/autoload.php';

/////// CONFIG ///////
$debug = false;
$truncatedDebug = false;
//////////////////////
$usernameler = array('supporthelpteam3','supporthelpteam4','lnstegramhelpcentere','instegramcoppyright','supporthelpteam6','supporthelpteam7','supporthelpteam8',);
$is = rand(0,6);//	NE KADAR KULANICI EKLERSENİZ BUNU ARTIRIN EKLENEN KULLANICI KADR ARTIŞ YAPILACAKTIR.
$hesapad = $usernameler[$is];// USERNAME 

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
$sorgu = mysqli_query($con,"SELECT * FROM words WHERE submit='no' LIMIT 1500");
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
	$mavitik = $gb[$i]['user']['is_verified'];
	$followers =  $gb[$i]['user']['follower_count'];
	if($mavitik){ // Mavi tiki varsa
		$id = $gb[$i]['user']['pk'];
		$username = $gb[$i]['user']['username'];
		$info = $ig->people->getInfoById($id)->getUser();
		$zn = json_decode($info,true)['pk'];
	  if(!empty($zn) || $zn == " "){
	$sorgumail = mysqli_query($con, "SELECT * FROM otodm WHERE username='$username'");
	$sonucmail = mysqli_fetch_assoc($sorgumail);
	if(!$sonucmail>0){
			$z = strpos($zn,"gmail");
			if($z == false){
			mysqli_query($con,"INSERT INTO otodm (username,userid,submit) VALUES ('$username','$zn','no')");
			echo "$username eklendi ";
			}else{
				echo "gmail";
			}
	}
}
}
mysqli_query($con,"UPDATE words SET submit='yes' WHERE id='$idsi'");
}
}
}
?>