<?php include 'includes/templates/header.php'; ?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpg">
            <img  loading="lazy" src="build/img/destacada3.jpg" alt="ImgContacto">
        </picture>
        <h2>Llene el formulario de contacto</h2>
        <form class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu Nombre">
                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="Tu e-mail">
                <label for="telefono">Telefono</label>
                <input id="telefono" type="tel" placeholder="Tu Numero">
                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensjae" cols="30" rows="10"></textarea>
            </fieldset>
            <fieldset>
                <legend>Info de la propiedad</legend>
                <label for="opciones">Venta o Compra</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>--Selecciona--</option>
                    <option value="venta">Venta</option>
                    <option value="compra">Compra</option>
                </select>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>
                <p>Si eligió teléfono, elija rango horario</p>
                <label for="fecha">Fecha</label>
                <input id="fecha" type="date" >
                <label for="hora">horario</label>
                <input id="hora" type="time" min="09:00" max="17:00" >
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contacto.html">Contacto </a>
            </nav>

        </div>
        <p class="copyright">Todps los derechos reservados &copy</p>

    </footer>
</body>
<script src="build/js/bundle.min.js"></script>

</html>