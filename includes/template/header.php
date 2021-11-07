<?php


if (!isset($_SESSION)) {
	session_start();
}

$auth = $_SESSION['login'] ?? false;



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/build/css/app.css">
	<title>Bienes Raices</title>
</head>

<body>
	<header class="header <?= $pageHome ? 'inicio' : '' ?>">
		<div class="contenedor contenido-header">

			<div class="barra">

				<a href="index.php">
					<img src="/build/img/logo.svg" alt="Bienes Raices" class="logo">
				</a>

				<div class="movil-menu">
					<img src="/build/img/barras.svg" alt="barras svg">
				</div>

				<div class="derecha">
					<img src="/build/img/dark-mode.svg" alt="" class="dark-mode-boton">
					<nav class="navegacion">
						<a href="nosotros.php">Nosotros</a>
						<a href="anuncios.php">Anuncios</a>
						<a href="blog.php">Blog</a>
						<a href="contacto.php">Contacto</a>
						<?php if ($auth) : ?>
							<a href="cerrar-session.php">Cerrar Sesion</a>

						<?php endif; ?>

					</nav>
				</div>

			</div>

			<?= ($pageHome) ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : ''   ?>

		</div>
	</header>