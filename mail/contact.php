<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "jeanclaude.dev@outlook.pt"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "Foi recebida uma nova mensagem do formulário de contacto do Portfolio.\n\n"."Segue os detalhes:\n\nNome: $name\n\n\nEmail: $email\n\nAssunto: $m_subject\n\nMenssagem: $message";
$header = "De: $email";
$header .= "Responder: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
