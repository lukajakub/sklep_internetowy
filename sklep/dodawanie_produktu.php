<?php
include 'navbar.php';
include 'connection.php';
include 'towary.php';
$connection= new Connection();




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
       
        $nazwa_produktu=$_POST["nazwa_produktu"];
        $selKategoria=$_POST["selKategoria"];
        
            $id_produktu=$_POST["id_produktu"];
        
            $cena = $_POST["cena"];
            $producent = $_POST["producent"];
            $ilosc = $_POST["ilosc"];
            $msg = "";
            if (isset($_POST['dodaj'])) {
  echo 'dodan';
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];    
                    $folder = "images/".$filename;
                      
            
            if (move_uploaded_file($tempname, $folder))  {
                $msg = "Image uploaded successfully";
                (new Towary())->dodawanie_produktu($selKategoria,$nazwa_produktu,$cena,$producent,$ilosc,$filename);
            }else{
                $msg = "Failed to upload image";
          }     }           
        

    }

?>
<div class="row justify-content-center">
    
<?php
    print_r("<form action='dodawanie_produktu.php' enctype='multipart/form-data' method='post'>
<div class='container'>
<input  type='hidden' name='id_produktu' id='id_produktu' required>

  <label for='nazwa_produktu'><b>Nazwa produktu</b></label>
  <input type='text' name='nazwa_produktu' id='nazwa_produktu' required>

  <label for='selKategoria'>Wybierz kategorię...*</label>
  <select class='form-select' id='selKategoria' name='selKategoria'>
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
  <input  type='number' name='cena' id='cena' step='0.01' required>

  <label for='producent'><b>Producent</b></label>
  <input  type='text' name='producent' id='producent' required>
 
  <label for='opis'><b>opis</b></label>
  <input  type='text' name='opis' id='opis' required>
  
  <label for='ilosc'><b>Ilośc</b></label>
  <input  type='number' name='ilosc' id='ilosc' required>

  <input type='file'  name='uploadfile'  value='' />
  <button type='submit' name='dodaj' class='registerbtn'>Dodaj</button>
</div>


</form>
");
?>


    </div>
   
    </div>
</div>