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
<body>
  
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
    ?>
    

    <?php
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
   
    <a href="dane.php"><button class="btn btn-primary">Dane</button></a>
<a href="lista_zamowien.php"><button class="btn btn-primary">Historia zamówień</button></a>

      
      <div class="footer-dark" style="margin-bottom:0px; float=bottom;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Współpraca</h3>
                        <ul>
                            <li><a href="pzw.php">PZW</a></li>
                            <li><a href="miasto.php">Miasto Siedlce</a></li>
                            <li><a href="daiwa.php">Daiwa</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Sklep</h3>
                        <ul>
                            <li><a href="historia.php">Historia</a></li>
                            <li><a href="spis.php">Spis sklepów</a></li>
                            <li><a href="kontakt.php">Kontakt</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>O sklepie</h3>
                        <p>Sklep stworzony dla pasjonatów wędkarstwa. W naszym asortymencie znajdziecie produkty najwyższej jakości.</p>
                    </div>
                    <div class="col item social"><a href="https://www.facebook.com/"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com/?lang=pl"><i class="icon ion-social-twitter"></i></a><a href="https://accounts.snapchat.com/accounts/login?continue=https%3A%2F%2Faccounts.snapchat.com%2Faccounts%2Fwelcome"><i class="icon ion-social-snapchat"></i></a><a href="https://www.instagram.com/"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                
            </div>
        </footer>
    </div>
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>