<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GRUPOW - Softwares para internet</title>
	<base href="<?php echo BASE_URL; ?>">
	<meta name="description" content="Desenvolvimento de softwares para internet e soluções de qualidade para sua empresa utilizando as mais recentes e conceituadas tecnologias."/>
	<meta name="keywords" content="desenvolvimento web, aplicativos, sistemas para internet, soluções, grupow, balneário camboriu, itajai" />
	<meta name="author" content="GRUPOW" />
	<link rel="apple-touch-icon" sizes="57x57" href="assets/images/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="assets/images/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/images/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/images/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/images/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/images/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="assets/images/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta id="extViewportMeta" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#ffffff">

	<meta property="og:locale" content="pt_BR"/>
	<meta property="og:locale:alternate" content="es_ES"/>
	<meta property="og:locale:alternate" content="en_US"/>
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="GrupoW - Softwares para Internet"/>
	<meta property="og:description" content="Desenvolvimento de softwares para internet e soluções de qualidade para sua empresa utilizando as mais recentes e conceituadas tecnologias."/>
	<meta property="og:url" content="http://www.grupow.com.br/"/>
	<meta property="og:site_name" content="GRUPOW"/>
	<meta property="og:image" content="http://www.grupow.com.br/assets/images/grupow-facebook.png"/>


	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/theme.css" />

</head>

<body>
	<div data-component="app">
		<nav class="navbar navbar-toggleable-xs">
			<button class="navbar-toggler app_menu-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
			</button>

			<a class="navbar-brand" href="./" title="Clique para voltar a home!">
				<span class="navbar-brand-logo"></span>
				<span class="navbar-brand-logo-full"></span>
			</a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link app_link-clientes text-uppercase" href="javascript:void(0)" title="Clientes">Clientes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link app_link-jobs text-uppercase" href="javascript:void(0)" title="Jobs">Jobs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-uppercase" href="http://www.capsaicina.com.br/" title="Blog">Blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link app_link-contato text-uppercase" href="javascript:void(0)" title="Contato">Contato</a>
					</li>
				</ul>
			</div>
			<div class="arte-tecnologica"><img src="assets/images/logo-arte-tecnologica.png" alt="GRUPOW - Arte Tecnológica."></div>
			<div class="endereco">
				<div class="endereco-titulo">GRUPOW</div>
				<div class="endereco-texto">
					Av. Osvaldo Reis, 3281 - Salas 21 e 22<br>
					Praia Brava, Itajaí - Santa Catarina, Brasil<br>
					CEP: 88.306-773
				</div>
				<div class="endereco-telefone">(47) 3056.7670</div>
				<div class="endereco-email">atendimento@grupow.com.br</div>
				<div class="endereco-sociais">
					<a href="https://www.instagram.com/grupow.com.br/" title="Siga-nos no instagram!"><img src="assets/images/icon-social-instagram.png" alt="Siga-nos no instagram!"></a>
					<a href="https://www.facebook.com/OGRUPOW/" title="Curta nossa página no facebook!"><img src="assets/images/icon-social-facebook.png" alt="Curta nossa página no facebook!"></a>
				</div>
			</div>
			<div class="jobs-bg">
				<div class="owl-carousel owl-theme owl-carousel-jobs">
					<div class="item" style="background-image: url(assets/images/bg-jobs.jpg)"></div>
				</div>
			</div>
			
			<div class="app_closer"></div>
		</nav>

		<div class="clientes-bg" data-component="clientes">
			<ul class="clientes clientes_lista">
				<?php for($i=1; $i<=48; $i++) { ?>

					<li class="clientes-item">
						<a href="javascript:void(0)" style="background-image: url(assets/images/clientes/cliente-<?php echo $i; ?>.png);"></a>
					</li>
				<?php } ?>
			</ul>
		</div>

		<div class="contato" data-component="contato">
			<div class="row">
				<div class="col-12 offset-12">
					<div class="contato-mapa">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.4567292230204!2d-48.6417760839026!3d-26.952432201356032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d8c9fe3f8093f5%3A0x97baa1a84a3a0507!2sGRUPOW+%2F%2F+Softwares+para+Internet!5e0!3m2!1spt-BR!2sbr!4v1530819626496" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-12">
					<div class="row">
						<div class="col-md-7">

							<form class="contato-form contato_form">
								<div class="row">
									<div class="alert alert-success contato_sucesso" style="display: none"></div>
									<div class="alert alert-danger contato_falha" style="display: none"></div>
									<div class="col-12 form-group">
										<label>Nome</label>
										<input type="text" name="nome" class="form-control" required>
									</div>
									<div class="col-12 form-group">
										<label>E-mail</label>
										<input type="email" name="email" class="form-control" required>
									</div>
									<div class="col-12 form-group">
										<label>Telefone</label>
										<input type="text" name="telefone" class="form-control" required>
									</div>

									<div class="col-12 form-group">
										<label>Mensagem</label>
										<textarea name="mensagem" class="form-control" rows="3" required></textarea>
									</div>

									<div class="col-12"><button type="submit" class="btn btn-primary">Enviar</button></div>
								</div>
							</form>
						</div>
						<div class="col-md-5">
							<div class="contato-endereco">
								<div class="contato-endereco-titulo">GRUPOW</div>
								<div class="contato-endereco-texto">
									Av. Osvaldo Reis, 3281 - Salas 21 e 22<br>
									Praia Brava, Itajaí - Santa Catarina, Brasil<br>
									CEP: 88.306-773
								</div>
								<div class="contato-endereco-telefone">(47) 3056.7670</div>
								<div class="contato-endereco-email">atendimento@grupow.com.br</div>
								<div class="contato-endereco-sociais">
									<a href="https://www.instagram.com/grupow.com.br/" title="Siga-nos no instagram!"><img src="assets/images/icon-social-instagram.png" alt="Siga-nos no instagram!"></a>
									<a href="https://www.facebook.com/OGRUPOW/" title="Curta nossa página no facebook!"><img src="assets/images/icon-social-facebook.png" alt="Curta nossa página no facebook!"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		