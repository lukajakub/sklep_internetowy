<?php
include 'navbar.php';
include 'connection.php';
?>
<html>
<div class="row justify-content-center">
    <div class=" col-md-2 item border">
<?php
$connection= new Connection();
$query="SELECT * FROM produkty ORDER BY RAND() LIMIT 1";

$result=$connection->query($query,[]);
$row = $result->fetchALL(\PDO::FETCH_ASSOC);
echo $row[0]["nazwa_produktu"];
$id_produktu=$row[0]['id_produktu'];
$query2="SELECT zdjecie_glowne FROM produkty  WHERE id_produktu=$id_produktu  ";
$result2=$connection->query($query2,[]);
$row2 = $result2->fetchALL(\PDO::FETCH_ASSOC);
$id_produkty_zdjecia=$row2[0]['zdjecie_glowne'];
echo"<div>";
if($id_produkty_zdjecia!=0)
{
    $zapytanie2="SELECT * FROM produkty_zdjecia WHERE id_produkty_zdjecia=$id_produkty_zdjecia";
    $result3=$connection->query($zapytanie2,[]);
    $row3 = $result3->fetchALL(\PDO::FETCH_ASSOC);
    
    $lokalizacja=$row3[0]['lokalizacja'];
    echo "<img style='heigth: 250px;width: 250px;' src='images/$lokalizacja' alt='zdjecie'>";
}

echo "<a class='btn btn-primary' href='opis.php?id_produktu=$id_produktu'>Szczegóły</a>";
echo "</div>";
?>



    </div>
    <div class=" col-md-2 item border">
    <?php
$connection= new Connection();
$query="SELECT * FROM produkty ORDER BY RAND() LIMIT 1";
$result=$connection->query($query,[]);
$row = $result->fetchALL(\PDO::FETCH_ASSOC);
echo $row[0]["nazwa_produktu"];
$id_produktu=$row[0]['id_produktu'];
$query2="SELECT zdjecie_glowne FROM produkty  WHERE id_produktu=$id_produktu  ";
$result2=$connection->query($query2,[]);
$row2 = $result2->fetchALL(\PDO::FETCH_ASSOC);
$id_produkty_zdjecia=$row2[0]['zdjecie_glowne'];
echo"<div>";
if($id_produkty_zdjecia!=0)
{
    $zapytanie2="SELECT * FROM produkty_zdjecia WHERE id_produkty_zdjecia=$id_produkty_zdjecia";
    $result3=$connection->query($zapytanie2,[]);
    $row3 = $result3->fetchALL(\PDO::FETCH_ASSOC);
    
    $lokalizacja=$row3[0]['lokalizacja'];
    echo "<img style='heigth: 250px;width: 250px;' src='images/$lokalizacja' alt='zdjecie'>";
}

echo "<a class='btn btn-primary' href='opis.php?id_produktu=$id_produktu'>Szczegóły</a>";
echo "</div>";
?>

    </div>
</div>
      
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