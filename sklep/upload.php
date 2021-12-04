<?php
session_start();
include 'connection.php';
  $msg = "";
  echo 'wchodze';
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "images/".$filename;
          
    
  $id_produktu=$_POST['id_produktu'];
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO produkty_zdjecia (lokalizacja,id_produktu) VALUES ('$filename','$id_produktu')";
  
        // Execute query
        $conn=new Connection();
        $conn->query($sql,[]);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      header('location: pracownik.php');
  }
 
?>