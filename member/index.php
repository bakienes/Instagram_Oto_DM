<?php $a= 'http://'.$_SERVER['HTTP_HOST']; ?>
<?php

/**
 * Veritabanı bağlantı bilgilerimizin olduğu sayfayı dahil ediyoruz.
 */
include_once ("../app/config/config.php");

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


 if ($user) {
header("location: admin/");
}// else {
       // Kişi oturum açmamış.
/// header("location: index.php?type=yetki");
 //   }
    
 
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="sky">
  <meta name="author" content="Otomail>
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SkyTürk | Oto pANEL</title>

 
  <link rel="stylesheet" type="text/css" href="../data/asset/css/bootstrap.min.css">
  
  <link rel="stylesheet" type="text/css" href="../data/asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="../data/asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="../data/asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="../data/asset/css/plugins/icheck/skins/flat/aero.css"/>
  <link href="../data/asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="https://instagram.fada1-2.fna.fbcdn.net/vp/76a9aef74ba26d6d1a8135ae3811b00f/5CA53791/t51.2885-19/s150x150/44805713_363945534372709_2801794535129088000_n.jpg?_nc_ht=instagram.fada1-2.fna.fbcdn.net">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">

      <div class="container">

        <form class="form-signin" method="post" >
          <div class="panel periodic-login">
              <span class="atomic-number"></span>
              <div class="panel-body text-center">
                  <h1 class="atomic-symbol">s</h1>
                  <p class="atomic-mass"></p>
                  <p class="element-name">SkyTürk</p>

              <?php
 $db = new Db();
if (!$db->connect()) { die("Hata: Veritabanına bağlanırken bir hata oluştu." . $db->error());}
$user = $_SESSION["login_user"];
$username = $_POST["username"];
$password = $_POST["password"];
$username = trim($username);
$password = trim($password);
$username = $db->quote($username);
$query= "SELECT * FROM user WHERE username=$username and password='$password'";
$result = $db->select($query);

  $isim = $_POST['username'];
 $sifre = $_POST['password'];
  if(isset($_POST['logen']))
 {
   if($isim==  $result[0]["username"] && $sifre==  $result[0]["password"])
   {
     $_SESSION["login_user"] = array(
        "id" => $result[0]["id"],
        "username" => $result[0]["username"],
       "password" => $result[0]["password"],
    );
    echo '<div class="alert alert-success" role="alert">Giris yapılıyor</div>';
    
    
     header("Refresh: 2; url=admin/index.php");
   }
   else
   {
     echo '<div class="alert alert-danger" role="alert">Kullanıcı adı veya şifre yanlış</div>';
   }} ?>

<?php if ($_GET['sayfa'] == 'yetki'){ 

 echo '<div class="alert alert-danger" role="alert">yetki yok</div>';

} ?>       
      
      
                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" name="username" required>
                    <span class="bar"></span>
                    <label>Kullanıcı adı</label>
					 
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" class="form-text" name="password" required>
                    <span class="bar"></span>
                    <label>Şifre</label>
                  </div>
               
                  <input type="submit" class="btn col-md-12" name="logen" value="giris yap"/>
              </div>
                <div class="text-center" style="padding:5px;">
                    <a href="http://nolur.com">Şifremi unutum </a>
                    <a href="http://nolur.com">| Kayıt ol</a>
                </div>
          </div>
        </form>

      </div>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="data/asset/js/jquery.min.js"></script>
      <script src="data/asset/js/jquery.ui.min.js"></script>
      <script src="data/asset/js/bootstrap.min.js"></script>

      <script src="data/asset/js/plugins/moment.min.js"></script>
      <script src="data/asset/js/plugins/icheck.min.js"></script>

      <!-- custom -->
      <script src="data/asset/js/main.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>