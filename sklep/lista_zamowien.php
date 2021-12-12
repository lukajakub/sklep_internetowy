<?php
include 'navbar.php';
include 'connection.php';
$connection= new Connection();
if(isset($_POST['id_zamowienia']))
{
    $id_zamowienia=$_POST['id_zamowienia'];
    $zapytanie="UPDATE zamowienia SET realizacja='zatwierdzono' WHERE id_zamowienia=$id_zamowienia";

    $connection->query($zapytanie,[]);

    $zapytanie2="SELECT * FROM zamowienia_produkt WHERE id_zamowienia=$id_zamowienia";

    $result=$connection->query($zapytanie2,[]);
    $rows=$result->fetchALL(\PDO::FETCH_ASSOC);
    foreach($rows as $row)
    {
        $ilosc_zamowionego=$row['ilosc'];
        $id_produktu=$row['id_produktu'];
        $zapytanie="UPDATE produkty SET ilosc=ilosc-$ilosc_zamowionego WHERE id_produktu=$id_produktu";
        
        $connection->query($zapytanie,[]);
    }
$zapytanie="SELECT id_klienta FROM zamowienia WHERE id_zamowienia=$id_zamowienia";
$result=$connection->query($zapytanie,[]);
$row=$result->fetchALL(\PDO::FETCH_ASSOC);
$id_klienta=$row[0]['id_klienta'];
$zapytanie5="SELECT e_mail FROM klienci WHERE id_klienta=$id_klienta";
$result=$connection->query($zapytanie5,[]);
$row=$result->fetchALL(\PDO::FETCH_ASSOC);
$e_mail=$row[0]['e_mail'];
$message="Zamówienie numer: ".$id_zamowienia." zostało przyjęte do realizacji ";
    mail($e_mail, 'Potwierdzenie zamowienia', $message);
    unset($_POST['id_zamowienia']);
}
if(isset($_POST['records-limit'])){
    $_SESSION['records-limit'] = $_POST['records-limit'];
}

$limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;
$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
$paginationStart = ($page - 1) * $limit;
if(isset($_SESSION['uzytkownik']))
{
    $id=$_SESSION['id_konta'];
    $zapytanie="SELECT id_klienta FROM klienci WHERE id_konta=$id";
    $result=$connection->query($zapytanie,[]);
    $row=$result->fetchALL(\PDO::FETCH_ASSOC);
    $id_klienta=$row[0]['id_klienta'];
    $zamowienia = $connection->query("SELECT * FROM zamowienia  INNER JOIN klienci ON klienci.id_klienta=zamowienia.id_klienta WHERE zamowienia.id_klienta=$id_klienta LIMIT $paginationStart, $limit",[])->fetchAll();
    
}

else
{
    $zamowienia = $connection->query("SELECT * FROM zamowienia  INNER JOIN klienci ON klienci.id_klienta=zamowienia.id_klienta  LIMIT $paginationStart, $limit",[])->fetchAll();  
}



// Get total records
$sql = $connection->query("SELECT count(id_zamowienia) AS id FROM zamowienia",[])->fetchAll();
$allRecrods = $sql[0]['id'];

// Calculate total pages
$totoalPages = ceil($allRecrods / $limit);

// Prev + Next
$prev = $page - 1;
$next = $page + 1;
?>


<div class="container mt-5">
        <h2 class="text-center mb-5">Lista zamówień </h2>


        <!-- Select dropdown -->
        <div class="d-flex flex-row-reverse bd-highlight mb-3">
            <form action="oferta.php" method="post">
                <select name="records-limit" id="records-limit" class="custom-select">
                    <option disabled selected>Records Limit</option>
                    <?php foreach([5,7,10,12] as $limit) : ?>
                    <option
                        <?php if(isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
                        value="<?= $limit; ?>">
                        <?= $limit; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>

        <!-- Datatable -->
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">

                    <th scope="col">Numer zamówienia</th>
                    <th scope="col">Data złożenia</th>
                    <th scope="col">Klient</th>
                    <th scope="col">Status</th>
                    <th scope="col">Do zapłaty</th>
                    <?php
if(isset($_SESSION['pracownik']))
{
   print_r("<th scope='col'>Zatwierdź</th>") ;
}
                    ?>
                   
                    

                </tr>
            </thead>

            <tbody>
                <?php foreach($zamowienia as $zamowienie): ?>
                <tr>
                    
                    
                <td ><a style="text-decoration:none; color:inherit" href="szczegoly_zamowienia.php?id_zamowienia=<?php echo $zamowienie['id_zamowienia'] ?>"><?php echo $zamowienie['id_zamowienia']; ?></a></td>
                    <td><?php echo $zamowienie['data_zamowienia']; ?></td>
                    <td><?php echo $zamowienie['imie'].' '.$zamowienie['nazwisko']; ?></td>
                    <td><?php echo $zamowienie['realizacja']; ?></td>
                    <td><?php echo $zamowienie['do_zaplaty']; ?></td>

                    <?php
                    if(isset($_SESSION['pracownik']))
                    {

                    
                    if($zamowienie['realizacja']=="weryfikacja")
                    {

                    
                    $id_zamowienia=$zamowienie['id_zamowienia'];
                    print_r("<form action='lista_zamowien.php' method='post'>
                        <input type='hidden' name='id_zamowienia' value=$id_zamowienia>
                    <td> <input type='submit' name='submit' value='Zatwierdź'> </td>
                </form>");}}
                ?>
                   
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                </li>

                <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="oferta.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>

                <li class="page-item <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#records-limit').change(function () {
                $('form').submit();
            })
        });
    </script>

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