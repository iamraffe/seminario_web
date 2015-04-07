<?php 
//require_once("../includes/connection.php");
require_once("../includes/functions.php");
?>

<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es_ES"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es_ES"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="es_ES"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="es_ES"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Responsive and mobile friendly stuff -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Rafael Ramirez Urbina (www.fundaseth.es)">
    <meta name="designer" content="Rafael Ramirez Urbina (www.fundaseth.es)">

	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
	<link rel="stylesheet" href="../css/custom.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script language="javascript" src="ajax.js"></script>

	<script>
		function edit_entry(id){

			// READ ID & DATA FROM EACH FIELD

			var nombre_id='nombre_'+id; 
			var data_nombre = 'data_nombre'+id;
			var primer_apellido_id='primer_apellido_'+ id;  
			var data_primer_apellido='data_primer_apellido'+ id; 

			var segundo_apellido_id='segundo_apellido_'+id; 
			var data_segundo_apellido = 'data_segundo_apellido'+id;

			var ciudad_id='ciudad_'+ id;  
			var data_ciudad ='data_ciudad'+ id; 

			var centro_id='centro_'+id; 
			var data_centro = 'data_centro'+id;

			var cargo_id='cargo_'+ id;  
			var data_cargo='data_cargo'+ id;  

			var email_id='email_'+id; 
			var data_email = 'data_email'+id;  

			var telefono_id='telefono_'+ id;  
			var data_telefono='data_telefono'+ id;  

			var telefono_secundario_id='telefono_secundario_'+id; 
			var data_telefono_secundario = 'data_telefono_secundario'+id;  

			// CREATE INPUT-EDITOR FOR EACH FIELD

			var nombre=document.getElementById(nombre_id).innerHTML; 
			document.getElementById(nombre_id).innerHTML = "<td><input type='text' class='form-control input-sm' id='" +data_nombre + "' value='" + nombre + "'></td>"; 
			
			var primer_apellido=document.getElementById(primer_apellido_id).innerHTML; 
			document.getElementById(primer_apellido_id).innerHTML = "<input type='text'class='form-control input-sm' id='" +data_primer_apellido + "' value='"+ primer_apellido+ "'>"; 

			var segundo_apellido=document.getElementById(segundo_apellido_id).innerHTML; 
			document.getElementById(segundo_apellido_id).innerHTML = "<td><input type='text' class='form-control input-sm' id='" +data_segundo_apellido + "' value='" + segundo_apellido + "'></td>"; 

			var ciudad=document.getElementById(ciudad_id).innerHTML; 
			document.getElementById(ciudad_id).innerHTML = "<input type='text'class='form-control input-sm' id='" +data_ciudad + "' value='"+ ciudad+ "'>"; 

			var centro=document.getElementById(centro_id).innerHTML; 
			document.getElementById(centro_id).innerHTML = "<td><input type='text' class='form-control input-sm' id='" +data_centro + "' value='" + centro + "'></td>"; 

			var cargo =document.getElementById(cargo_id).innerHTML; 
			document.getElementById(cargo_id).innerHTML = "<input type='text'class='form-control input-sm' id='" + data_cargo + "' value='"+ cargo + "'>";

			var email=document.getElementById(email_id).innerHTML; 
			document.getElementById(email_id).innerHTML = "<td><input type='text' class='form-control input-sm' id='" + data_email + "' value='" + email + "'></td>"; 

			var telefono=document.getElementById(telefono_id).innerHTML; 
			document.getElementById(telefono_id).innerHTML = "<input type='text'class='form-control input-sm' id='" + data_telefono + "' value='"+ telefono + "'>"; 

			var telefono_secundario=document.getElementById(telefono_secundario_id).innerHTML; 
			document.getElementById(telefono_secundario_id).innerHTML = "<td><input type='text' class='form-control input-sm' id='" +data_telefono_secundario + "' value='" + telefono_secundario + "'></td>"; 


			// SET EDIT BUTTON TO UPDATE

			document.getElementById('edit_'+id).title = 'Actualizar'; 
			document.getElementById('edit_'+id).setAttribute('onclick', 'ajax(' + id + ')');
			document.getElementById('edit_'+id).innerHTML =  '<span class="glyphicon glyphicon-refresh"></span>';

		} 
		function delete_entry(id){
			if(confirm("¿Esta seguro de que desea eliminar este registro? Esta acción no se puede deshacer") == true){
				var httpxml;
				try
				{
				// Firefox, Opera 8.0+, Safari
					httpxml=new XMLHttpRequest();
				}
				catch (e)
				{
					// Internet Explorer
					try
					{
						httpxml=new ActiveXObject("Msxml2.XMLHTTP");
					}
					catch (e)
					{
						try
						{
							httpxml=new ActiveXObject("Microsoft.XMLHTTP");
						}
						catch (e)
						{
							alert("Your browser does not support AJAX!");
							return false;
						}
					}
				}

				var url="delete-entry.php";
				httpxml.open("POST", url, true);
				httpxml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				httpxml.send('id='+id);
				var parent = document.getElementById("results");
				var child = document.getElementById("id_"+id);
				parent.removeChild(child);	
			}
		}
	</script>
<!--	<script  type="text/javascript" src="../js/jquery-ui-1.7.custom.min.js"></script>
	<script  type="text/javascript" src="../js/jquery-search.js"></script>-->
</head>


<body>
	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">
		   <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" 
		         data-target="#navbar-toggle">
		         <span class="sr-only">Toggle navigation</span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" rel="home" href="#"><img src="../img/oldLogo.jpg"></a>
		   </div>
		   <div class="collapse navbar-collapse" id="navbar-toggle">
		      <ul class="nav navbar-nav navbar-right">
		        <li class="<?php if($page == 0 ){echo 'active';} ?>" ><a href="index.php">Inicio</a></li>
		        <li class="<?php if($page == 1 ){echo 'active';} ?>" ><a href="export.php">Descargar</a></li>
		        <li class="<?php if($page == 2 ){echo 'active';} ?>" ><a href="../index.php">Volver a la web</a></li>
		        <li class="<?php if($page == 3 ){echo 'active';} ?>" ><a href="logout.php">Cerrar sesión</a></li>
<!--		        <form class="navbar-form navbar-left" role="search">
				    <div class="form-group">
				        <input type="text" class="form-control" id="searchData" placeholder="Search">
				    </div>
				    <button type="submit" class="btn btn-default">Submit</button>
				</form>
 				<div class="col-sm-5 pull-right">
					<form class="navbar-form" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar registro" name="srch-term" id="srch-term">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					</form>
				</div> -->
		      </ul>
		   </div>
		</div>
	</nav>		
	<div class="container">
