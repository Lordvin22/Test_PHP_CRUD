<?php

include("db.php"); 
  if(isset($_POST['save_task'])){
    $name = $_POST['name'];
    $npc = $_POST['npc'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    $query = "INSERT INTO task(name,npc,stock,price) VALUES ('$name','$npc','$stock','$price')";
    
    //dar la cadena de conexión y la consulta
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed");
    }


    $_SESSION['message'] ='Product saved succesfully';
    $_SESSION['message_type'] ='success';

    header("Location: index.php");
  }

?>