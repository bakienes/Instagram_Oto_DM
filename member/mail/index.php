<?php
include"../../app/config/config.php";

session_start();
$db = new Db();

if (!$db->connect()) {
    die("Hata: Veritabanına bağlanırken bir hata oluştu." . $db->error());
}

$user = $_SESSION["login_user"];
if ($user) {}else {
 header("location: ../index.php?type=yetki");
  }
try{ 
   $db = new PDO("mysql:host=localhost;dbname=$dbUsername;charset=utf8", "$dbName","$dbPassword"); //veri tabını baglantısı
}catch(PDOException $e){
   echo $e->getMessage(); 
}
$Sayfa   = @ceil($_GET['sayfa']); 
if ($Sayfa < 1) { $Sayfa = 1;} 
$Say   = $db->query("select * from mailler order by id asc");
$ToplamVeri   = $Say->rowCount(); 
$Limit  = 35; 
$Sayfa_Sayisi = ceil($ToplamVeri/$Limit); 
if($Sayfa > $Sayfa_Sayisi){$Sayfa = $Sayfa_Sayisi;} 
$Goster   = $Sayfa * $Limit - $Limit;
$GorunenSayfa   = 5; 
$Makale = $db->query("select * from mailler order by id asc limit $Goster,$Limit");
$cek = $Makale->fetchAll(PDO::FETCH_ASSOC);

?>


<?php include "../../app/config/header.php"; ?>
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">Mail İstatiskleri </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-table"></i>
              <h3>Tablo</h3>
            </div>
            <div class="widget-content">
              <div class="body">
                <table class="table table-striped table-images">
                  <thead>
                    <tr>
                      <th>İd</th>
                      <th>Mail</th>
                      <th>Kulanıcı Adı</th>
                      <th>Gonderildimi?</th>
                    </tr>
                  </thead>
                  <tbody>
                    <style type="text/css">
                    @import url(http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600);



*,
*:after,
*:before {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.cf:before,
.cf:after {
  content: '';
  display: table;
}
.cf:after {
  clear: both;
}
.support {
  font-weight: bold;
  padding: 2em 0 0 0;
  font-size: 1.4em;
  color: #ee2563;
  display: none;
}
a {
  color: #7986cb;
  text-decoration: none;
  outline: none;
}
a:hover,
a:focus {
  color: #3f51b5;
}
.hidden {
  position: absolute;
  width: 0;
  height: 0;
  overflow: hidden;
  pointer-events: none;
}

.box {
  padding: 4.5em 0;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-justify-content: center;
  justify-content: center;
}


.content {
  padding: 1em 1em 1em;
  z-index: 1;
  max-width: 1000px;
  margin: 0 auto;
}
.content h2 {
  margin: 0 0 2em;
}
.content p {
  margin: 1em 0;
  padding: 0 0 2em;
  font-size: 0.85em;
}

.container {
  margin: 0 auto;
  text-align: center;
  overflow: hidden;
}

.main-header {
  padding: 1em 50px 1em;
  letter-spacing: -1px;
}

.box {
  padding: 4.5em 0;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-justify-content: center;
  justify-content: center;
}

.bg-1 {
  background: #ECEFF1;
  color: #37474f;
}
.bg-2 {
  background: #F2A477;
  color: #ECEFF1;
}
.bg-3 {
  background: #37474f;
  color: #fff;
}

/* Common button styles */
.button {
  float: left;
  min-width: 150px;
  max-width: 250px;
  display: block;
  margin: 1em;
  padding: 1em 2em;
  border: none;
  background: none;
  color: inherit;
  vertical-align: middle;
  position: relative;
  z-index: 1;
  -webkit-backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
}
.button:focus {
  outline: none;
}
.button > span {
  vertical-align: middle;
}

/* Text color adjustments (we could stick to the "inherit" but that does not work well in Safari) */
.bg-1 .button {
  color: #37474f;
  border-color: #37474f;
}
.bg-2 .button {
  color: #F2A477;
  border-color: #fff;
}
.bg-3 .button {
  color: #fff;
  border-color: #fff;
}

/* Sizes */
.button--size-s {
  font-size: 10px;
}
.button--size-m {
  font-size: 16px;
}
.button--size-l {
  font-size: 18px;
}

/* Typography and Roundedness */
.button--text-upper {
  letter-spacing: 2px;
  text-transform: uppercase;
}
.button--text-thin {
  font-weight: 300;
}
.button--text-medium {
  font-weight: 500;
}
.button--text-thick {
  font-weight: 600;
}
.button--round-s {
  border-radius: 5px;
}
.button--round-m {
  border-radius: 15px;
}
.button--round-l {
  border-radius: 40px;
}

/* Borders */
.button--border-thin {
  border: 1px solid;
}
.button--border-medium {
  border: 2px solid;
}
.button--border-thick {
  border: 3px solid;
}


/* Simple button style */
.button--simple {
  overflow: hidden;
  padding: 0;
  width: 230px;
}
.button--simple.button--inverted {
  color: #fff;
}
.button--simple::before {
  content: attr(data-text);
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #75BF95;
  -webkit-transform: translate3d(-100%, 0, 0);
  transform: translate3d(-100%, 0, 0);
}
.button--simple.button--inverted::before {
  background: #fff;
  color: #37474f;
}
.button--simple > span {
  display: block;
}
.button--simple::before,
.button--simple > span {
  padding: 1em 2em;
  -webkit-transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  -webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
  transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--simple:hover::before {
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
.button--simple:hover > span {
  -webkit-transform: translate3d(0, 100%, 0);
  transform: translate3d(0, 100%, 0);
}
</style>
                   


   <?php foreach($cek as $sonuc){?>
<tr> <td><?=$sonuc["id"]?></td>

     <td><?=$sonuc["mail"]?></td>
       <td><?=$sonuc["username"]?></td>
         <td><?=$sonuc["submit"]?></td>
</tr>
    


   <?php } ?>

  

            
                    
                  </tbody>
                </table>
                 <?php if($Sayfa > 1){?>
<button class="button  button--border-thin button--text-thin button--size-s button--inverted" data-text="ilk"><a href="index.php?sayfa=1">İlk</a></button>
  
<button class="button  button--border-thin button--text-thin button--size-s button--inverted" data-text="Önceki"><a href="index.php?sayfa=<?=$Sayfa - 1?>">Önceki</a></button>

   <?php } ?>

   <?php 
    for($i = $Sayfa - $GorunenSayfa; $i < $Sayfa + $GorunenSayfa +1; $i++){ 
      if($i > 0 and $i <= $Sayfa_Sayisi){
         if($i == $Sayfa){
            echo '<button class="button  button--border-thin button--text-thin button--size-s button--inverted" data-text="ilk">'.$i.'</button>';
         }else{
            echo '<a class="button  button--border-thin button--text-thin button--size-s button--inverted" data-text="ilk" href="index.php?sayfa='.$i.'">'.$i.'</a>'; 
         }
      }
   }
   ?>
   <?php if($Sayfa != $Sayfa_Sayisi){?>

   <div class="button button--border-thin button--text-thin button--size-s button--inverted" data-text="Sonraki"><a href="index.php?sayfa=<?=$Sayfa + 1?>">Sonraki</a></div>
   <div class="button  button--border-thin button--text-thin button--size-s button--inverted" data-text="Son"><a href="index.php?sayfa=<?=$Sayfa_Sayisi?>">Son</a></div>

   <?php } ?>
                  </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bottom-nav footer"> 2020 SkyTürk Otomail Panel</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../../data/js/jquery.js"></script> 
<script src="../../data/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="../../data/js/smooth-sliding-menu.js"></script>
              </div>
            </div>
            
            
</body>
</html>
