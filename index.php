<?php 
    $inicio=true;
    include 'includes/templates/header.php'
?>
    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias dolorem quidem labore minus! Similique voluptatibus, facilis repellendus, perferendis ea dolorem odit tempora quasi magnam adipisci natus incidunt, alias necessitatibus laudantium!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias dolorem quidem labore minus! Similique voluptatibus, facilis repellendus, perferendis ea dolorem odit tempora quasi magnam adipisci natus incidunt, alias necessitatibus laudantium!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias dolorem quidem labore minus! Similique voluptatibus, facilis repellendus, perferendis ea dolorem odit tempora quasi magnam adipisci natus incidunt, alias necessitatibus laudantium!</p>
            </div>

        </div>
        
    </main>
    <section class="seccion contenedor">
        <h2>Casas y departamentos en venta</h2>
        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="Anucio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa de lujo en el lago</h3>
                    <p>Casa en el lago, excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3.000.000</p>
                </div>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="váter">
                        <p>4</p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="garage">
                        <p>2</p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg" alt="dormi">
                        <p>6</p>
                    </li>

                </ul>
                <a href="anuncio.php" class="boton boton-amarillo">Ver propiedad</a>
            </div>
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="Anucio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa terminado de lujo</h3>
                    <p>Casa lujosa con excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3.200.000</p>
                </div>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="váter">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="garage">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg" alt="dormi">
                        <p>4</p>
                    </li>

                </ul>
                <a href="anuncio.php" class="boton boton-amarillo">Ver propiedad</a>
            </div>
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="Anucio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa con alberca</h3>
                    <p>Casa moderna, excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$4.500.000</p>
                </div>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="váter">
                        <p>2</p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="garage">
                        <p>2</p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg" alt="dormi">
                        <p>5</p>
                    </li>

                </ul>
                <a href="anuncio.php" class="boton boton-amarillo">Ver propiedad</a>
            </div>
        </div>
        <div class="ver-todas alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>

        </div>

    </section>
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra e contacto contigo</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>


    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                 <div class="imagen">
                     <picture>
                         <source srcset="build/img/blog2.webp" type="image/webp">
                         <source srcset="build/img/blog2.jpg" type="image/jpg">
                         <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada">
                     </picture>
                 </div>
                 <div class="texto-entrada">
                     <a href="entrada.php">
                         <h4>Guia para la decoracion de tu hogar</h4>
                         <p class="informacion-meta">Escrito el: <span>20/20/2020</span> por: <span>Pepe</span></p>
                         <p>consejos para construir una terraza en el techo de tucasa con buenos materiales y ahorrando dinero</p>
                     </a>

                 </div>
            </article>
            <article class="entrada-blog">
                 <div class="imagen">
                     <picture>
                         <source srcset="build/img/blog1.webp" type="image/webp">
                         <source srcset="build/img/blog1.jpg" type="image/jpg">
                         <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada">
                     </picture>
                 </div>
                 <div class="texto-entrada">
                     <a href="entrada.php">
                         <h4>Terraza en el techo de tu casa</h4>
                         <p class="informacion-meta" >Escrito el: <span>20/20/2020</span> por: <span>Pepe</span></p>
                         <p>consejos para construir una terraza en el techo de tucasa con buenos materiales y ahorrando dinero</p>
                     </a>

                 </div>
            </article>
        </section>
        <section class="testimonial">
            <blockquote>
                El personal se comporto de una excelente forma, muy buena atencion ofrece espectativas realizstas

            </blockquote>
            <p>- Ricardo Ruben -</p>
        </section>

    </div>
<?php include 'includes/templates/footer.php'; ?>