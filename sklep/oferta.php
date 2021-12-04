<?php
include 'navbar.php';
include 'connection.php';
$connection= new Connection();
if(isset($_POST['ilosc']))
{
    $id_produktu=$_POST['id_produktu'];
    $id_konta=$_SESSION["id_konta"];
$zapytanie5="SELECT * FROM klienci WHERE id_konta=$id_konta";
$result=$connection->query($zapytanie5,[]);
$row = $result->fetchALL(\PDO::FETCH_ASSOC);
$id_klienta=$row[0]['id_klienta'];
$ilosc_zamowionego=$_POST['ilosc'];
$cena_zamowionego=$ilosc_zamowionego*$_POST['cena'];
    $zapytanie="INSERT INTO koszyk (id_produktu,id_klienta,ilosc_zamowionego,cena_zamowionego) VALUES ($id_produktu,$id_klienta,$ilosc_zamowionego,$cena_zamowionego)";
    $connection->query($zapytanie,[]);
}
if(isset($_POST['records-limit'])){
    $_SESSION['records-limit'] = $_POST['records-limit'];
}

$limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;
$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
$paginationStart = ($page - 1) * $limit;
$produkty = $connection->query("SELECT * FROM produkty INNER JOIN kategorie ON produkty.id_kategorii=kategorie.id_kategorii LIMIT $paginationStart, $limit",[])->fetchAll();

// Get total records
$sql = $connection->query("SELECT count(id_produktu) AS id FROM produkty",[])->fetchAll();
$allRecrods = $sql[0]['id'];

// Calculate total pages
$totoalPages = ceil($allRecrods / $limit);

// Prev + Next
$prev = $page - 1;
$next = $page + 1;
?>


<div class="container mt-5">
        <h2 class="text-center mb-5">Simple PHP Pagination Demo</h2>


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

                    <th scope="col">Nazwa produktu</th>
                    <th scope="col">Kategoria</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Producent</th>
                    <th scope="col">Opis</th>
                    <?php  
                     if(isset($_SESSION['rola']))
                     {
 
                     
                     if($_SESSION['rola']=='klient')
                     { print_r("
<th scope='col'>Ilośc</th>
<th scope='col'>Dodaj do koszyka</th>");
                     }}
                    ?>
                    

                </tr>
            </thead>

            <tbody>
                <?php foreach($produkty as $produkt): ?>
                <tr>
                    
                    
                    <td ><a style="text-decoration:none; color:inherit" href="opis.php?id_produktu=<?php echo $produkt['id_produktu'] ?>"><?php echo $produkt['nazwa_produktu']; ?></a></td>
                    <td><?php echo $produkt['nazwa_kategorii']; ?></td>
                    <td><?php echo $produkt['cena']; ?></td>
                    <td><?php echo $produkt['producent']; ?></td>
                    <td><?php echo $produkt['opis']; ?></td>
                    
                    <?php
                    $ilosc=$produkt['ilosc'];
                    $id_produktu=$produkt['id_produktu'];
                    $cena=$produkt['cena'];
                    if(isset($_SESSION['rola']))
                    {

                    
                    if($_SESSION['rola']=='klient')
                    {
                        print_r("<form action='oferta.php' method='post'>

                        <input type='hidden' name='id_produktu' value=$id_produktu>
                        <input type='hidden' name='cena' value=$cena>
                        <td> <input type='number' max=$ilosc min=1 name='ilosc' value=1> </td>
                    <td> <input type='submit' name='submit' value='Dodaj do koszyka'> </td>
                </form>");
                    }
                }
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