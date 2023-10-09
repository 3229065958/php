<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'Conexion.php';
	
	if(isset($_POST['btnsave']))
	{
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];// user email
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($username)){
			$errMSG = "Ingrese la marca";
		}
		else if(empty($userjob)){
			$errMSG = "Ingrese el tipo.";
		}
		else if(empty($imgFile)){
			$errMSG = "Seleccione el archivo de imagen.";
		}
		else
		{
			$upload_dir = 'imagenes/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '1MB'
				if($imgSize < 1000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Su archivo es muy grande.";
				}
			}
			else{
				$errMSG = "Solo archivos JPG, JPEG, PNG & GIF son permitidos.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO tbl_imagenes(Imagen_Marca,Imagen_Tipo,Imagen_Img) VALUES(:uname, :ujob, :upic)');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "Nuevo registro insertado correctamente ...";
				header("refresh:3;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "Error al insertar ...";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Subir, Insertar, Actualizar, Borrar una imágen usando PHP y MySQL</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/jquery.min.js"></script>
</head>
<body>
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header"> <a class="navbar-brand" href="index.php" title='Inicio' target="_blank">Inicio</a> </div>
  </div>
</div>
<div class="container">
  <div class="page-header">
    <h1 class="h3">Agregar nueva imágen. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; Mostrar todo </a></h1>
  </div>
  <?php
	if(isset($errMSG)){
			?>
  <div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong> </div>
  <?php
	}
	else if(isset($successMSG)){
		?>
  <div class="alert alert-success"> <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong> </div>
  <?php
	}
	?>
  <form method="post" enctype="multipart/form-data" class="form-horizontal">
    <table class="table table-bordered table-responsive">
      <tr>
        <td><label class="control-label">Nombre Apellido</label></td>
        <td><input class="form-control" type="text" name="user_name" placeholder="Ingrese nombre y Apellido" value="<?php echo $username; ?>" /></td>
      </tr>
      <tr>
        <td><label class="control-label">Rool</label></td>
        <td><input class="form-control" type="text" name="user_job" placeholder="Ingrese tipo de rool" value="<?php echo $userjob; ?>" /></td>
      </tr>
      <tr>
        <td><label class="control-label">Imágen.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
      </tr>
      <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default"> <span class="glyphicon glyphicon-save"></span> &nbsp; Guardar Imagen </button></td>
      </tr>
    </table>
  </form>
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
<script src="bootstrap/js/jquery.min.js"></script>
</head>

<body>
	

  <div class="container">
   
  </div>
</div>
<div class="container">
  <div class="page-header">
   <center><h1 class="h2">Nuestra junta  Administradora.  </h1></center> 
 
	
	

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
    <div class="col-xs-3">
    <hr>
      <img src="imagenes/<?php echo $row['Imagen_Img']; ?>" class="img-rounded" width="100px" height="100px" />
	  <p class="page-header"><?php echo $Imagen_Marca."&nbsp;/&nbsp;".$Imagen_Tipo; ?></p>
      <p class="page-header"> <span> <a class="btn btn-info" href="EditarImagen.php?edit_id=<?php echo $row['Imagen_ID']; ?>" title="click for edit" onclick="return confirm('Esta seguro de editar el archivo ?')"><span class="glyphicon glyphicon-edit"></span> Editar</a> <a class="btn btn-danger" href="?delete_id=<?php echo $row['Imagen_ID']; ?>" title="click for delete" onclick="return confirm('Esta seguro de eliminar el archivo?')"><span class="glyphicon glyphicon-remove-circle"></span> Borrar</a> </span> </p>
    </div>
    <?php
		}
	}
	else
	{
		?>
    <div class="col-xs-12">
      <div class="alert alert-warning"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Datos no encontrados ... </div>
    </div>
    <?php
	}
	
?>
 
<script src="bootstrap/js/bootstrap.min.js"></script>

</div>
</div>

 



<!-- Latest compiled and minified JavaScript --> 
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>