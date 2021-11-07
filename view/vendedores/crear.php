<main class="contenedor seccion">
	<h1>Vendedores</h1>
	<a href="/admin" class="boton boton-verde">Volver a Admin</a>

	<!-- Mostar errores -->
	<?php foreach ($errores as $error => $value) : ?>
		<p class="bg-red-400"> <?= $value ?> </p>
	<?php endforeach;  ?>


	<form action="/vendedores/crear" method="POST" class="formulario">

		<?php include __DIR__ . '/form_vendedores.php'; ?>

		<input type="submit" value="Guardar" class="boton-amarillo">
	</form>

</main>