<?php 
//conectar DB
require 'includes/config/database.php';
$db =conectarDB();
//consultar
$query = "SELECT * FROM propiedades LIMIT $limite";
$consulta = mysqli_query($db, $query);

?>


<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($consulta)): ?>
    <div class="anuncio">
        <!-- <picture>
            <source srcset="build/img/anuncio1.webp" type="image/webp">
            <source srcset="build/img/anuncio1.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/anuncio1.jpg" alt="Anucio">
        </picture> -->
        <img loading="lazy" src="/imagenes_subidas/<?php echo $propiedad['imagen']; ?>" alt="Anucio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>
        </div>
        <ul class="iconos-caracteristicas">
            <li>
                <img src="build/img/icono_wc.svg" alt="toilet">
                <p><?php echo $propiedad['toilet']; ?></p>
            </li>
            <li>
                <img src="build/img/icono_estacionamiento.svg" alt="garage">
                <p><?php echo $propiedad['garage']; ?></p>
            </li>
            <li>
                <img src="build/img/icono_dormitorio.svg" alt="dormi">
                <p><?php echo $propiedad['habitaciones']; ?></p>
            </li>

        </ul>
        <a href="anuncio.php?id=<?php echo $propiedad['idProp']; ?>" class="boton boton-amarillo">Ver propiedad</a>
    </div>
           
<?php endwhile; ?>
</div>

<?php
        //cerrar conexion
    mysqli_close($db);
?>
