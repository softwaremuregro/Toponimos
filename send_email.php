<?php
 //we need to get our variables first  


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];


require_once 'swiftmail/swift_required.php';
// Create the Transport

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
->setUsername('sintrafico.alerts@gmail.com')
->setPassword('expandaventures2015')
;



  // Create the Mailer using your created Transport
  $mailer = Swift_Mailer::newInstance($transport);

  // Create a message
  $message = Swift_Message::newInstance()

  // Give the message a subject
  ->setSubject('Nuevo Contacto a través de SinTráfico - Contacto')

  // Set the From address with an associative array
  ->setFrom(array('sintrafico.alerts@gmail.com' => 'SinTráfico'))

  // Set the To addresses with an associative array // 
  ->setTo(array('contacto@sintrafico.com'))

  // Give it a body
  ->setBody('SinTráfico, estos son los datos:<br><br>
  			Nombre: '.$nombre.'<br>
			  Email: '.$email.'<br>			
        Mensaje: '.$mensaje.'<br>  		
  			SinTráfico - '.date("Y").'
        ', 'text/html');

	// Send the message
	if ($mailer->send($message)) {
    echo "sent";
  }
  else {
    echo "failed";
  }


?>