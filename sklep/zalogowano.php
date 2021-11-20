<?php
$login=$_POST['login'];
$haslo=$_POST['haslo'];
$host = 'ct8.pl';
$dbname = 'm24206_pracownicy';
$user = 'm24206_zadanie';
$pass = 'Zadanie123';
$pomocnicza=0;
try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
    $pdo->query('SET NAMES utf8');
    
    $stmt = $pdo->query("SELECT * FROM konta");
    $result = $stmt->fetchALL(\PDO::FETCH_ASSOC);

    foreach ($result as $row){
if($login==$row['login']&&$haslo==$row['haslo'])
{
    $pomocnicza=1;
    break;
}

    }
    if($pomocnicza==1)
    {
        echo'zalogowano';
    }
    else
    {
        echo'nie zalogowano';
    }
} catch (PDOException $e) {
    echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    exit();
}
?>