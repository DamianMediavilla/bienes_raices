<?php 
    require 'includes/funciones.php';
    incluirTemplate("header");
?>
    <main class="contenedor seccion">
    
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
        
    </main>
<?php incluirTemplate("footer"); ?>