<?php
$page = 0;
//include config
//require_once('config.php');
include_once('header.php');

//if not logged in redirect to login page
//if(!$user->is_logged_in()){ header('Location: login.php'); }
	echo '
		<div class="table-responsive" style="overflow-x: visible;">
	        <table id="registered" class="table table-striped table-bordered table-hover">
		        <thead>
			        <tr class="headers">
			        	<th>#</th>
			            <th>Nombre</th>
			            <th>Apellidos</th>
			            <th>Ciudad</th>
			            <th>Centro</th>
			            <th>Cargo</th>
			            <th>Email</th>
			            <th>Telefono</th>
			            <th>Telefono (opcional)</th>
			            <th>Fecha registro</th>
			            <th>Opciones</th>
			        </tr>
			    </thead>
			    <tfoot>
			        <tr class="headers">
			        	<th>#</th>
			            <th>Nombre</th>
			            <th>Apellidos</th>
			            <th>Ciudad</th>
			            <th>Centro</th>
			            <th>Cargo</th>
			            <th>Email</th>
			            <th>Telefono</th>
			            <th>Telefono (opcional)</th>
			            <th>Fecha registro</th>
			            <th>Opciones</th>
			        </tr>
			    </tfoot>
			    <tbody id="results">
			    	'
						. show_registered(get_all_registered()).'           
					
				</tbody>
            </table>
        </div>';	
?>	
</div>
<script>
$(document).ready(function() {
    $('#registered').dataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No existen coincidencias",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Tabla vacia",
            "infoFiltered": "(filtrado entre _MAX_ posibles registros)",
            "search": "Buscar",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        }
    });
} );
</script>
</body>
</html>
