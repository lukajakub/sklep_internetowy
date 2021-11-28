<?php
include "navbar.php";
include "rejestracja_weryfikacja.php";
if( $_SESSION["rola"]!='administrator')
{
    
}
    
    


if(

    !isset($_POST["imie"]) 
     || ($_POST["imie"] == "") 
     ||(is_numeric($_POST["imie"]))

     ||!isset($_POST["nazwisko"]) 
    ||($_POST["nazwisko"] == "") 
    ||(is_numeric($_POST["nazwisko"]))

    

  )

{


}
else
{
    $email=$_POST["email"];
    
    $login = $_POST["login"];
        $haslo = $_POST["haslo"];
        $imie = $_POST["imie"];
        $nazwisko = $_POST["nazwisko"];
        (new Rejestracja())->dodaj_pracownika($email,$login,$haslo,$imie,$nazwisko);
    {
    //   echo'<script>alert("Dodano pracownika") </script>';
    }
    
}
    ?>
    
    
    
    <form action="administrator.php" method="post">
  <div class="container">
   

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>

    <label for="login"><b>Login</b></label>
    <input type="text" placeholder="Enter Login" name="login" id="login" required>

    <label for="psw"><b>Hasło</b></label>
    <input type="password" placeholder="Enter Password" name="haslo" id="haslo" required>

    <label for="imie"><b>Imie</b></label>
    <input type="text" placeholder="Podaj imie" name="imie" id="imie" required>

    <label for="nazwisko"><b>Nazwisko</b></label>
    <input type="text" placeholder="Podaj nazwisko" name="nazwisko" id="nazwisko" required>

    <hr>
    

    <button type="submit" class="registerbtn">Dodaj pracownika</button>
  </div>
  
</form>

<div class="col">
  <table class="table">
                    <thead>
                    <tr>
                        <th>Imie</th>
                        <th>Nazwisko</th>
                        <th>E-mail</th>
                        
                    </tr>
                    </thead>
<?php

   
      
     
      {
        $connection= new Connection();
        $stmt = $connection->query("SELECT * FROM pracownicy ",[]);
        $result = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        foreach ($result as $row){
          
            echo '<tr>';         
            echo '<td>'.$row['imie'].'</td>';
            echo '<td>'.$row['nazwisko'].'</td>';
            echo '<td>'.$row['email'].'</td>';
            
            echo "<td><form  action = 'usun.php' method = 'POST'><input type='hidden' name='id_konta' value='".$row['id_konta']."'><input type = 'submit' value='Usuń'></form></td>";
            echo '</tr>';
        }
       
       
    
    }       
?>

</table>
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