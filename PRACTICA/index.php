<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESTUDIANTE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<script>
    function confirmacion(){
        var respuesta = confirm("¿confirma que desea borrar el registro?");
    if(respuesta == true){
        return true;
    }else {
    return false;
    }
    }
</script>
<body>
    <br>
    <div class="container">
        <h1 class="text-center" style="background-color: black; color:white; border-radius: 5px;">LISTADO DE PRODUCTOS</h1>
    </div>
    <br>
    <div class="container">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id_estudiante</th>
                    <th scope="col">nombre_apellido</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Email</th>
                    <th scope="col">id_docente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Profesion</th>
                    <th scope="col">id_Programa</th>
                    <th scope="col">Nombre_Programa</th>
                    <th scope="col">Duracion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conexio.php';

                $sql = $conn->query("SELECT * FROM estudiante
                        INNER JOIN docente ON estudiante.id = docente.id
                        INNER JOIN programa ON estudiante.id = programa.id
                    ");

                while ($resultado = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <th scope="row"><?php echo $resultado['id']?></th>
                        <th scope="row"><?php echo $resultado['Nombre_Apellido']?></th>
                        <th scope="row"><?php echo $resultado['Edad']?></th>
                        <th scope="row"><?php echo $resultado['Email']?></th>
                        <th scope="row"><?php echo $resultado['id']?></th>
                        <th scope="row"><?php echo $resultado['Nombre']?></th>
                        <th scope="row"><?php echo $resultado['Email']?></th>
                        <th scope="row"><?php echo $resultado['Profesion']?></th>
                        <th scope="row"><?php echo $resultado['id']?></th>
                        <th scope="row"><?php echo $resultado['Nombre_Programa']?></th>
                        <th scope="row"><?php echo $resultado['Duracion']?></th>
                        
                       
                        <th>
                            <a href="EditarForm.php?Id=<?php echo $resultado['IdProducto']?>" class="btn btn-warning">Editar</a>
                            <a href="EliminarDatos.php?Id=<?php echo $resultado['IdProducto']?>" class="btn btn-danger" onclick="return confirmacion()">Eliminar</a>
                        </th>
                    </tr>

                <?php
                }
                ?>


            </tbody>
        </table>
        <div class="container">
            <a href="agregardatos.php" class="btn btn-success">Agregar Producto</a>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>