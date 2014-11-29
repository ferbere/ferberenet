<?
$file = fopen("fichero.bin", "r"); 
$contenido = fread($file, filesize("fichero.bin"); 
$encoded_attach = chunk_split(base64_encode($contenido)); 
fclose($file); 
 
$asunto="Enviar un correo con fichero adjunto"; 
$email="usuario@cuenta.com"; 
$mensaje="Comentario del email"; 
 
$cabeceras = "From: dipro <usuario@cuenta.com>\n"; 
$cabeceras .= "Reply-To: $email\n"; 
$cabeceras .= "MIME-version: 1.0\n"; 
$cabeceras .= "Content-type: multipart/mixed; "; 
$cabeceras .= "boundary=\"Message-Boundary\"\n"; 
$cabeceras .= "Content-transfer-encoding: 7BIT\n"; 
$cabeceras .= "X-attachments: fichero.bin"; 
 
$body_top = "--Message-Boundary\n"; 
$body_top .= "Content-type: text/plain; charset=US-ASCII\n"; 
$body_top .= "Content-transfer-encoding: 7BIT\n"; 
$body_top .= "Content-description: Mail message body\n\n"; 
 
$cuerpo = $body_top.$mensaje; 
 
$nombref="fichero.bin" 
$cuerpo .= "\n\n--Message-Boundary\n"; 
$cuerpo .= "Content-type: Binary; name=\"$nombref\"\n"; 
$cuerpo .= "Content-Transfer-Encoding: BASE64\n"; 
$cuerpo .= "Content-disposition: attachment; filename=\"$nombref\"\n\n"; 
$cuerpo .= "$encoded_attach\n"; 
$cuerpo .= "--Message-Boundary--\n"; 
 
mail($email, $asunto, $cuerpo, $cabeceras); 
?>