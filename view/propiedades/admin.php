<main class="contenedor seccion">
	<h1>Administrador de bienes Raices</h1>


	<?php

	if ($resultado) {

		$mensaje = mostarNotificacion(intval($resultado));

		if ($mensaje) {
			echo "<p class='bg-green-400'> " . s($mensaje) . " </p>";
		}
	}
	?>




	<a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
	<a href="/vendedores/crear" class="boton boton-amarillo">Nuev(a) Vendedor </a>

	<!-- Listar Porpiedades  -->
	<h2>Propiedades</h2>
	<table class="propiedades">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titulo</th>
				<th>Imagen</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($propiedades as $propiedad) : ?>

				<tr>
					<td><?= $propiedad->id ?></td>
					<td><?= $propiedad->titulo ?></td>
					<td> <img class="imagen-tabla" src="/imagenes/<?= $propiedad->imagen  ?>" alt=""> </td>
					<td><?= $propiedad->precio ?></td>

					<td>

						<a href="/propiedades/actualizar?id=<?= $propiedad->id ?>" class="boton-verde-block">Actulizar</a>

						<form action="/propiedades/eliminar" method="POST" class="w-100">
							<input type="hidden" value="<?= $propiedad->id ?>" name="id">
							<input type="hidden" value="propiedad" name="tipo">
							<input type="submit" value="Eliminar" class="boton-rojo-block">
						</form>

					</td>
				</tr>

			<?php endforeach; ?>

		</tbody>
	</table>

	<!-- Listar Vendedore  -->
	<h2>Vendedores</h2>
	<table class="propiedades">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($vendedores as $vendedor) : ?>

				<tr>
					<td><?= s($vendedor->id) ?></td>
					<td><?= s($vendedor->nombre) ?></td>
					<td><?= s($vendedor->telefono) ?></td>

					<td>
						<a href="/vendedores/actualizar?id=<?= $vendedor->id ?>" class="boton-verde-block">Actulizar</a>
						<form action="/vendedores/eliminar" method="POST" class="w-100">
							<input type="hidden" value="<?= $vendedor->id ?>" name="id">
							<input type="hidden" value="vendedor" name="tipo">
							<input type="submit" value="Eliminar" class="boton-rojo-block">
						</form>

					</td>
				</tr>

			<?php endforeach; ?>

		</tbody>
	</table>
</main>