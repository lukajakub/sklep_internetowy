<?php
include "navbar.php";
?>
    <div style="padding-left:20px; text-align: center;">
    <h2>Dane osobowe</h2>
    </div>
    
   
    <?php
    include "connection.php";
    include "rejestracja_weryfikacja.php";

if(

    !isset($_POST["imie"]) 
     || ($_POST["imie"] == "") 
     ||(is_numeric($_POST["imie"]))

     ||!isset($_POST["nazwisko"]) 
    ||($_POST["nazwisko"] == "") 
    ||(is_numeric($_POST["nazwisko"]))

    ||!isset($_POST["ulica"]) 
    ||($_POST["ulica"] == "") 
    ||(is_numeric($_POST["ulica"]))

    ||!isset($_POST["miasto"]) 
    ||($_POST["miasto"] == "") 
    ||(is_numeric($_POST["miasto"]))

    ||!isset($_POST["kod"]) 
    ||($_POST["kod"] == "") 
    ||(is_numeric($_POST["kod"]))

    ||!isset($_POST["nr_domu"]) 
    ||($_POST["nr_domu"] == "") 

  )

{


}
else
{
   
    $telefon=$_POST["telefon"];
    $nr_lokalu=$_POST["nr_lokalu"];
    
        $id_konta=$_POST["id_konta"];
        $imie = $_POST["imie"];
        $nazwisko = $_POST["nazwisko"];
        $ulica = $_POST["ulica"];
        $miasto = $_POST["miasto"];
        $kod = $_POST["kod"];
        $nr_domu = $_POST["nr_domu"];
    (new Rejestracja())->aktualizacja($imie,$nazwisko,$telefon,$kod,$miasto,$ulica,$nr_domu,$nr_lokalu,$id_konta);
}
      $uzytkownik=$_SESSION['uzytkownik'];
    $zapytanie="SELECT imie,nazwisko,nr_tel,kod_pocztowy,miasto,ulica,nr_domu,nr_lokalu,klienci.id_konta FROM konta INNER JOIN klienci ON konta.id_konta=klienci.id_konta WHERE `login`= :login ";
    
   $connection= new Connection();

   $result = $connection->query($zapytanie,["login"=>$uzytkownik]);
   $row = $result->fetchALL(\PDO::FETCH_ASSOC);
   $id_konta=$row[0]['id_konta'];
    $imie=$row[0]['imie'];
    $nazwisko=$row[0]['nazwisko'];
    $nr_tel=$row[0]['nr_tel'];
    $kod_pocztowy=$row[0]['kod_pocztowy'];
    $miasto=$row[0]['miasto'];
    $ulica=$row[0]['ulica'];
    $nr_domu=$row[0]['nr_domu'];
    $nr_lokalu=$row[0]['nr_lokalu'];
   print_r("
<form action='dane.php' method='post'>
<div class='container'>
<input value='$id_konta' type='hidden' name='id_konta' id='id_konta' required>
  <label for='imie'><b>Imie</b></label>
  <input value='$imie' type='text' placeholder='Podaj imie' name='imie' id='imie' required>

  <label for='nazwisko'><b>Nazwisko</b></label>
  <input value='$nazwisko' type='text' placeholder='Podaj nazwisko' name='nazwisko' id='nazwisko' required>

  <label for='telefon'><b>Nr telefonu</b></label>
  <input value='$nr_tel' type='number' placeholder='Podaj telefon' name='telefon' id='telefon' required>  
  
  <label for='kod'><b>Kod pocztowy</b></label>
  <input value='$kod_pocztowy' type='text' pattern='[0-9]{2}-[0-9]{3}' placeholder='Podaj kod pocztowy' name='kod' id='kod' required>

  <label for='miasto'><b>Miasto</b></label>
  <input value='$miasto' type='text' placeholder='Podaj miasto' name='miasto' id='miasto' required>

  <label for='ulica'><b>Ulica</b></label>
  <input value='$ulica' type='text' placeholder='Podaj ulice' name='ulica' id='ulica' required>

  <label for='nr_domu'><b>Numer domu</b></label>
  <input value='$nr_domu' type='text' maxlength='5' placeholder='Podaj numer domu' name='nr_domu' id='nr_domu' required>

  <label for='nr_lokalu'><b>Numer lokalu</b></label>
  <input value='$nr_lokalu' type='text' maxlength='5' placeholder='Podaj numer lokalu' name='nr_lokalu' id='nr_lokalu' >
  <hr>
  

  <button type='submit' class='registerbtn'>Zapisz</button>
</div>


</form>
    ");
    ?>
    
    
    



      
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