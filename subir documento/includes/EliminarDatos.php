
<?php
      include 'db.php';

    $Id = $_REQUEST['id'];
    $sql = "DELETE FROM documento WHERE id='$Id'";

    $resultado = mysqli_query($conexion, $sql);
    if ($resultado === TRUE) {
      
      header('index.php');
    }

?>