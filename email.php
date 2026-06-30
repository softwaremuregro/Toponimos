

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // --- Configuración SMTP (Tu configuración actual) ---
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'softwaremuregro@gmail.com';
    $mail->Password = 'bobn xhuu hhhk wept'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('softwaremuregro@gmail.com', 'Sistema Topónimos');
    $mail->addAddress($correoelectronico);

    // --- PROCESAR LA IMAGEN DE PHASER ---
    $cuerpoHtml = "";
    
    if (!empty($imagenesurl) && strpos($imagenesurl, 'data:image/png;base64') !== false) {
        // 1. Limpiar y decodificar el Base64
        $imgData = str_replace('data:image/png;base64,', '', $imagenesurl);
        $imgData = str_replace(' ', '+', $imgData);
        $decodedData = base64_decode($imgData);

        // 2. Crear un archivo temporal
        $nombreArchivo = 'diseno_' . uniqid() . '.png';
        $rutaFisica = __DIR__ . '/' . $nombreArchivo;
        file_put_contents($rutaFisica, $decodedData);

        // 3. Adjuntar al correo como imagen embebida (CID)
        $mail->addEmbeddedImage($rutaFisica, 'toponimo_final');

        $cuerpoHtml = "
            <h2>Nombre de tu topónimo: $nombretoponimo</h2>
            <p>Aquí tienes el diseño que creaste en el Museo:</p>
            <div style='border: 1px solid #ccc; padding: 10px; display: inline-block;'>
                <img src='cid:toponimo_final' width='500'>
            </div>
        ";
    } else {
        $cuerpoHtml = "<h2>Nombre de tu topónimo: $nombretoponimo</h2><p>No se pudo adjuntar la imagen.</p>";
    }

    $mail->isHTML(true);
    
    $mail->Subject = "Tu Toponimo: $nombretoponimo";
    $mail->Body    = $cuerpoHtml;

    $mail->send();

    // 4. Borrar archivo temporal para no llenar el servidor
    if (isset($rutaFisica) && file_exists($rutaFisica)) {
        unlink($rutaFisica);
    }

    header('Location: gracias.html');

} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}