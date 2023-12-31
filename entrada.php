<?php 
	require 'includes/app.php';
	incluirTemplate("header");
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>
        
        <p class="informacion-meta">Escrito el <span>20/10/2021</span> por <span>Admin</span></p>
        
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum aperiam maiores omnis laborum quam, aliquid voluptas tempora accusamus excepturi, soluta itaque consequuntur! Molestiae sapiente molestias ipsam necessitatibus magnam! Id, ab.
            Cupiditate nulla odio modi nam! Sit fuga aut repudiandae blanditiis fugit vitae nisi incidunt, reiciendis debitis magnam modi neque eos nihil. Quam exercitationem est harum nostrum ex, cum eos ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci asperiores laudantium numquam repellat maiores tempora et ullam architecto. Animi, quisquam omnis. Ab autem quidem voluptatibus deserunt culpa tempora quisquam vitae. </p>
        </div>
    </main>

<?php incluirTemplate("footer") ?>
