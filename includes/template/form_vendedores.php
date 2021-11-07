<fieldset>
	<legend>Informacion del Vended(a)</legend>

	<label for="nombre">Nombre</label>
	<input type="text" name="vendedor[nombre]" id="nombre" value="<?= s($vendedor->nombre); ?>" placeholder="Nombre...">

	<label for="apellido">Apellido</label>
	<input type="text" name="vendedor[apellido]" id="apellido" value="<?= s($vendedor->apellido); ?>" placeholder="Apellido...">

	<label for="telefono">Telefono</label>
	<input type="tel" name="vendedor[telefono]" id="telefono" value="<?= s($vendedor->telefono); ?>" placeholder="Telefono...">
</fieldset>

