<main class="contenedor seccion">
	<h1>Crear</h1>
	<a href="/admin" class="boton boton-verde">Volver a Admin</a>

	<!-- Mostar errores -->
	<?php foreach ($errores as $error => $value) : ?>
		<p class="bg-red-400"> <?= $value ?> </p>
	<?php endforeach;  ?>


	<form action="/propiedades/crear" method="POST" class="formulario" enctype="multipart/form-data">

		<?php include __DIR__. "/formulario.php"  ; ?>

		<input type="submit" value="Guardar" class="boton-amarillo">
	</form>

	
</main>