<?php
include 'navbar.php';
include 'connection.php';
$connection= new Connection();

$id_konta=$_SESSION["id_konta"];
$zapytanie5="SELECT * FROM klienci WHERE id_konta=$id_konta";
$result=$connection->query($zapytanie5,[]);
$row = $result->fetchALL(\PDO::FETCH_ASSOC);
$id_klienta=$row[0]['id_klienta'];
$zapytanie6="SELECT * FROM koszyk INNER JOIN produkty ON koszyk.id_produktu=produkty.id_produktu WHERE id_klienta=$id_klienta";
$result2=$connection->query($zapytanie6,[]);
$row2=$result2->fetchALL(\PDO::FETCH_ASSOC);

if(isset($_POST['id_koszyk']))
{
    $id_koszyk=$_POST['id_koszyk'];
    $zapytanie="DELETE FROM koszyk WHERE id_koszyk=$id_koszyk";
    $connection->query($zapytanie,[]);
    echo 'Usunięto z koszyka';
    header('location: koszyk.php');
}
?>
<h2>Koszyk</h2>
<table class="table">

<tr>
    <th>Nazwa produktu</th>
    <th>Ilość</th>
    <th>Cena</th>
    <th>Usuń</th>
  </tr>
<?php
$ilosc=0;
foreach($row2 as $row)
{
    $ilosc++;
    $nazwa=$row['nazwa_produktu'];
    $kasa=$row['cena_zamowionego'];
    $ile=$row['ilosc_zamowionego'];
$id_koszyk=$row['id_koszyk'];
    echo "<tr>";

    echo"<td>$nazwa</td>";
    echo"<td>$ile</td>";
    echo"<td>$kasa</td>";
    print_r("<form action='koszyk.php' method='post'>
    <input type='hidden' name='id_koszyk' value=$id_koszyk>
    
<td> <input type='submit' name='submit' value='Usuń z koszyka'> </td>
</form>");
    echo "</tr>";
}
?>
</table>
<?php
if($ilosc>0)
{
    print_r("<form action=koszyk.php method=post>
    <input type='submit' name='submit' value='Złóż zamówienie'>
    </form>");
}
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
    <?php
if(isset($_POST['submit']))
{
    $zapytanie4="INSERT INTO zamowienia (id_klienta,data_zamowienia,realizacja,do_zaplaty) VALUES ($id_klienta,CURDATE(),'weryfikacja',0) ";
    echo $zapytanie4;
    $connection->query($zapytanie4,[]);
    $id_zamowienia=$connection->getpdo()->lastInsertId();
    $zapytanie6="SELECT * FROM koszyk INNER JOIN produkty ON koszyk.id_produktu=produkty.id_produktu WHERE id_klienta=$id_klienta";
$result2=$connection->query($zapytanie6,[]);
$row2=$result2->fetchALL(\PDO::FETCH_ASSOC);

foreach($row2 as $row)
{
    $id_produktu=$row['id_produktu'];
    $id_koszyk=$row['id_koszyk'];
    $ilosc=$row['ilosc_zamowionego'];
$zapytanie3="INSERT INTO zamowienia_produkt (id_produktu,id_zamowienia,ilosc) VALUES($id_produktu,$id_zamowienia,$ilosc)";
echo $zapytanie3;
$connection->query($zapytanie3,[]);

$zapytanie6="DELETE FROM koszyk WHERE id_koszyk=$id_koszyk";
$connection->query($zapytanie6,[]);
}
}
header('location: koszyk.php');
    ?>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>