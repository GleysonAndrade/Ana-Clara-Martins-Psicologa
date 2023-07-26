<?php 
session_start();

require_once($_SERVER["HOME"] . '/lib/vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y');
$nome = $_POST['nome'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$msg = $_POST['msg'];

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host = 'mail.agenciamyhelp.com.br';
$mail->SMTPAuth = true;
$mail->Username = 'contato@agenciamyhelp.com.br';
$mail->Password = 'contato@mhs#!';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;
$mail->setFrom('contato@agenciamyhelp.com.br', 'My Help');
$mail->addAddress('manuelabrittoacessorios@outlook.com', 'Manuela Britto');
$mail->isHTML(true);
// DEFINIÇÃO DA MENSAGEM
$mail->Subject  = "Formulário de Contato"; // Assunto da mensagem
$mail->Body .= "
<p style='color:black'>Nova mensagem do formulário:<br>Nome: $nome <br> Email: $email <br> Telefone: $tel <br> Mensagem: $msg</p>
"; // ENVIO DO EMAIL
$mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
// Exibe uma mensagem de resultado do envio (sucesso/erro)
?>