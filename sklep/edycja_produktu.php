<?php
include 'navbar.php';
include 'connection.php';
$connection= new Connection();
if(isset($_POST['id_produktu']))
{
    $id_produktu=$_POST['id_produktu'];
$zapytanie="SELECT * FROM produkty WHERE id_produktu=$id_produktu";
$result = $connection->query($zapytanie,[]);
   $row = $result->fetchALL(\PDO::FETCH_ASSOC);
    $nazwa_produktu=$row[0]['nazwa_produktu'];
    $id_kategorii=$row[0]['id_kategorii'];
    $cena=$row[0]['cena'];
    $producent=$row[0]['producent'];
    $ilosc=$row[0]['ilosc'];


echo $zapytanie;
}
?>
<div class="row justify-content-center">
    <div class=" col-md-2 item border">
<?php
    print_r("<form action='edycja_produktu.php' method='post'>
<div class='container'>
<input value='$id_produktu' type='hidden' name='id_produktu' id='id_produktu' required>

  <label for='nazwa_produktu'><b>Nazwa produktu</b></label>
  <input value='$nazwa_produktu' type='text' name='nazwa_produktu' id='nazwa_produktu' required>

  <label for='selKategoria'>Wybierz kategorię...*</label>
  <select id='selKategoria' name='selKategoria'>
      <option value='1'>Wybierz kategorię...</option>");
      $zapytanie="SELECT id_kategorii,nazwa_kategorii FROM kategorie";
      $result = $connection->query($zapytanie,[]);
      $rows = $result->fetchALL(\PDO::FETCH_ASSOC);
      foreach($rows as $row)
      {
          $kategoria=$row['nazwa_kategorii'];
          $id_kategorii=$row['id_kategorii'];
          print("<option value='$id_kategorii'>$kategoria</option>");
      }
print_r("
  <label for='cena'><b>Cena</b></label>
  <input value='$cena' type='number' name='cena' id='cena' step='0.01' required>

  <label for='producent'><b>Producent</b></label>
  <input value='$producent' type='text' name='producent' id='producent' required>
 
  <label for='ilosc'><b>Ilośc</b></label>
  <input value='$ilosc' type='number' name='ilosc' id='ilosc' required>
  
  

  <button type='submit' class='registerbtn'>Edytuj</button>
</div>


</form>
");
?>


    </div>
    <div class=" col-md-2 item border">
 
    </div>
</div>