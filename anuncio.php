<?php 
    require 'includes/funciones.php';
    incluirTemplate("header");

    $id=$_GET['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: /'); 
    }
    //conectar DB
    require 'includes/config/database.php';
    $db =conectarDB();
    //consultar
    $query = "SELECT * FROM propiedades WHERE idProp = $id";
    $consulta = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($consulta);
    /* if($propiedad->num_rows ===0){
        header('Location: /'); 
    } */

?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>
        <img loading="lazy" src="/imagenes_subidas/<?php echo $propiedad['imagen']; ?>" alt="Imagen Destacada anuncio">
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" alt="váter">
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
            <p><?php echo $propiedad['descripcion']; ?></p>

        </div>
    </main>
<?php incluirTemplate("footer"); ?>