<?php 
	require 'includes/funciones.php';
	incluirTemplate("header");
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="sobre nosotros" loading="lazy">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt voluptatibus ut reiciendis totam at quisquam voluptate     delectus recusandae nesciunt quos. Magni ipsam ducimus blanditiis accusantium dignissimos veniam natus architecto fugiat.
                    Mollitia quod dolorem dolore, esse nobis nihil, quia officia magnam reprehenderit quisquam earum odio unde eligendi necessitatibus deserunt sit perspiciatis laboriosam et reiciendis tenetur. Tenetur ipsa soluta iste corporis excepturi?
                </p>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni nihil impedit tenetur? Debitis est quae facere architecto? Doloremque quaerat numquam ipsa, eaque neque consectetur porro deserunt, sunt, quidem iure veritatis?
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="src/build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, tempora iusto voluptas non labore, iste dolores aliquid quidem laborum maxime id repellat. Ullam eligendi consequuntur nam velit voluptatum nostrum iure.</p>
            </div>
            <div class="icono">
                <img src="src/build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, tempora iusto voluptas non labore, iste dolores aliquid quidem laborum maxime id repellat. Ullam eligendi consequuntur nam velit voluptatum nostrum iure.</p>
            </div>
            <div class="icono">
                <img src="src/build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, tempora iusto voluptas non labore, iste dolores aliquid quidem laborum maxime id repellat. Ullam eligendi consequuntur nam velit voluptatum nostrum iure.</p>
            </div>
        </div>
    </section>
<?php 
	incluirTemplate("footer");
?>
