<?php
      include 'db.php';

    $Id = $_REQUEST['id'];
    $sql = "DELETE FROM documento WHERE iddocumento ='$id'";

    $query = mysqli_query($conn,$sql);
    if ($query === TRUE) {
        header("Location:index.php");
    }

?>