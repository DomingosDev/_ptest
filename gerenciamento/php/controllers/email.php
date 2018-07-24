<?php
$result = "";
$template_path = BASE_PATH . DS . 'php' . DS . 'email-templates' . DS . $email_template . '.php';

if( !isset($email_template) || !file_exists($template_path ) ) {
	http_response_code ( 500 );
	return "email template not found!";
}

ob_start();
	include $template_path ;
	$message = ob_get_contents();
ob_end_clean();

$headers = 'From: ' . $from . "\r\n" .
    		'Reply-To: '. $post['email'] . "\r\n" .
    		'X-Mailer: email.php at PHP/' . phpversion();

mail($to, $subject, $message, $headers);
$result = "Mensagem enviado com sucesso, obrigado!";

if( !isset($reply) || !$reply ) return $result;

$reply_path = BASE_PATH . DS . 'php' . DS . 'email-templates' . DS . $reply_template . '.php';
if( !file_exists($reply_path ) ) {
	http_response_code ( 500 );
	return "reply email template not found!";
}

ob_start();
	include $reply_path ;
	$message = ob_get_contents();
ob_end_clean();

$headers = 'From: ' . $reply_email . "\r\n" .
	'X-Mailer: email.php at PHP/' . phpversion();

mail($post['email'], $reply_subject, $message, $headers);

return $result;