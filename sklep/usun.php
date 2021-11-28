
<?php
include "connection.php";
$connection = new Connection();
$id_konta=$_POST["id_konta"];
$query1=("DELETE FROM pracownicy WHERE id_konta=$id_konta");
$query2=("DELETE FROM konta WHERE id_konta=$id_konta");
$connection->query($query1,[]);
$connection->query($query2,[]);
header('location: administrator.php');
?>