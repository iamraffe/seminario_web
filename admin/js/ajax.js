function ajax(id)
{
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
	function stateChanged() 
	{
		if(httpxml.readyState==4)
		{			
			//alert(httpxml.responseText); 
			var myObject = JSON.parse(httpxml.responseText); 
			if(myObject.value.status=='success'){
				var nombre_id='nombre_'+myObject.data.id;

				var primer_apellido_id='primer_apellido_'+myObject.data.id;

				var segundo_apellido_id='segundo_apellido_'+myObject.data.id;
				
				var ciudad_id='ciudad_'+myObject.data.id;

				var centro_id='centro_'+myObject.data.id;
				
				var cargo_id='cargo_'+myObject.data.id;

				var email_id='email_'+myObject.data.id;
				
				var telefono_id='telefono_'+myObject.data.id;
				
				var telefono_secundario_id='telefono_secundario_'+myObject.data.id;				

				document.getElementById(nombre_id).innerHTML = myObject.data.nombre;

				document.getElementById(primer_apellido_id).innerHTML = myObject.data.primer_apellido;

				document.getElementById(segundo_apellido_id).innerHTML = myObject.data.segundo_apellido;

				document.getElementById(ciudad_id).innerHTML = myObject.data.ciudad;

				document.getElementById(centro_id).innerHTML = myObject.data.centro;

				document.getElementById(cargo_id).innerHTML = myObject.data.cargo;

				document.getElementById(email_id).innerHTML = myObject.data.email;

				document.getElementById(telefono_id).innerHTML = myObject.data.telefono;

				document.getElementById(telefono_secundario_id).innerHTML = myObject.data.telefono_secundario;

				document.getElementById('edit_'+id).title = 'Editar'; 

				document.getElementById('edit_'+id).setAttribute('onclick','edit_entry(' + id + ')');

				document.getElementById('edit_'+id).innerHTML = '<span class="glyphicon glyphicon-pencil"></span></a>';

				alert(myObject.value.message);

			}
			else {
				alert(myObject.value.message); 
			} 

		}
	}


	var url="display-ajax.php";

	// ESTABLISH INDEX

	var data_nombre='data_nombre'+ id;

	var data_primer_apellido='data_primer_apellido'+ id;

	var data_segundo_apellido='data_segundo_apellido'+ id;

	var data_ciudad='data_ciudad'+ id;

	var data_centro='data_centro'+ id;

	var data_cargo='data_cargo'+ id;

	var data_email='data_email'+ id;

	var data_telefono='data_telefono'+ id;

	var data_telefono_secundario='data_telefono_secundario'+ id;

	// RETRIEVE PARAMETERS VALUE

	var nombre = document.getElementById(data_nombre).value; 

	var primer_apellido = document.getElementById(data_primer_apellido).value; 

	var segundo_apellido = document.getElementById(data_segundo_apellido).value;

	var ciudad = document.getElementById(data_ciudad).value;

	var centro = document.getElementById(data_centro).value;

	var cargo = document.getElementById(data_cargo).value;

	var email = document.getElementById(data_email).value;

	var telefono = document.getElementById(data_telefono).value;

	var telefono_secundario = document.getElementById(data_telefono_secundario).value;

	var parameters="id=" + id +"&nombre=" + nombre + "&primer_apellido=" + primer_apellido + "&segundo_apellido=" + segundo_apellido + "&ciudad=" + ciudad + "&centro=" + centro + "&cargo=" + cargo + "&email=" + email + "&telefono=" + telefono+ "&telefono_secundario=" + telefono_secundario;
	
	httpxml.onreadystatechange=stateChanged;
	httpxml.open("POST", url, true);
	httpxml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	httpxml.send(parameters);

}

