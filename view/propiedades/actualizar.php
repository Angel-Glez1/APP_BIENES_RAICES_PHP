<main class="contenedor seccion">
	<h1>Actulizar Propiedad</h1>
	<a href="/admin" class="boton boton-verde">Volver a Admin</a>

	<?php foreach ($errores as $error => $value) : ?>
		<p class="bg-red-400"> <?= $value ?> </p>
	<?php endforeach;  ?>


	<form action="/propiedades/actualizar?id=<?= $propiedad->id ?>" method="POST" class="formulario" enctype="multipart/form-data">

		<?php include __DIR__ . "/formulario.php"; ?>
		<input type="submit" value="Guardar" class="boton-amarillo">
	</form>

</main>