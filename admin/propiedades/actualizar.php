<?php 
    //tomar id y validar
    $id =$_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    //base datos, conexion
    require '../../includes/config/database.php';
    $db=conectarDB();
    //Obtener datos
    $consulta_propiedades = "SELECT * FROM propiedades WHERE idProp = $id ";
    $resultado_prop = mysqli_query($db, $consulta_propiedades);
    $propiedad = mysqli_fetch_assoc($resultado_prop);
  


    // consulta para obtener vendedores
    $consulta_vendedores = "SELECT * from vendedores";
    $resultado_vendedores = mysqli_query($db, $consulta_vendedores);

    require '../../includes/funciones.php';
    incluirTemplate("header");

    //arreglo mensaje de eerror
    $errores = [];
    //Inicializacion de variables cargadas
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $toilet = $propiedad['toilet'];
    $garage = $propiedad['garage'];
    $vendedor = $propiedad['vendedorId'];
    $imagenPropiedad = $propiedad['imagen'];

    //Codigo ejecutado despues de enviar formulario
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        //echo "<pre>";
        //var_dump($_POST); 
        //echo "</pre>";
        echo "<pre>";
        var_dump($_FILES); 
        echo "</pre>";

        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $toilet = mysqli_real_escape_string( $db, $_POST['toilet'] );
        $garage = mysqli_real_escape_string( $db, $_POST['garage'] );
        $vendedor = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $creado = date('Y/m/d');
        //Procesar imagen
        $imagen = $_FILES['imagen']; 
        //var_dump($imagen);


        if (!$titulo){
            $errores[] = "Debes a??adir un titulo";
        }
        if (!$precio){
            $errores[] = "Debes a??adir un precio";
        }
        if (strlen($descripcion)<50){
            $errores[] = "Debes a??adir una descripcion de al menos 50 caracteres";
        }
        if (!$habitaciones){
            $errores[] = "Debes a??adir habitaciones";
        }
        if (!$toilet){
            $errores[] = "Debes a??adir ba??os";
        }
        if (!$garage){
            $errores[] = "Debes a??adir cantidad de garage";
        }
        if (!$vendedor){
            $errores[] = "Debes a??adir un vendedor";
        }
       

        $tam= 1024*512; //cantidad de bytes (1024=1kb) 512kb
        if ($imagen['size']>$tam){
            $errores[] = "La imagen es demasiado pesada";
        }




       /*  echo "<pre>";
        var_dump($errores); 
        echo "</pre>"; */
        if (empty($errores)){
            
            //Crear carpeta
            $carpetaImagenes = '../../imagenes_subidas/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            $nombreImg = '';

            //* Subida de archivos
            if($imagen['name']){
                //elimanos imagen anterior
                unlink($carpetaImagenes . $propiedad['imagen']);
                // generar nombre de la nueva imagen
                $nombreImg = md5(uniqid(rand(),true)) . ".jpg";
                //Subir imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImg);
            }else{
                $nombreImg  = $propiedad['imagen'];
            }




            //insercion BD
            $query = " UPDATE propiedades  SET titulo = '$titulo', precio = '$precio', descripcion = '$descripcion', habitaciones = '$habitaciones', toilet = '$toilet', garage = '$garage', vendedorId = '$vendedor', imagen = '$nombreImg' WHERE idProp = $id";
            echo $query;
            $resultado= mysqli_query($db, $query);
            echo $resultado;
            if($resultado){
                //echo "Insercion correcta" . "<br>";
                header('Location: /admin/?res=2');
            }
        }
        //exit;
 



    }


?>
<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error):?>
        <div class="alerta error">
        <?php echo $error;?>
        </div>
    <?php endforeach; ?>    

    

    <form action="" class="formulario" method="POST"  enctype="multipart/form-data">
        <fieldset>
            <legend>Informaci??n General</legend>
            <label for="titulo" >Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">
            <label for="precio" >Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo($precio); ?>">
            <label for="imagen" >Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">  
            <img src="/imagenes_subidas/<?php echo $imagenPropiedad; ?>" alt="imagen propiedad" class="imagen-chica">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion"  id="descripcion" cols="30" rows="10"><?php echo $descripcion; ?></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion Propiedad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej. 3" min="1" value="<?php echo $habitaciones; ?>">
            <label for="toilet">Ba??os</label>
            <input type="number" id="toilet" name="toilet" placeholder="Ej. 3" min="1" value="<?php echo $toilet; ?>">
            <label for="garage">Garage</label>
            <input type="number" id="garage" name="garage" placeholder="Ej. 3" min="1" value="<?php echo $garage; ?>">

        </fieldset>
        <fieldset>
            <legend>Vendendor</legend>
            <select name="vendedor" id="" >
                <option value="">--Seleccione--</option>
                <?php while($row = mysqli_fetch_assoc($resultado_vendedores)): ?>
                    <!-- Comparador ternario evalua si el vendedor guardado en la variable del POST, es igual a uno de la base de datos, me muestra esos datos como seleccionado. La primer iteracion es siempre falsa, al cargar el formulario por primera vez, ya que $vendedor esta vacio -  -->
                    <option <?php echo $row['idvendedores']===$vendedor ? 'selected' : '' ; ?> value="<?php echo $row['idvendedores']; ?>"><?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit"  class="boton boton-verde" value="Actualizar Anuncio">

    </form>   
    </main>
<?php incluirTemplate("footer"); ?>