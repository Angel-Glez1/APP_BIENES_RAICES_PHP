<main class="contenedor seccion">
	<h1>Contacto</h1>

	<picture>
		<source srcset="build/img/destacada3.webp" type="imagen/webp">
		<source srcset="build/img/destacada3.jpeg" type="imagen/jpeg">
		<img src="build/img/destacada3.jpg" alt="Sobre nosotos" loading="lazy">
	</picture>

	<h2>Llene el formulario de contacto</h2>
	<!-- Mostar errores -->
	<?php foreach ($errores as $error => $value) : ?>
		<p class="bg-red-400"> <?= $value ?> </p>
	<?php endforeach;  ?>

	<?php echo ($exito) ? "<p class='bg-green-400'>Correo Enviado</p>" : '' ?>


	<form action="/contacto" method="POST" class="formulario">

		<fieldset>
			<legend>Informacion Personal</legend>

			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre...">

			<label for="mensaje">Menaje</label>
			<textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
		</fieldset>

		<fieldset>
			<legend>Informacion Sobre la Propiedad</legend>

			<label for="opciones">Vende O compra</label>
			<select name="opciones" id="opciones">
				<option value="" disabled selected>Seleccione</option>
				<option value="Compra">Compra</option>
				<option value="Vende">Vende</option>
			</select>

			<label for="presupuesto">Presupuesto</label>
			<input type="number" name="presupuesto" id="presupuesto" placeholder="Tu presupuesto.." min="0">
		</fieldset>

		<fieldset>
			<legend>Informacion Sobre la Propiedad</legend>

			<p>Como desea ser contactado</p>

			<div class="forma-contacto">
				<label for="contactar_telefono">Teléfono</label>
				<input type="radio" name="contacto[contacto]" id="contactar_telefono" value="telefono">

				<label for="contactar_email">Email</label>
				<input type="radio" name="contacto[contacto]" id="contactar_email" value="email">
			</div>

			<div id="contacto"></div>

			
			

		</fieldset>

		<input type="submit" value="Enviar" class="boton-verde">

	</form>

</main>