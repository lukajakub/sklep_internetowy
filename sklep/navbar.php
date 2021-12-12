<?php
session_start();

?>
<!DOCTYPE html>
<head>
<title>Sklep wędkarski ,,Szczupak''</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">



<link rel="shortcut icon" href="logo.png" type="image/x-icon" />
</head>

  
    <a href="index.php"><img src="logo.png" alt="logo" class="responsive" ></a>  
    <a href="koszyk.php"><img src="koszyk.png" alt="logo" class="responsive" style="float: right; margin: 10px;" ></a>
    <?php
    if(isset($_SESSION['rola'])){
    if($_SESSION['rola']==='klient')

{
  print_r("<a href='klient.php'><img src='klient.png' alt='logo' class='responsive' style='float: right; margin: 10px;' ></a>");
}
if($_SESSION['rola']==='pracownik')

{
  print_r("<a href='pracownik.php'><img src='klient.png' alt='logo' class='responsive' style='float: right; margin: 10px;' ></a>");
}
if($_SESSION['rola']==='administrator')

{
  print_r("<a href='administrator.php'><img src='klient.png' alt='logo' class='responsive' style='float: right; margin: 10px;' ></a>");
}
}  
else
{
  print_r("<a href='logowanie.php'><img src='klient.png' alt='logo' class='responsive' style='float: right; margin: 10px;' ></a>");
}   

if(isset($_SESSION['rola'])){
    if($_SESSION['zalogowany']==true)
    {
      print_r("<a href='logout.php'><img src='wylogowanie.png' alt='logo' class='responsive' style='float: right; margin: 10px;' ></a>");
    }}
    ?>
    <br><br>

    <ul style="margin-bottom: 0px;">
      <li><a href="oferta.php">Oferta</a></li>

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
    