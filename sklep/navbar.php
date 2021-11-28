<?php
session_start();

?>
<!DOCTYPE html>
<head>
<title>Sklep wędkarski ,,Szczupak''</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.responsive {
    width: 100%;
    max-width: 50px;
    height: auto;
    margin-left: 10px;
    margin-top: 10px;
  }
  @import url('http://fonts.googleapis.com/css?family=Open+Sans:400,700');

*{
	padding:0;
	margin:0;
}

html{
	background-color: #eaf0f2;
}

body{
	font:16px/1.6 Arial,  sans-serif;
}

header{
	text-align: center;
	padding-top: 100px;
	margin-bottom:190px;
}

header h1{
	font: normal 32px/1.5 'Open Sans', sans-serif;
	color: #3F71AE;
	padding-bottom: 16px;
}

header h2{
	color: #F05283;
}

header span{
	color: #3F71EA;
}



  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
.footer-dark {
  padding:50px 0;
  color:#f0f9ff;
  background-color:#282d32;
}

.footer-dark h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-dark ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-dark ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.6;
}

.footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}

.footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}

.footer-dark .copyright {
  text-align:center;
  padding-top:24px;
  opacity:0.3;
  font-size:13px;
  margin-bottom:0;
}

</style>

<link rel="shortcut icon" href="logo.png" type="image/x-icon" />
</head>

  
    <a href="index.php"><img src="logo.png" alt="logo" class="responsive" ></a>  
    <a href="koszyk.php"><img src="koszyk.png" alt="logo" class="responsive" style="float: right; margin: 10px;" ></a>
    <?php
    if($_SESSION['rola']==='klient')
{
  print_r("<a href='klient.php'><img src='klient.png' alt='logo' class='responsive' style='float: right; margin: 10px;' ></a>");
}
else
{
  print_r("<a href='logowanie.php'><img src='klient.png' alt='logo' class='responsive' style='float: right; margin: 10px;' ></a>");
}
    
    

    
    if($_SESSION['zalogowany']==true)
    {
      print_r("<a href='logout.php'><img src='wylogowanie.png' alt='logo' class='responsive' style='float: right; margin: 10px;' ></a>");
    }
    ?>
    <br><br>

    <ul style="margin-bottom: 0px;">
      <li><a href="oferta.php">Oferta</a></li>
      <li><a href="wedki.php">Wędki</a></li>
      <li><a href="kolowrotki.php">Kołowrotki</a></li>
      <li><a href="zylki.php">Żyłki</a></li>
      <li><a href="plecionki.php">Plecionki</a></li>
      <li><a href="przypony.php">Przypony</a></li>
      <li><a href="woblery.php">Woblery</a></li>
    </ul>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="slider1.jpg" alt="slider1" width="700" height="550">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="slider2.jpg" alt="slider2" width="700" height="550">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="slider3.jpg" alt="slider3" width="700" height="550">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    