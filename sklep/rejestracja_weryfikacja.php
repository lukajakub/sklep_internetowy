<?php
require_once 'connection.php';
class Rejestracja
{
    private $connection;
    public function __construct()
    {
        $this->connection= new Connection();
    }
 private function wyslijmail($email,$token){
    $to      = $email;

$subject = 'Weryfikacja';

$message = 'Aby zarejestrować się na stronie kliknij w link aktywacyjny: https://dre231.ct8.pl/sklep/aktywacja.php?token='.$token;



mail($to, $subject, $message);  
 }

    public function zarejestruj($email,$login,$haslo,$imie,$nazwisko,$telefon,$kod,$miasto,$ulica,$nr_domu,$nr_lokalu){
        $token=sha1(microtime(true));
        
        $HasloHash =   password_hash("$haslo", PASSWORD_DEFAULT);
        $zapytanie1 = "INSERT INTO konta(id_uprawnienia,`login`,haslo) VALUES (3,'$login','$HasloHash');";
        $this->connection->query($zapytanie1,[]);
        $id_konta=$this->connection->getpdo()->lastInsertId();
        $zapytanie="INSERT INTO klienci(imie,nazwisko,nr_tel,e_mail,kod_pocztowy,miasto,ulica,nr_domu,nr_lokalu,id_konta,token) VALUES ('$imie','$nazwisko','$telefon','$email','$kod','$miasto','$ulica','$nr_domu','$nr_lokalu','$id_konta','$token');";
        $this->connection->query($zapytanie,[]);
       
        $this->wyslijmail($token,$email);
    }
    public function zaloguj($login,$haslo)
    {
        $zapytanie="SELECT `login`,haslo FROM konta WHERE `login`= :login ";
       $result=$this->connection->query($zapytanie,["login"=>$login]);
       var_dump($result);
       $row = $result->fetchALL(\PDO::FETCH_ASSOC);
      print_r($row);
       if(empty($row))
       {
         
           return false;
       }
      var_dump($haslo,$row[0]['haslo']);
       if (password_verify($haslo,$row[0]['haslo']) == true)
       {
           return true;
       }
    } 
    public function aktualizacja($imie,$nazwisko,$telefon,$kod,$miasto,$ulica,$nr_domu,$nr_lokalu,$id_konta)
    {
        $zapytanie= "UPDATE klienci SET imie='$imie',nazwisko='$nazwisko',nr_tel='$telefon',kod_pocztowy='$kod',miasto='$miasto',ulica='$ulica',nr_domu='$nr_domu',nr_lokalu='$nr_lokalu' WHERE id_konta=$id_konta";
        
        $this->connection->query($zapytanie,[]);
    }
    public function dodaj_pracownika($email,$login,$haslo,$imie,$nazwisko){
        
        
        $HasloHash =   password_hash("$haslo", PASSWORD_DEFAULT);
        $zapytanie1 = "INSERT INTO konta(id_uprawnienia,`login`,haslo) VALUES (2,'$login','$HasloHash');";
        $this->connection->query($zapytanie1,[]);
        $id_konta=$this->connection->getpdo()->lastInsertId();
        $zapytanie="INSERT INTO pracownicy(imie,nazwisko,id_konta,email) VALUES ('$imie','$nazwisko','$id_konta','$email');";
        if($this->connection->query($zapytanie,[]))
       {
           return true;
       }
       return true;
        
    }
}
?>
