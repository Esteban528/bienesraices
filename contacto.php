<?php 
	require 'includes/funciones.php';
	incluirTemplate("header");
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imágen contacto" loading="lazy">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">
                
                <label for="email">Correo Electrónico</label>
                <input type="email" placeholder="Tu Email" id="email">
                
                <label for="tel">Teléfono</label>
                <input type="tel" placeholder="Tu teléfono" id="tel">

                <label for="mensaje">Mensaje</label>
                <textarea name="Mensaje" id="mensaje" cols="30" rows="10">

                </textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>--Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>
                                
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si elegió teléfono, por favor proporcione un horario o fecha para ser contactado</p>

                <label for="fecha">Fecha</label>
                <input type="date"  id="fecha">

                <label for="hora">Hora</label>
                <input type="time" min="09:00" max="18:00" id="hora">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>

    </main>

<? incluirTemplate("footer") ?>
