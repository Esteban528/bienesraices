<?php 
	require 'includes/app.php';
	incluirTemplate("header", true);
?>

    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, tempora iusto voluptas non labore, iste dolores aliquid quidem laborum maxime id repellat. Ullam eligendi consequuntur nam velit voluptatum nostrum iure.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, tempora iusto voluptas non labore, iste dolores aliquid quidem laborum maxime id repellat. Ullam eligendi consequuntur nam velit voluptatum nostrum iure.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, tempora iusto voluptas non labore, iste dolores aliquid quidem laborum maxime id repellat. Ullam eligendi consequuntur nam velit voluptatum nostrum iure.</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
				<?php 
					$limite = 3;
					include 'includes/templates/anuncios.php' 
				?>
				<div class="ver-todas alinear-derecha">
				<a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor de pondrá en contacto contigo lo más pronto posible</p>
        <a href="contacto.html" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpeg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/04/2023</span> por: <span>Admin</span> </p>

                        <p>
                            Consejos para construir una terraza en el techo d etu casa con los mejores materiales y ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article> <!-- .entrada-blog -->
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpeg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/04/2023</span> por: <span>Admin</span> </p>

                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colore spara darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article> <!-- .entrada-blog -->
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comprotoó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis espectativas.
                </blockquote>
                <p>- Esteban González</p>
            </div>
        </section>
    </div>

<?php 
	incluirTemplate("footer");
?>
