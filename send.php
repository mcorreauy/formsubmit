<?php
// Validar que los datos han sido enviados por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Recoger los datos enviados por el formulario
	$nombre = $_POST['firstname'];
	$apellido = $_POST['lastname'];
	$email = $_POST['email'];
	$mensaje = $_POST['message'];
	
	// Validar que los campos no estén vacíos
	if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($mensaje)) {
		
		// Validar que el correo electrónico sea válido
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			
			// Enviar correo electrónico
			$para = 'mcorrea.pay-pros@outlook.com'; // Cambia esto por tu dirección de correo electrónico
			$asunto = 'Mensaje enviado desde el formulario de contacto';
			$mensaje = "Nombre: $nombre\nApellido: $apellido\nEmail: $email\nMensaje: $mensaje";
			$cabeceras = "From: $email";
			mail($para, $asunto, $mensaje, $cabeceras);
			
			// Redirigir al usuario a una página de confirmación
			header('Location: confirmation.php');
			exit;
			
		} else {
			echo 'Correo electrónico inválido.';
    }
  }
    else {
      echo 'Todos los campos son obligatorios.';
  }
}
  // Si los datos no han sido enviados por POST, mostrar un mensaje de error
  else {
  echo 'Error al enviar el formulario.';
  }
