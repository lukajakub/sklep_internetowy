<?php
require_once 'connection.php';
class Towary
{
    private $connection;
    public function __construct()
    {
        $this->connection= new Connection();
    }
 public function edycja_produktu($id_produktu,$id_kategorii,$nazwa_produktu,$cena,$producent,$opis,$ilosc)
 {
     $zapytanie="UPDATE produkty SET id_kategorii=$id_kategorii,nazwa_produktu='$nazwa_produktu',cena=$cena,producent='$producent',opis='$opis',ilosc=$ilosc WHERE id_produktu=$id_produktu";
    $this->connection->query($zapytanie,[]);


 }
public function dodawanie_produktu($id_kategorii,$nazwa_produktu,$cena,$producent,$opis,$ilosc,$filename)
{
    $zapytanie="INSERT INTO produkty (id_kategorii,nazwa_produktu,cena,producent,opis,ilosc) VALUES ($id_kategorii,'$nazwa_produktu',$cena,'$producent','$opis',$ilosc)";
    
    $this->connection->query($zapytanie,[]);
    $id_produktu=$this->connection->getpdo()->lastInsertId();
    $sql = "INSERT INTO produkty_zdjecia (lokalizacja,id_produktu) VALUES ('$filename','$id_produktu')";
    $this->connection->query($sql,[]);
}
}
?>
