<?php 
    //importar conexion
    require '../includes/config/database.php';
    $db=conectarDB();
    //escribir query
    $query = "SELECT * FROM propiedades";
    //consulta BD
    $resultado=mysqli_query($db, $query);


    
    //Carga id de mensaje condicional
    if (isset($_GET['res'])){
        $res=$_GET['res'];
    }else{
        $res=null;
    }
    // var_dump($_POST);
    /* $res= $_GET['res'] ?? null; */
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);  
        if($id){
            // borramos el archivo imagen
            $query = "SELECT imagen FROM propiedades WHERE idProp = $id";
            $consulta_prop=mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($consulta_prop);
            unlink('../imagenes/' . $propiedad['imagen']);
            


            $query = "DELETE FROM propiedades WHERE idProp = $id";
            echo $query;
            $eliminacion=mysqli_query($db, $query);
            if($eliminacion){
                header('Location: /admin');
            } 
        }

    } 


    //incluye template
    require '../includes/funciones.php';
    incluirTemplate("header");

?>
    <main class="contenedor seccion">
    <h1>Administrador de propiedades</h1>
    <!-- muesta mensaje conddicional -->
    <?php if($res==1): ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    <?php elseif($res==2): ?>
        <p class="alerta exito">Anuncio Actualizado correctamente</p>
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
                    <form method="POST" class="w-100" action="">
                        <input type="hidden" name="id" value="<?php echo $row['idProp']; ?>">
                        <input type="submit" class="boton-rojo" value="Eliminar">
                    </form>
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