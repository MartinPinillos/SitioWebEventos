<?php 

    include("conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM Eventos WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Fallo al eliminar registro");
        }

        $_SESSION['message'] = 'Evento removido';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
?>