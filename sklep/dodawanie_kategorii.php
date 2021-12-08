<?php
include 'navbar.php';
include 'connection.php';
$connection= new Connection();
if(isset($_POST['nazwa_kategorii']))
{
    $nazwa_kategorii=$_POST['nazwa_kategorii'];
    $zapytanie="INSERT INTO kategorie (nazwa_kategorii) VALUES ('$nazwa_kategorii')";
    
    $result= $connection->query($zapytanie,[]);
    print_r("<div class='alert alert-success' role='alert'>
  Dodano kategorię
</div>");
}
?>

<form action="dodawanie_kategorii.php" method="post">
  <div class="container">
    <label for="nazwa_kategorii"><b>Nazwa kategorii</b></label>
    <input type="text" placeholder="nazwa kategorii" name="nazwa_kategorii" required>

    
        
    <button type="submit">Dodaj</button>
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