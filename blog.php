<?php 
    require 'includes/funciones.php';
    incluirTemplate("header");
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro blog</h1>
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
                    <p class="informacion-meta">Escrito el: <span>20/20/2020</span> por: <span>Pepe</span></p>
                    <p>Consejos para construir una terraza en el techo de tucasa con buenos materiales y ahorrando dinero</p>
                </a>

            </div>
       </article>
        
    </main>
<?php incluirTemplate("footer"); ?>