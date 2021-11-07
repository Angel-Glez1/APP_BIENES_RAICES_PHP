<fieldset>
	<legend>Informacion General</legend>

	<label for="titulo">Titulo</label>
	<input type="text" name="propiedad[titulo]" id="titulo" value="<?= s($propiedad->titulo); ?>" placeholder="Titulo Propiedad...">

	<label for="precio">Precio</label>
	<input type="number" name="propiedad[precio]" id="precio" value="<?= s($propiedad->precio); ?>" placeholder="Precio Propiedad...">

	<label for="imagen">Imagen</label>
	<input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg">
	<?php if ($propiedad->imagen) : ?>
		<p>
			Imagen Anterior
			<img src="/imagenes/<?= $propiedad->imagen ?>" alt="" class="img-small">
		</p>
	<?php endif; ?>


	<label for="descripcion">Descripcion</label>
	<textarea name="propiedad[descripcion]" id="descripcion" cols="30" rows="10"><?= s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
	<legend>Informacion de la propiedad</legend>

	<label for="habitaciones">Habitaciones</label>
	<input type="number" name="propiedad[habitaciones]" id="habitaciones" value="<?= s($propiedad->habitaciones); ?>" placeholder="Ej: 3" min="1" max="9">

	<label for="wc">Baños</label>
	<input type="number" name="propiedad[wc]" id="wc" value="<?= s($propiedad->wc); ?>" placeholder="Ej: 3" min="1" max="9">

	<label for="estacionamiento">Estacionamiento</label>
	<input type="number" name="propiedad[estacionamiento]" id="estacionamiento" value="<?= s($propiedad->estacionamiento); ?>" placeholder="Ej: 3" min="1" max="9">

</fieldset>

<fieldset>
	<legend>Vendedor</legend>

	<label for="vendedor">Vendedor</label>
	<select name="propiedad[vendedorId]" id="vendedor">
		<option value="" selected disabled >--Selecciona--</option>

		<?php foreach($vendedores as $vendedor) :   ?>

			<option 
				value="<?= s($vendedor->id) ?>" 
				<?= $propiedad->vendedorId === $vendedor->id ? 'selected' : '' ?> 
			>

				<?= s($vendedor->nombre) . ' ' . s($vendedor->apellido) ?>
			</option>

		<?php endforeach; ?>
	</select>
</fieldset>