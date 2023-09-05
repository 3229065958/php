<?php

include 'Conexion.php';

$Nombre_Apellido = $_POST['Nombre_Apellido'];
$Edad = $_POST['Edad'];
$Email = $_POST['Email'];
$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Profesion = $_POST['Profesion'];
$Nombre_Programa = $_POST['Nombre_Programa'];
$Duracion = $_POST['Duracion'];




$sql = "INSERT INTO estudiante(Nombre_Apellido, Edad, Email,Nombre, Email, Profesion, Nombre_Programa, Duracion ) VALUES('$Nombre_Apellido','$Edad','$Email','$Nombre','$Email','$Profesion','$Nombre_Programa','$Duracion')";


$resultado = mysqli_query($conn, $sql);

if ($resultado === TRUE) {
    header("location:index.php");
} else {
    echo "Datos NO insertados";
}