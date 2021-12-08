<?php
include 'navbar.php';
include 'connection.php';
include 'towary.php';
$connection= new Connection();
if(isset($_POST['usun']))
{
    $id_produkty_zdjecia=$_POST['id_produkty_zdjecia'];
    $zapytanie="DELETE FROM produkty_zdjecia WHERE id_produkty_zdjecia=$id_produkty_zdjecia";
    $result = $connection->query($zapytanie,[]);
}
if(isset($_POST['glowne']))
{
    $id_produkty_zdjecia=$_POST['id_produkty_zdjecia'];
    $id_produktu=$_POST['id_produktu'];
    $zapytanie="UPDATE produkty SET zdjecie_glowne=$id_produkty_zdjecia WHERE id_produktu=$id_produktu";
    $result = $connection->query($zapytanie,[]);
}
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
    $opis=$row[0]['opis'];
    $ilosc=$row[0]['ilosc'];

    if(

        !isset($_POST["nazwa_produktu"]) 
         || ($_POST["nazwa_produktu"] == "") 
         ||(is_numeric($_POST["nazwa_produktu"]))
    
         ||!isset($_POST["cena"]) 
        ||($_POST["cena"] == "") 
        
    
        ||!isset($_POST["producent"]) 
        ||($_POST["producent"] == "") 
        ||(is_numeric($_POST["producent"]))
    
        ||!isset($_POST["ilosc"]) 
        ||($_POST["ilosc"] == "") 
       
    
      )
    
    {
    echo 'nie wchodze';
    
    }
    else
    {
       echo $_POST['selKategoria'];
        $nazwa_produktu=$_POST["nazwa_produktu"];
        $selKategoria=$_POST["selKategoria"];
        
            $id_produktu=$_POST["id_produktu"];
        
            $cena = $_POST["cena"];
            $producent = $_POST["producent"];
            $opis = $_POST["opis"];
            $ilosc = $_POST["ilosc"];
        echo 'wchodze';    
        (new Towary())->edycja_produktu($id_produktu,$selKategoria,$nazwa_produktu,$cena,$producent,$opis,$ilosc);

    }
}
?>
<div class="row justify-content-center">
    <div class=" col-md-6 item border">
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
 
  <label for='opis'><b>Opis</b></label>
  <input value='$opis' type='text' name='opis' id='opis' required>
  
  <label for='ilosc'><b>Ilośc</b></label>
  <input value='$ilosc' type='number' name='ilosc' id='ilosc' required>

  <button type='submit' class='registerbtn'>Edytuj</button>
</div>


</form>
");
?>


    </div>
    <div class=" col-md-4 item border">
    <div id="content">
  
  <form method="POST" 
        action="upload.php" 
        enctype="multipart/form-data">
      <input type="file" 
         
      name="uploadfile" 
             value="" />
             <?php

             
             echo "<input value='$id_produktu' type='hidden' name='id_produktu' id='id_produktu' required>"
             ?>
      <div>
          <button type="submit"
                  name="upload">
            UPLOAD
          </button>
      </div>

  </form>
</div>
<div >
<?php
$zapytanie="SELECT * FROM produkty_zdjecia WHERE id_produktu=$id_produktu";
$result=$connection->query($zapytanie,[]);
$rows = $result->fetchALL(\PDO::FETCH_ASSOC);
foreach($rows as $row)
{
    $lokalizacja=$row['lokalizacja'];
    $id_produkty_zdjecia=$row['id_produkty_zdjecia'];
    
    
    print_r( "
    
    <form  method='POST' 
    action='edycja_produktu.php' >

    <img style='max-height:250px; max-width:250px;' src='images/$lokalizacja' alt='zdjecie'>
  
     
  
        
       

         
    <input value='$id_produktu' type='hidden' name='id_produktu' id='id_produktu' required>
    <input value='$id_produkty_zdjecia' type='hidden' name='id_produkty_zdjecia' id='id_produkty_zdjecia' required>
  
  <button class='btn btn-danger' type='submit'
  name='usun'>
Usuń
</button>
<button type='submit'
  name='glowne'>
Ustaw jako zdjęcie główne
</button>
 

</form>");

   
    
}
?>
</div>
</div>
