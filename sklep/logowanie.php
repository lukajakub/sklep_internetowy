<?php

    
include "rejestracja_weryfikacja.php";
include 'navbar.php';
$connection= new Connection();
if(isset($_POST['login'])&&isset($_POST['haslo']))
  {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
  }
  if(

  isset($_POST["login"]) 
   && ($_POST["login"] != "") 
   

   &&isset($_POST["haslo"]) 
   &&($_POST["haslo"] != "") 


  

)
{


if((new Rejestracja())->zaloguj($login,$haslo))
{
  
  $_SESSION["zalogowany"] = true;
            $_SESSION["uzytkownik"] = $login;
            echo'Pomyślnie zalogowano';
$zapytanie = "SELECT nazwa_uprawnienia,id_konta FROM konta INNER JOIN uprawnienia ON konta.id_uprawnienia  = uprawnienia.id_uprawnienia WHERE konta.login = '$login'; ";
$result= $connection->query($zapytanie,[]);
  $row = $result->fetchALL(\PDO::FETCH_ASSOC);
  
  if(!empty($row))
    {
      $_SESSION["rola"] = $row[0]['nazwa_uprawnienia'];
     $_SESSION["id_konta"]= $row[0]['id_konta'];
      }
if(!empty( $_SESSION["rola"]))
  {
    if( $_SESSION["rola"]=='administrator')
      {
        header('location: administrator.php');
        }
     if( $_SESSION["rola"]=='pracownik')
      {
        header('location: pracownik.php');
        }
     if( $_SESSION["rola"]=='klient')
      {
        
        header('location: klient.php');
        }
    }
}else
{
  echo'nie udalo sie zalogowac';
}
}else
{
  
  
}
    ?>
<!DOCTYPE html>
<head>
<title>Sklep wędkarski ,,Szczupak''</title>

    <div style="padding-left:20px; text-align: center;">
    <h2>Logowanie</h2>
    </div>
    
<form action="logowanie.php" method="post">
  <div class="imgcontainer">
    <img src="klient.png" alt="Avatar" class="avatar" style="height: 500px; width=300px;">
  </div>

  <div class="container">
    <label for="uname"><b>Login</b></label>
    <input type="text" placeholder="Enter Username" name="login" required>

    <label for="psw"><b>Haslo</b></label>
    <input type="password" placeholder="Enter Password" name="haslo" required>
        
    <button type="submit">Login</button>
    <div class="container signin">
    <p>Nie masz konta? <a href="rejestracja.php">Zarejestruj</a>.</p>
  </div>
  </div>
</form>



      
      <div class="footer-dark">
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