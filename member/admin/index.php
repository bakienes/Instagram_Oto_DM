  <?php
include_once ("../../app/config/config.php");
include_once("../../app/config/config2.php");
 $sorgu = mysqli_query($con,"SELECT * FROM  user"); 
$sonuc = $sorgu->fetch_assoc(); 
$username = $sonuc['username'];

/**
 * Veritabanı bağlantı bilgilerimizin olduğu sayfayı dahil ediyoruz.
 */


$db = new Db();
/**
 * Veritabanımıza bağlanmaya çalışıyoruz.
 * Bağlanamazsak, hata mesajını ekrana yazdırıyoruz
 */
if (!$db->connect()) {
    die("Hata: Veritabanına bağlanırken bir hata oluştu." . $db->error());
}
/**
 * $user değişkeni varsayılan olarak tanımsızdır.
 * Eğer kullanıcımız oturum açmış ise, login_user oturum değişkeni doludur.
 * login_user oturum değişkeninin değerini alıyoruz $user a kayıt ediyoruz.
 *
 * Eğer $user null yada false ise bunun anlamı kişi oturum açmamış.
 */
$user = $_SESSION["login_user"];

/**
 * Bir kişinin oturum açıp açmadığını aşağıda ki şekilde kontrol edebiliriz.
 * Aşağıda ki kodları inceleyin.
 * Yorum satırı olarak bırakın.
 */
if ($user) {
    } else {
        // Kişi oturum açmamış.
       header("location: ../index.php?sayfa=yetki");
    }

?>

<?php include "../../app/config/header.php"; ?>
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">Gosterge paneli <small>İstatiskler ve dahası</small></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Toplanan Kelime</div>
              <div class="stats-body-alt"> 
               
                <div class="text-center"><span class="text-top"></span><?php $query = mysqli_query($con,"SELECT COUNT(id) FROM words");
                    $say = mysqli_fetch_array($query);
                    echo $say[0];
                    ?></div>
                <small></small> </div>
				<div class="stats-footer"></div>
              </a> </div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">kulanılan kelime</div>
              <div class="stats-body-alt"> 
             
                <div class="text-center"><span class="text-top"></span><?php $query = mysqli_query($con,"SELECT COUNT(id) FROM words WHERE submit='yes'");
                    $say = mysqli_fetch_array($query);
                    echo $say[0];
                    ?></div>
                <small></small> </div>
              <div class="stats-footer"></div>
              </a> </div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Toplanan Numara</div>
              <div class="stats-body-alt"> 
               
                <div class="text-center"><span class="text-top"></span></span><?php $query = mysqli_query($con,"SELECT COUNT(id) FROM numara WHERE submit='no'");
                    $say = mysqli_fetch_array($query);
                    echo $say[0];
                    ?></div>
				
                <small></small> </div>
              <div class="stats-footer"></div>
              </a> </div>
			
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">wp no gonderılen</div>
              <div class="stats-body-alt"> 
               
                <div class="text-center"><span class="text-top"></span><?php $query = mysqli_query($con,"SELECT COUNT(id) FROM numara WHERE submit='yes'");
                    $say = mysqli_fetch_array($query);
                    echo $say[0];
                    ?></div>
                <small></small> </div>
				  <div class="stats-footer"></div>
              </a> </div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Toplanan Mail</div>
              <div class="stats-body-alt"> 
               
                <div class="text-center"><span class="text-top"></span></span><?php $query = mysqli_query($con,"SELECT COUNT(id) FROM mailler WHERE submit='no'");
                    $say = mysqli_fetch_array($query);
                    echo $say[0];
                    ?></div>
				
                <small></small> </div>
              <div class="stats-footer"></div>
              </a> </div>
			
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading"> Gönderilen Mail </div>
              <div class="stats-body-alt"> 
               
                <div class="text-center"><span class="text-top"></span><?php $query = mysqli_query($con,"SELECT COUNT(id) FROM mailler WHERE submit='yes'");
                    $say = mysqli_fetch_array($query);
                    echo $say[0];
                    ?></div>
                <small></small> </div>
            
              <div class="stats-footer"></div>
			   </a> </div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Toplanan Dm</div>
              <div class="stats-body-alt"> 
               
                <div class="text-center"><span class="text-top"></span></span><?php $query = mysqli_query($con,"SELECT COUNT(id) FROM otodm WHERE submit='no'");
                    $say = mysqli_fetch_array($query);
                    echo $say[0];
                    ?></div>
				
                <small></small> </div>
              <div class="stats-footer"></div>
			  
			   </a> </div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Gönderilen DM</div>
              <div class="stats-body-alt"> 
               
                <div class="text-center"><span class="text-top"></span></span><?php $query = mysqli_query($con,"SELECT COUNT(id) FROM otodm WHERE submit='yes'");
                    $say = mysqli_fetch_array($query);
                    echo $say[0];
                    ?></div>
				
                <small></small> </div>
              <div class="stats-footer"></div>
			  
              </a> </div>
              </a> 
        
     </div>
      
   
			
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
<div class="bottom-nav footer"> SkyTürk &copy  2020 OTO SMM</div>

            </div>
            <script type="text/javascript">// Popup Al
var modal = document.getElementById('myModal');
// Kipi açan düğmeyi al
var btn = document.getElementById("myBtn");
// Kipi kapatan <span> öğesini edinin
var span = document.getElementsByClassName("close")[0];
// Kullanıcı düğmeyi tıklattığında
btn.onclick = function() {
    modal.style.display = "block";
}
// Kullanıcı <span> (x) düğmesini tıkladığında, popup
span.onclick = function() {
    modal.style.display = "none";
}
// Kullanıcı modelden başka herhangi bir yeri tıklattıysa, onu kapatın.
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../../data/js/jquery.js"></script> 
<script src="../../data/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="../../data/js/smooth-sliding-menu.js"></script> 
<script class="include" type="text/javascript" src="../../data/javascript/jquery191.min.js"></script> 
<script class="include" type="text/javascript" src="../../data/javascript/jquery.jqplot.min.js"></script> 
<script src="../../data/assets/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="../../data/assets/sparkline/jquery.customSelect.min.js" ></script>
<script src="../../data/assets/sparkline/sparkline-chart.js"></script>
<script src="../../data/assets/sparkline/easy-pie-chart.js"></script>
<script src="../../data/js/select-checkbox.js"></script> 
<script src="../../data/js/to-do-admin.js"></script> 

<!--switcher html start-->
<!-- <div class="demo_changer active" style="right: 0px;">
  <div class="demo-icon"></div>
  <div class="form_holder">
    <div class="predefined_styles"> <a class="styleswitch" rel="a" href=""><img alt="" src="images/a.jpg"></a> <a class="styleswitch" rel="b" href=""><img alt="" src="images/b.jpg" ></a> <a class="styleswitch" rel="c" href=""><img alt="" src="images/c.jpg"></a> <a class="styleswitch" rel="d" href=""><img alt="" src="images/d.jpg"></a> <a class="styleswitch" rel="e" href=""><img alt="" src="images/e.jpg"></a> <a class="styleswitch" rel="f" href=""><img alt="" src="images/f.jpg"></a> <a class="styleswitch" rel="g" href=""><img alt="" src="images/g.jpg"></a> <a class="styleswitch" rel="h" href=""><img alt="" src="images/h.jpg"></a> <a class="styleswitch" rel="i" href=""><img alt="" src="images/i.jpg"></a> <a class="styleswitch" rel="j" href=""><img alt="" src="images/j.jpg"></a> </div>
  </div>
</div> -->

<!--switcher html end--> 
<script src="../data/assets/switcher/switcher.js"></script> 
<script src="../data/assets/switcher/moderziner.custom.js"></script>
<link href="../data/assets/switcher/switcher.css" rel="stylesheet">
<link href="../data/assets/switcher/switcher-defult.css" rel="stylesheet">
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/a.css" title="a" media="all" />
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/b.css" title="b" media="all" />
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/c.css" title="c" media="all" />
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/d.css" title="d" media="all" />
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/e.css" title="e" media="all" />
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/f.css" title="f" media="all" />
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/g.css" title="g" media="all" />
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/h.css" title="h" media="all" />
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/i.css" title="i" media="all" />
<link rel="alternate stylesheet" type="text/css" href="../data/assets/switcher/j.css" title="j" media="all" />



</body>
</html>

