<?php 
    //importar conexion
    require '../includes/config/database.php';
    $db=conectarDB();
    //escribir query
    $query = "SELECT * FROM propiedades";
    //consulta BD
    $resultado=mysqli_query($db, $query);


    
    //muestra mensaje condicional
    if (isset($_GET['res'])){
        $res=$_GET['res'];
    }else{
        $res=null;
    }
    /* $res= $_GET['res'] ?? null; */

    //incluye template
    require '../includes/funciones.php';
    incluirTemplate("header");

?>
    <main class="contenedor seccion">
    <h1>Administrador de propiedades</h1>
    <?php if($res==1): ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    <?php endif; ?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Crear</a>
    
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Mostrar resultados -->
            <?php while ($row = mysqli_fetch_assoc($resultado)):?>
            <tr>
                <td><?php echo $row['idProp'] ; ?></td>
                <td><?php echo $row['titulo'] ; ?></td>
                <td> <img class="imagen-tabla" src="/imagenes_subidas/<?php echo $row['imagen'] ; ?>" alt="Img Prop"> </td>
                <td>$ <?php echo $row['precio'] ; ?></td>
                <td>
                    <a class="boton-rojo" href="#">Eliminar</a>
                    <a class="boton-amarillo" href="propiedades/actualizar.php?id=<?php echo $row['idProp'] ; ?>">Modificar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>

    </table>
    

    </main>
<?php 
 mysqli_close($db);

incluirTemplate("footer"); ?>