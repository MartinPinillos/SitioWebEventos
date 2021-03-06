<?php include("conexion.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
        <!---Mensaje de alerta al guardar---->
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <!--muesta mensaje de conexion.php-->
                <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="save_event.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="event_title" class="form-control" placeholder=" Titulo del Evento" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="event_descr" rows="2" class="form-control" placeholder="Descripcion"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_event" value="Guardar">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Evento</th>
                        <th>Descripcion</th>
                        <th>Fecha Creacion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM  Eventos";
                    $result_event = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_event)){ ?>
                        <tr>
                            <td><?php echo $row['event_title'] ?></td>
                            <td><?php echo $row['event_descr'] ?></td>
                            <td><?php echo $row['create_date'] ?></td>
                            <td>
                                <a href="edit_event.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i></a>
                                <a href="delete_event.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>