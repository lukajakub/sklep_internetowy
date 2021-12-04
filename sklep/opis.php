<?php
include 'navbar.php';
include 'connection.php';
include 'towary.php';
$connection= new Connection();
if(isset($_GET['id_produktu']))
{
    $id_produktu=$_GET['id_produktu'];
$zapytanie="SELECT * FROM produkty WHERE id_produktu=$id_produktu";
$result = $connection->query($zapytanie,[]);
   $row = $result->fetchALL(\PDO::FETCH_ASSOC);
    $nazwa_produktu=$row[0]['nazwa_produktu'];
    $id_kategorii=$row[0]['id_kategorii'];
    $cena=$row[0]['cena'];
    $producent=$row[0]['producent'];
    $opis=$row[0]['opis'];
    $ilosc=$row[0]['ilosc'];

    
}
?>
<div class="row justify-content-center">
    <div class=" col-md-6 item border">
<?php
    print_r("
<div class='container'>
<input disabled value='$id_produktu' type='hidden' name='id_produktu' id='id_produktu' required>

  <label for='nazwa_produktu'><b>Nazwa produktu</b></label>
  <input disabled value='$nazwa_produktu' type='text' name='nazwa_produktu' id='nazwa_produktu' required>

 

  
      ");
      $zapytanie="SELECT nazwa_kategorii FROM kategorie WHERE id_kategorii=$id_kategorii";
      $result = $connection->query($zapytanie,[]);
      $rows = $result->fetchALL(\PDO::FETCH_ASSOC);
     $kategoria=$rows[0]['nazwa_kategorii'];
print_r("
<label for='kategoria'>Kategoria</label>
<input disabled value='$kategoria' type='text' name='kategoria' id='kategoria' required>
  <label for='cena'><b>Cena</b></label>
  <input disabled value='$cena' type='number' name='cena' id='cena' step='0.01' required>

  <label for='producent'><b>Producent</b></label>
  <input disabled value='$producent' type='text' name='producent' id='producent' required>
 
  <label for='opis'><b>Opis</b></label>
  <input disabled value='$opis' type='text' name='opis' id='opis' required>
  
  <label for='ilosc'><b>Ilośc</b></label>
  <input disabled value='$ilosc' type='number' name='ilosc' id='ilosc' required>

  
</div>



");
if(isset($_SESSION['rola']))
{


if($_SESSION['rola']=='klient')
{
    print_r("<form action='oferta.php' method='post'>
    <label for='ilosc'><b>Podaj ilość</b></label>
    <input type='hidden' name='id_produktu' value=$id_produktu>
    <input type='hidden' name='cena' value=$cena>
    <td> <input type='number' max=$ilosc name='ilosc' value=''> </td>
<td> <input type='submit' name='submit' value='Dodaj do koszyka'> </td>
</form>");
}
}
?>


    </div>
    
<div id="mycontainer">
<?php
$zapytanie="SELECT * FROM produkty_zdjecia WHERE id_produktu=$id_produktu";
$result=$connection->query($zapytanie,[]);
$rows = $result->fetchALL(\PDO::FETCH_ASSOC);
foreach($rows as $row)
{
    $lokalizacja=$row['lokalizacja'];
    $id_produkty_zdjecia=$row['id_produkty_zdjecia'];
    echo"<div style='max-height:250px; max-width:250px; overflow: hidden'>";
    
    echo "<img src='images/$lokalizacja' alt='zdjecie'>";
  
    echo "</div>";
    
}
?>
</div>
</div>
    </div>
</div>