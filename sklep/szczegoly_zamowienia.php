<?php
include 'navbar.php';
include 'connection.php';
$connection= new Connection();
if(isset($_GET['id_zamowienia']))
{
    $id_zamowienia=$_GET['id_zamowienia'];
    $zapytanie="SELECT * FROM zamowienia_produkt INNER JOIN produkty ON produkty.id_produktu=zamowienia_produkt.id_produktu WHERE id_zamowienia=$id_zamowienia";
   
    $result=$connection->query($zapytanie,[]);
    $rows=$result->fetchALL(\PDO::FETCH_ASSOC);
    print_r("
    <h2>Szczegóły zamówienia nr: $id_zamowienia</h2>
    <table class=table>
    <tr>
    <th scope='col'>Nazwa produktu</th>
    <th scope='col'>Ilość</th>
    <th scope='col'>Cena</th>
    </tr>
    ");

    foreach($rows as $row)
    {
        $nazwa_produktu=$row['nazwa_produktu'];
        $ilosc=$row['ilosc'];
        $cena=$row['cena']*$ilosc;

        print_r("
        <tr>
        <td scope='col'>$nazwa_produktu</td>
        <td scope='col'>$ilosc</td>
        <td scope='col'>$cena</td>
        </tr>
        "); 

    }
    print_r("</table>");

}
print_r("<a class='btn btn-primary' href='lista_zamowien.php' role='button'>Powrót</a>");
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
</html>