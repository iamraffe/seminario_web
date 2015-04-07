<?php 
require_once("includes/connection.php");
require_once("includes/functions.php");
require_once('includes/class.phpmailer.php');

function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}

if(isset($_POST['email'])) {
    $Error = false;
    $ErrorMessage = "";
    $body = "";
    //NAME VALIDATION ----------------
    if(empty($_POST['nombre'])){
        $ErrorMessage = "El nombre es requerido.";
        $Error = true;
    }
    else{
        $nombre = $_POST['nombre'];
        if (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
            $ErrorMessage = "Solo se permiten letras y espacios en blanco.";
            $Error = true;
        }
        else{
            $body .= "<p style=\"text-align: justify;\">Nombre: ";
            $body .= clean_string($nombre) ."</p>";
        }
    }
	
    //LAST NAME VALIDATION ----------------
    if(empty($_POST['primer_apellido']) || empty($_POST['segundo_apellido'])){
        $ErrorMessage = "Los apellidos son requeridos.";
        $Error = true;
    }
    else{
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        if (!preg_match("/^[a-zA-Z ]*$/", $primer_apellido) || !preg_match("/^[a-zA-Z ]*$/", $segundo_apellido)) {
            $ErrorMessage = "Solo se permiten letras y espacios en blanco.";
            $Error = true;
        }
        else{
            $body .= "<p style=\"text-align: justify;\">Apellidos: ";
            $body .= clean_string($primer_apellido) ." ". clean_string($segundo_apellido) ."</p>";
        }
    }

    //CITY VALIDATION ----------------
    if(empty($_POST['ciudad'])){
        $ErrorMessage = "La ciudad es requerida.";
        $Error = true;
    }
    else{
        $ciudad = $_POST['ciudad'];
        if (!preg_match("/^[a-zA-Z ]*$/", $ciudad)) {
            $ErrorMessage = "Solo se permiten letras y espacios en blanco.";
            $Error = true;
        }
        else{
            $body .= "<p style=\"text-align: justify;\">Ciudad: ";
            $body .= clean_string($ciudad) ."</p>";
        }
    } 

    //HEALTH CENTER VALIDATION ----------------
    if(empty($_POST['centro'])){
        $ErrorMessage = "El centro de salud es requerido.";
        $Error = true;
    }
    else{
        $centro = $_POST['centro'];
        if (!preg_match("/^[a-zA-Z ]*$/", $centro)) {
            $ErrorMessage = "Solo se permiten letras y espacios en blanco.";
            $Error = true;
        }
        else{
            $body .= "<p style=\"text-align: justify;\">Centro de salud: ";
            $body .= clean_string($centro) ."</p>";
        }
    } 
    
    //POST VALIDATION ----------------
    if(empty($_POST['cargo'])){
        $ErrorMessage = "El cargo es requerido.";
        $Error = true;
    }
    else{
        $cargo = $_POST['cargo'];
        if (!preg_match("/^[a-zA-Z ]*$/", $cargo)) {
            $ErrorMessage = "Solo se permiten letras y espacios en blanco.";
            $Error = true;
        }
        else{
            $body .= "<p style=\"text-align: justify;\">Cargo: ";
            $body .= clean_string($cargo) ."</p>";
        }
    } 

    //EMAIL VALIDATION --------------
    if(empty($_POST['email'])){
        $ErrorMessage = "El correo electrónico es requerido.";
        $Error = true;
    }
    else{
        $email = $_POST['email'];
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            $ErrorMessage = "Formato de correo electrónico invalido.";
            $Error = true;
        }
        else{
            $body .= "<p style=\"text-align: justify;\">Correo Eléctronico: ";
            $body .= clean_string($email) ."</p>";
        }
    }


    //PHONE VALIDATION ----------------
    if(empty($_POST['telefono'])){
        $ErrorMessage = "El telefono es requerido.";
        $Error = true;
    }
    else{
        $telefono = $_POST['telefono'];
        $body .= "<p style=\"text-align: justify;\">Telefono: ";
        $body .= clean_string($telefono) ."</p>";
        
    } 

    //SECONDARY PHONE IS OPTIONAL, NO VALIDATION -----------------
    if(isset($_POST['telefono_secundario'])){
        $telefono_secundario = $_POST['telefono_secundario']; 
        $body .= "<p style=\"text-align: justify;\">Teléfono secundario: ";
        $body .= clean_string($telefono_secundario) ."</p>";
    }

    $subject = "Nuevo registro añadido en la base de datos.";

    $emailTo = array("raffe90@gmail.com", "r.ramirez@fundaseth.es");

    if($Error){
        //echo "<script>alert('Error de validación: " . $ErrorMessage ."')</script>";
        echo 'Error de validación: '. $ErrorMessage ;
    }
    else{
        insert_into_database($nombre, $primer_apellido, $segundo_apellido, $ciudad, $centro, $cargo, $email, $telefono, $telefono_secundario);
        
        // create email headers
        
        $headers = 'From: '.$email."\r\n".
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
        $mail = new PHPMailer();
        $mail -> CharSet = 'UTF-8';
        $mail->AddAddress($emailTo[0]);
        $mail->AddAddress($emailTo[1]);
        $mail->SetFrom($email, $nombre);
        $mail->Subject = $subject;
        $mail->MsgHTML($body);
        if(!$mail->Send()) {
          //echo "<script>alert('Mailer Error: " . $mail->ErrorInfo."')</script>";
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo 'Inscripción realizada correctamente.';
        }
    }
}

?>