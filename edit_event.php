<?php 

    include("conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM Eventos WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $event_title = $row['event_title'];
            $event_descr = $row['event_descr'];
          
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $event_title = $_POST['event_title'];
        $event_descr = $_POST['event_descr'];

        $query = " UPDATE Eventos set event_title = '$event_title', event_descr = '$event_descr' WHERE id=$id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Evento actualizado';
        $_SESSION['message_type'] = 'info';
        header('Location: index.php');
    }

?>
<?php include("Includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_event.php?id=<?php echo $_GET['id']; ?>" method ="POST">
                    <div class="form-group">
                        <input type="text" name="event_title" value ="<?php echo $event_title; ?>"
                        class="form-control" placeholder="Actualizar Evento">
                    </div>
                    <div class="form-group">
                        <textarea name="event_descr" rows="2" class="form-control" placeholder="Actualizar Descripcion">
                        <?php echo $event_descr; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                    Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("Includes/footer.php"); ?>