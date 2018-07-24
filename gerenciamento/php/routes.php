<?php

$routes = array();

$routes[""] = (object) array(
    "view"=>"home"
);
$routes["clientes"] = (object) array(
    "view"=>"clientes"
);
$routes["jobs"] = (object) array(
    "view"=>"jobs"
);

$routes["email"] = (object) array(
	"isAjax" => true,
	"data" => "php/controllers/email.php",

	// [ Config do email ]
	"email_template" => "contato",
	"from" => "atendimento@grupow.com.br",
	"to" => "domingos.dev@gmail.com",
	"subject" => "Contato através do site do GrupoW",
	"reply" => false,
	"reply_template" => "contato-resposta",
	"reply_from" => "",
	"reply_email" => ""

);


return $routes;