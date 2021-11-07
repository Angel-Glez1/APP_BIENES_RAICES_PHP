<div class="contenedor-anuncios">

	<?php foreach ($propiedades as $propiedad) : ?>

		<div class="anuncio">

			<img src="/imagenes/<?= $propiedad->imagen ?>" alt="anuncio 1" loading="lazy">


			<div class="contenido-anuncio">
				<h3><?= utf8_decode($propiedad->titulo)  ?></h3>
				<p>
					<?= substr($propiedad->descripcion, 0, 100) . '...'  ?>
				</p>
				<p class="precio"><?= $propiedad->precio  ?></p>
				<ul class="iconos-caracteristicas">
					<li>
						<img class="icono-sgv" src="build/img/icono_wc.svg" loading="lazy" alt="icono wc">
						<p><?= $propiedad->wc  ?></p>
					</li>
					<li>
						<img class="icono-sgv" src="build/img/icono_estacionamiento.svg" loading="lazy" alt="icono wc">
						<p><?= $propiedad->estacionamiento  ?></p>
					</li>
					<li>
						<img class="icono-sgv" src="build/img/icono_dormitorio.svg" loading="lazy" alt="icono wc">
						<p><?= $propiedad->habitaciones ?></p>
					</li>
				</ul>

				<a href="/propiedad?id=<?= $propiedad->id ?>" class="boton-amarillo-block">
					Ver Propiedad
				</a>


			</div>
		</div>

	<?php endforeach; ?>

</div> <!-- .contenedor-anuncios-->