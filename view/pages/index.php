<!-- Beneficios y iconos -->
<main class="contenedor seccion">
	<h1>Más sobre nosotros</h1>
	<?php include 'icones.php'; ?>
</main>

<!-- Ventas y Depas en venta -->
<section class="seccion contenedor">
	<h2>Casas y Depa en Ventas</h2>
	<?php include 'listado.php'; ?>

	<div class="ver-todas">
		<a href="/propiedades" class="boton-verde">Ver todas</a>
	</div>
</section>

<!-- Contactanos -->
<section class="section imagen-contacto">
	<h2>Encuentra la casa de tus sueños</h2>
	<p>
		LLena el formulario de contacto y un acesor se pondra en contacto contigo
		a la brevedad
	</p>

	<a href="/contacto" class="boton-amarillo">
		Contactános
	</a>
</section>

<!-- Entradas blog y testimonios -->
<div class="contenedor seccion seccion-inferior">
	<section class="blog">
		<h3>Nuestro Blog</h3>

		<article class="entrada-blog">
			<div class="imagen">
				<picture>
					<source srcset="build/img/blog1.webp" type="image/webp">
					<source srcset="build/img/blog1.jpg" type="image/jpeg">
					<img loading="lazy" src="build/img/blog1.jpg" alt="blog">
				</picture>
			</div>

			<div class="text-entrada">
				<a href="/entrada">
					<h4>Terraza en el techo de tu casa</h4>
					<p>
						Escrito el: <span>20/10/2021</span> por <span>Admin</span>
					</p>
					<p class="preview">
						Consejos para contruir una terraza en el techo
						de tu casa con los mejores materiales y ahorrando
						dinero.
					</p>
				</a>
			</div>
		</article>

		<article class="entrada-blog">
			<div class="imagen">
				<picture>
					<source srcset="build/img/blog2.webp" type="image/webp">
					<source srcset="build/img/blog2.jpg" type="image/jpeg">
					<img loading="lazy" src="build/img/blog2.jpg" alt="blog">
				</picture>
			</div>

			<div class="text-entrada">
				<a href="/entrada">
					<h4>Guía para la decoracion de tu hogar </h4>
					<p>
						Escrito el: <span>20/10/2021</span> por <span>Admin</span>
					</p>
					<p class="preview">
						Maximiza el espacio en tu hogar con esta guía, aprende
						a combinar muebles y colores para darle vida a tu espacio
					</p>
				</a>
			</div>
		</article>

	</section>


	<section class="testimoniales">
		<h3>testimoniales</h3>

		<div class="testimonial">
			<blockquote>
				El personal se comporto de una excelente forma, muy buena
				atencion y la casa que me ofrecieron cumple todas la expectativas

			</blockquote>
			<p>
				-- Angel Armando.
			</p>
		</div>
	</section>
</div>