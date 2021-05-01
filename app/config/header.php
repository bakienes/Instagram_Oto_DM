	<!DOCTYPE html>
<html>
<head>
<title>Sky Türk Admin</title>
	 <link rel="shortcut icon" href="../data/img/resim.png" style="width:100%;">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="../../data/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="../../data/css/thin-admin.css" rel="stylesheet" media="screen">
<link href="../../data/css/font-awesome.css" rel="stylesheet" media="screen">
<link href="../../data/style/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../..data/csx/java.css">
<link href="../../data/style/dashboard.css" rel="stylesheet">
<link href="../../data/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
  <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pull-right" href="#"><i class="icon-reorder"></i> </a>
    <div class="brand pull-left"> <a href="index.php"><img src="../../data/img/resim.png" width="180" height="60"></a></div>
    <ul class="nav navbar-nav navbar-right  hidden-xs">
      <li class="dropdown">
        <ul class="dropdown-menu extended notification">
          <li class="title">
            <p></p>
          </li>
          
        </ul>
      </li>
      
      
      <li class="dropdown user  hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-male"></i> <span class=""><?php echo $username ?></span>
             <i class="icon-caret-down small"></i> </a>
        <ul class="dropdown-menu">
          <li><a href=""><i class="icon-user"></i> My Profile</a></li>
         
          <li class="divider"></li>
          <li><a href="../logout.php"><i class="icon-key"></i>çıkış yapnız</a></li>
        </ul>
      </li>
    </ul>
    
  </div>
</div>
<div class="wrapper ">
  <div class="left-nav ">
    <div id="side-nav">
      <ul id="nav">
        <li class="current"> <a href="../admin/"> <i class="icon-dashboard"></i> Gösterge Tablosu </a> </li>
     
         <li> <a href="../mail/"> <i class="icon-table"></i> Mail  Tablosu <span class="label label-info pull-right"></a>
        
          <li> <a href="../numara/"> <i class="icon-table"></i>Numara Tablosu <span class="label label-info pull-right"></a>
		  
		  <li> <a href="../dm/"> <i class="icon-table"></i> Dm  Tablosu <span class="label label-info pull-right"></a>
		  
           <li> <a href="#"> <i class="icon-table"></i> Ayarlar <span class="label label-info pull-right"></span> <i class="arrow icon-angle-left"></i></a> 
          <ul class="sub-menu">
          <li> <a href="../../cron/kelime.php"> <i class="icon-angle-right"></i>KELİME EKLE </a> </li>
              <li> <a href="../../cron/mailtopla.php"> <i class="icon-angle-right"></i>MAİL TOPLA</a> </li>
               <li> <a href="../../cron/numara.php"> <i class="icon-angle-right"></i>NUMARA TOPLA </a> </li>
              
                 <li> <a href="../../cron/dmtopla.php"> <i class="icon-angle-right"></i>DM TOPLA</a> </li>
                   
                       <li> <a href="../../cron/mail.php"> <i class="icon-angle-right"></i>MAİL BAS</a> </li>
					   <li> <a href="../../cron/none.php"> <i class="icon-angle-right"></i>NUMARA BAS</a> </li>
					   <li> <a href="../../cron/dmbas.php"> <i class="icon-angle-right"></i>DM BAS</a> </li>
					   <li> <a href="../../cron/kelime.php"> <i class="icon-angle-right"></i>MAİL BAS</a> </li>
					   
                          
       
          </ul>
        </li>
       
      </ul>
    </div>
  </div>