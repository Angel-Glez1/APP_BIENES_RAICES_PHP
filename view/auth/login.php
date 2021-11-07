<main class="contenedor seccion">
	<h1>Iniciar Sesion</h1>

	<?php foreach ($errores as $error => $value) : ?>
		<p class="bg-red-400"> <?= $value ?> </p>
	<?php endforeach;  ?>

	<form action="/login" method="POST" class="formulario" novalidate>
		<fieldset>
			<legend>Email y password</legend>


			<label for="email">Email</label>
			<input type="email" name="email" id="email" placeholder="Email...">

			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Password..." required>

		</fieldset>

		<input type="submit" value="Enviar" class="boton-verde">
	</form>
</main>