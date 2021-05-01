<?php
include("../app/config/config2.php");
set_time_limit(0);
date_default_timezone_set('UTC');
require '../data/data/autoload.php';

/////// CONFIG ///////
$debug = false;
$truncatedDebug = false;
//////////////////////
$usernameler = array('vipb.ey4','vipb.ey26','vipb.ey3','vipb.ey5','vipb.ey6','vipb.ey7','vipb.ey26',);
$is = rand(0,7);//	NE KADAR KULANICI EKLERSENİZ BUNU ARTIRIN EKLENEN KULLANICI KADR ARTIŞ YAPILACAKTIR.
$hesapad = $usernameler[$is];// USERNAME 
$hesapsifre = "vipb.ey1"; // PASSWORD
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
try { 
	
	
	$ig->login($hesapad,$hesapsifre,0); //USERNAME - PASSWORD
	} catch (\Exception $e) {
 echo $e->getMessage()."\n";
	echo " kulanılan hesap ($hesapad)";
	
    exit(0);
}
$ara = $ig->discover->search($kelime);
$gb = json_decode($ara,true)['list'];

$sayi = count($gb);

if($sayi<0){
mysqli_query($con,"UPDATE words SET submit='yes' WHERE id='$idsi'");
}else{
	for($i=0; $i < $sayi; $i++){ 
		if ($ids = $gb[$i]['user']['pk']){
			$userc =$gb[$i]['user']['username'];
		$followers =  $ig->people->getInfoById($ids)->getUser()->getFollowerCount();
		
		if($followers >= 25 ){ // bu kısmı unutmuyak bu kısım lımıtıdır kac  bın ayarlarsanız o kadar yuksek bulur
	// MİNİMUM TAKİPÇİLİ MAİL TOPLAMA SINIRI 
		  $id = $gb[$i]['user']['pk']; 
		    $username = $gb[$i]['user']['username'];
	             $info = $ig->people->getInfoById($id)->getUser();
				   $zn = json_decode($info,true)['public_email'];
	       if(!empty($zn) || $zn == " "){
	$sorgumail = mysqli_query($con, "SELECT * FROM mailler WHERE mail='$zn'");
	$sonucmail = mysqli_fetch_assoc($sorgumail);
	if(!$sonucmail>0){
		$z = strpos($zn,"gmail");
			if($z == false){
			mysqli_query($con,"INSERT INTO mailler (mail,username,submit) VALUES ('$zn','$username','no')");
			echo "<div style='color: green'> kulanılan hesap ($hesapad) mail eklendi  [$zn] takipcisayısı : [$followers]</div><br> ";
			}else{
					echo "<div style='color: red'> kulanılan hesap ($hesapad)  [$username]    mail eklenmedi (gmail olabilir)[$zn]</div> <br>";
			}
		}else{
				echo "<div style='color: red'> kulanılan hesap ($hesapad)  [$username]    mail eklenmedi [$zn]</div> <br>";
			}
	}
}else {echo " <div style='color: red'> kulanılan hesap ($hesapad) nick => [$userc]  ===> takıpcı yetersiz takipcisayısı : [$followers] </div><br>"; }
		
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