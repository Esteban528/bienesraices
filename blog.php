<?php 
	require 'includes/funciones.php';
	incluirTemplate("header");
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro blog</h1>

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
                        <p>Escrito el: <span>20/04/2023</span> por: <span>Admin</span> </p>

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
                        <p>Escrito el: <span>20/04/2023</span> por: <span>Admin</span> </p>

                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colore spara darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article> <!-- .entrada-blog -->
        </section>
    </main>
<? incluirTemplate("footer") ?>
