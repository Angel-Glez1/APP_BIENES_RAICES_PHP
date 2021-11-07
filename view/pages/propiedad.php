<main class="contenedor seccion">
	<?php if($propiedad): ?>
	<h1><?= $propiedad->titulo ?></h1>

	<img src="imagenes/<?= $propiedad->imagen ?>" alt="casa frente al bosque" loading="lazy">

	<div class="resumen-propiedad">
		<p class="precio"> $<?= $propiedad->precio ?> </p>
		<ul class="iconos-caracteristicas">
			<li>
				<img src="build/img/icono_wc.svg" loading="lazy" alt="icono wc">
				<p><?= $propiedad->wc ?></p>
			</li>
			<li>
				<img src="build/img/icono_estacionamiento.svg" loading="lazy" alt="icono wc">
				<p><?= $propiedad->estacionamiento ?></p>
			</li>
			<li>
				<img src="build/img/icono_dormitorio.svg" loading="lazy" alt="icono wc">
				<p><?= $propiedad->habitaciones ?></p>
			</li>
		</ul>
		<p>
			<?= $propiedad->descripcion ?>
		</p>
	</div>
	<?php else: ?>
		<p> Recurso no Encontrado </p>
	<?php endif; ?>
</main>