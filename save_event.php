<?php

include('conexion.php');

if(isset($_POST['save_event'])){
    $event_title = $_POST['event_title'];
    $event_descr = $_POST['event_descr'];
  
    $query = "INSERT INTO eventos(event_title, event_descr) VALUES ('$event_title','$event_descr')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("Fallo al insertar el registro");
    }
    $_SESSION['message'] = 'Evento registrado';
    $_SESSION['message_type'] = 'success'; 
    header("Location: index.php");
}

?>