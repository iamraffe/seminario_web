$(document).ready(function(){
    $("#submit").click(function(){
        var nombre = $("#nombre").val();
        var primer_apellido = $("#primer_apellido").val();
        var segundo_apellido = $("#segundo_apellido").val();
        var ciudad = $("#ciudad").val();
        var centro = $("#centro").val();
        var cargo = $("#cargo").val();
        var email = $("#email").val();
        var telefono = $("#telefono").val();
        var telefono_secundario = $("#telefono_secundario").val();

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'nombre='+ nombre +  + '&primer_apellido='+ primer_apellido + '&segundo_apellido='+ segundo_apellido +'&ciudad='+ ciudad +'&centro='+ centro +'&cargo='+ cargo +'&email='+ email +'&email='+ email +'&telefono='+ telefono +'&telefono_secundario='+ telefono_secundario;
        if(nombre==''||email==''|| primer_apellido==''|| segundo_apellido==''||ciudad==''|| centro==''|| cargo=='' ||email==''|| telefono=='')
        {
            alert("Por favor, rellene todos los campos");
        }
        else
        {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "add_entry.php",
                data: dataString,
                cache: false,
                success: function(result){
                    alert(result);
                }
            });
        }
    return false;
    });
});