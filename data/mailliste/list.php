<?php
include("../../app/config/config.php");
include("../../app/config/config2.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>shadowbeyz</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="../../data/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="../../data/css/thin-admin.css" rel="stylesheet" media="screen">
<link href="../../data/css/font-awesome.css" rel="stylesheet" media="screen">
<link href="../../data/style/style.css" rel="stylesheet">
<link href="../../data/style/dashboard.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
  <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pull-left" href="#"><i class="icon-reorder"></i> </a>
    <div class="brand pull-left"> <a href="../admin"><img src="../../data/img/resim.png" width="200" height="60"></a></div>
    <ul class="nav navbar-nav navbar-right  hidden-xs">
      <li class="dropdown user  hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-male"></i> <span class="username"><?php echo $username ?> </span> <i class="icon-caret-down small"></i> </a>
        <ul class="dropdown-menu">
          <li><a href=""><i class="icon-user"></i>profil ziyareti</a></li>
         
          <li class="divider"></li>
          <li><a href="../logout.php"><i class="icon-key"></i>çıkış yap</a></li>
        </ul>
      </li> 
          
        </ul>
      </li>
     
           
      </li>
      
    </ul>
    
  </div>
</div>
<div class="wrapper">
  <div class="left-nav">
    <div id="side-nav">
      <ul id="nav">
        <li class="current"> <a href="../admin"> <i class="icon-dashboard"></i> Gösterge Tablosu </a> </li>
          <li> <a href="../manuelmail/"> <i class="icon-edit"></i>Manuel MAİL Basma<span class="label label-info pull-right"></span> <i class="arrow icon-angle-left"></i></a>
        <li> <a href="#"> <i class="icon-table"></i> Mail Tablosu <span class="label label-info pull-right"></span> <i class="arrow icon-angle-left"></i></a> 
          <ul class="sub-menu">
            <li> <a href="../mail/"> <i class="icon-angle-right"></i>istatiskler </a> </li>
        
          </ul>
        </li>
       
      </ul>
    </div>
  </div>
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">mail istatiskleri </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-table"></i>
              <h3>tablo</h3>
            </div>
            <div class="widget-content">
              <div class="body">
                <table class="table table-striped table-images">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>mail</th>
                      <th>kulanıcı adı</th>
                      <th>gonderildimi?</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <tr>
                      <td><?php echo $id1; ?></td>
                      <td><?php echo $mail1; ?></td>
                      <td> <a href="https://www.instagram.com/<?php echo $username1; ?>" a><?php echo $username1; ?></td>
                      <td><?php echo $submit1; ?></td>
                    </tr>
                     <tr>
                      <td><?php echo $id2; ?></td>
                      <td><?php echo $mail2; ?></td>
                      <td> <a href="https://www.instagram.com/<?php echo $username2; ?>" a><?php echo $username2; ?></td>
                      <td><?php echo $submit2; ?></td>
                    </tr>
                     <tr>
                      <td><?php echo $id3; ?></td>
                      <td><?php echo $mail3; ?></td>
                      <td> <a href="https://www.instagram.com/<?php echo $username3; ?>" a><?php echo $username3; ?></td>
                      <td><?php echo $submit3; ?></td>
                    </tr>
                     <tr>
                      <td><?php echo $id4; ?></td>
                      <td><?php echo $mail4; ?></td>
                      <td> <a href="https://www.instagram.com/<?php echo $username4; ?>" a><?php echo $username4; ?></td>
                      <td><?php echo $submit4; ?></td>
                    </tr>
                     <tr>
                      <td><?php echo $id5; ?></td>
                      <td><?php echo $mail5; ?></td>
                      <td> <a href="https://www.instagram.com/<?php echo $username5; ?>" a><?php echo $username5; ?></td>
                      <td><?php echo $submit5; ?></td>
                    </tr>
                     <tr>
                      <td><?php echo $id6; ?></td>
                      <td><?php echo $mail6; ?></td>
                      <td> <a href="https://www.instagram.com/<?php echo $username6; ?>" a><?php echo $username6; ?></td>
                      <td><?php echo $submit6; ?></td>
                    </tr>
                     <tr>
                      <td><?php echo $id7; ?></td>
                      <td><?php echo $mail7; ?></td>
                      <td> <a href="https://www.instagram.com/<?php echo $username7; ?>" a><?php echo $username7; ?></td>
                      <td><?php echo $submit7; ?></td>
                    </tr>
                     <tr>
                      <td><?php echo $id8; ?></td>
                      <td><?php echo $mail8; ?></td>
                      <td> <a href="https://www.instagram.com/<?php echo $username8; ?>" a><?php echo $username8; ?></td>
                      <td><?php echo $submit8; ?></td>
                    </tr>
                     <tr>
                      <td><?php echo $id9; ?></td>
                      <td><?php echo $mail9; ?></td>
                      <td> <a href="https://www.instagram.com/<?php echo $username9; ?>" a><?php echo $username9; ?></td>
                      <td><?php echo $submit9; ?></td>
                    </tr>
                    
                  </tbody>
                </table>
                  </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bottom-nav footer"> 2019 shadowbeyz otomail panel</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../../data/js/jquery.js"></script> 
<script src="../../data/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="../../data/js/smooth-sliding-menu.js"></script>
              </div>
            </div>
            
            
</body>
</html>
