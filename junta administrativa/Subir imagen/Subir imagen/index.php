<?php
// Archivo de conexion con la base de datos
require_once 'Conexion.php';
// Condicional para validar el borrado de la imagen
if(isset($_GET['delete_id']))
{
	// Selecciona imagen a borrar
	$stmt_select = $DB_con->prepare('SELECT Imagen_Img FROM tbl_imagenes WHERE Imagen_ID =:uid');
	$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
	$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
	// Ruta de la imagen
	unlink("imagenes/".$imgRow['Imagen_Img']);
	
	// Consulta para eliminar el registro de la base de datos
	$stmt_delete = $DB_con->prepare('DELETE FROM tbl_imagenes WHERE Imagen_ID =:uid');
	$stmt_delete->bindParam(':uid',$_GET['delete_id']);
	$stmt_delete->execute();
	// Redireccioa al inicio
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=yes" />
<title>acueducto</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Agrega esto en el elemento head de tu HTML -->



<script src="bootstrap/js/jquery.min.js"></script>
</head>

<body>
	

  <div class="container">
   
  </div>
</div>
<div class="container">
  <div class="page-header">
   <center> <h1 class="h2">Nuestra junta  Administradora.</h1></center>
		
	
 
	
	

</div>
  <br />
  <p>

De conformidad con lo dispuesto en el artículo séptimo del Acuerdo No. 6 de 1995 del Concejo de Bogotá D.C. y en el artículo séptimo del Marco Estatutario de la Empresa (Acuerdo 5 de 2019), la dirección y administración de la Empresa está a cargo de la Junta Directiva y del Gerente General.

La Junta Directiva está compuesta por nueve (9) miembros escogidos y designados por el Alcalde Mayor de Bogotá D.C. y tiene a su cargo atribuciones relacionadas con el establecimiento del norte estratégico de la Empresa, con la definición de políticas en materia de gobernabilidad, con la definición de asuntos de talento humano, de gestión financiera, de control y supervisión de la entidad.

Actualmente la composición de la Junta Directiva se encuentra establecida en el Decreto Distrital 158 de abril 28 de 2021 expedido por la Alcaldesa Mayor de Bogotá D.C. y frente a su remuneración la norma vigente es el Decreto Distrital No. 082 de 2022.



</p>
  <div class="row">
    <?php
	
	$stmt = $DB_con->prepare('SELECT Imagen_ID, Imagen_Marca, Imagen_Tipo, Imagen_Img FROM tbl_imagenes ORDER BY Imagen_ID DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>




    <div class="col-sm-3"  >
    <hr>
	
      <center><img src="imagenes/<?php echo $row['Imagen_Img']; ?>" class="img-rounded"  style="max-width:50%"
   
    
   "/></center>
	  <center><h6 style="max-width:100%" ><strong>perfil</strong></h6>
	<p class="page-header" style="max-width:50%"><?php echo $Imagen_Marca."&nbsp;/&nbsp;".$Imagen_Tipo; ?>  </p></center>

	

    </div>
    <?php
		}
	}
	else
	{
		?>
    <div class="col-sm-12">
      <div class="alert alert-warning"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Datos no encontrados ... </div>
    </div>
    <?php
	}
	
?>
 
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>