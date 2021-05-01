<?php
include("../app/config/config2.php");
set_time_limit(0);
date_default_timezone_set('UTC');
require '../data/data/autoload.php';
/////// CONFIG ///////
$debug = false;
$truncatedDebug = false;
//////////////////////
$usernameler = array('helpinformationinstaagram',);
$is = rand(0,1);//	NE KADAR KULANICI EKLERSENİZ BUNU ARTIRIN EKLENEN KULLANICI KADR ARTIŞ YAPILACAKTIR.
$hesapad = $usernameler[$is];// USERNAME 

$hesapsifre = "kaba5901"; // PASSWORD
//////////////////////
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
//////////////////////
$ig = new \InstagramAPI\Instagram();

try {  $ig->login($hesapad,$hesapsifre); //USERNAME - PASSWORD
	} catch (\Exception $e) {
    echo $e->getMessage()."\n";
    exit(0);
}
$sorgu = mysqli_query($con,"SELECT * FROM words WHERE submit='no' LIMIT 1110");
try{
	while($sonuc = mysqli_fetch_assoc($sorgu)){
$idsi = $sonuc['id'];
 $kelime = $sonuc['word'];
try { 
	
	
	$ig->login($hesapad,$hesapsifre,0); //USERNAME - PASSWORD
	} catch (\Exception $e) {
 echo $e->getMessage()."\n";
	echo 
	
    exit(0);
}
$ara = $ig->discover->search($kelime);
$gb = json_decode($ara,true)['list'];

$sayi = count($gb);

if($sayi<0){
mysqli_query($con,"UPDATE words SET submit='yes' WHERE id='$idsi'");
}else{
	for($i=0; $i < $sayi; $i++){ 
	    $mavitik = $gb[$i]['user']['is_verified'];
		if ($ids = $gb[$i]['user']['pk']){
			$userc =$gb[$i]['user']['username'];
		$followers =  $ig->people->getInfoById($ids)->getUser()->getFollowerCount();
		
		if($followers >= 1 ){ 	// MİNİMUM TAKİPÇİLİ HESAP TOPLAMA SINIRI 
		  $id = $gb[$i]['user']['pk']; 
		    $username = $gb[$i]['user']['username'];
		$info = $ig->people->getInfoById($id)->getUser ();
				   $zn = json_decode($info,true)['pk'];
	       if(!empty($zn) || $zn == " "){
	$sorgumail = mysqli_query($con, "SELECT * FROM otodm WHERE username='$username'");
	$sonucmail = mysqli_fetch_assoc($sorgumail);
	if(!$sonucmail>0){
			mysqli_query($con,"INSERT INTO otodm (username,userid,submit) VALUES ('$username','$zn','no')");
			echo "<div style='color: green'> Kulanılan hesap ($hesapad) hesap eklendi.  [$username] takipcisayısı : [$followers]</div><br> ";
			}else{
				echo "<div style='color: red'> Kulanılan hesap ($hesapad) hesap eklenmedi. [$username]</div> <br>";
			}
	}
}else {echo " <div style='color: red'> Kulanılan hesap ($hesapad) Kullanıcı adı => [$userc]  ===> Takipçi yetersiz takipçi sayısı : [$followers] </div><br>"; }
		
		}
			
		
}
mysqli_query($con,"UPDATE words SET submit='yes' WHERE id='$idsi'");
}
}
	$sorg = mysqli_query($con,"SELECT * FROM words WHERE submit='yes' ORDER BY id ASC LIMIT 10");
$s = mysqli_fetch_assoc($sorg);
$sor = mysqli_query($con, "DELETE FROM words WHERE submit='yes'ORDER BY id ASC LIMIT 20");
if ($sor >0) {
	echo "kullanılan Kelime silindi.";
}else{
	echo "kullanılan Kelime silinmedi!";
}
} catch (\Exception $e) {
    echo $e->getMessage()."\n";
	echo " kulanılan hesap ($hesapad)";
}
?>