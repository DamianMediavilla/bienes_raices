<?php 
    //autenticacion
    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if (!$auth){
        header('Location: /');
    }
    //base datos, conexion
    require '../../includes/config/database.php';
    $db=conectarDB();

    // consulta para obtener vendedores
    $consulta_vendedores = "SELECT * from vendedores";
    $resultado_vendedores = mysqli_query($db, $consulta_vendedores);

   
    incluirTemplate("header");

    //arreglo mensaje de eerror
    $errores = [];
    //Inicializacion de variables vacias
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $toilet = '';
    $garage = '';
    $vendedor = null;

    //$imagen = '';

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
            $errores[] = "Debes añadir un titulo";
        }
        if (!$precio){
            $errores[] = "Debes añadir un precio";
        }
        if (strlen($descripcion)<50){
            $errores[] = "Debes añadir una descripcion de al menos 50 caracteres";
        }
        if (!$habitaciones){
            $errores[] = "Debes añadir habitaciones";
        }
        if (!$toilet){
            $errores[] = "Debes añadir baños";
        }
        if (!$garage){
            $errores[] = "Debes añadir cantidad de garage";
        }
        if (!$vendedor){
            $errores[] = "Debes añadir un vendedor";
        }
        if(!$imagen['name']|| $imagen['error']){
            $errores[] ="Debe insertar una imagen valida";
        }

        $tam= 1024*512; //cantidad de bytes (1024=1kb) 512kb
        if ($imagen['size']>$tam){
            $errores[] = "La imagen es demasiado pesada";
        }




       /*  echo "<pre>";
        var_dump($errores); 
        echo "</pre>"; */
        if (empty($errores)){
            //* Subida de archivos

            //Crear carpeta
            $carpetaImagenes = '../../imagenes_subidas/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }
            // generar nombre
            $nombreImg = md5(uniqid(rand(),true)) . ".jpg";
            //Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImg);



            //insercion BD
            $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, toilet, garage, creado, vendedorId)  VALUES ( '$titulo', '$precio', '$nombreImg', '$descripcion', '$habitaciones', '$toilet', '$garage', '$creado', '$vendedor' )";
            //echo $query;
            $resultado= mysqli_query($db, $query);
            
            if($resultado){
                //echo "Insercion correcta" . "<br>";
                header('Location: /admin/?res=1');
            }
        }
        //exit;
 



    }


?>
<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error):?>
        <div class="alerta error">
        <?php echo $error;?>
        </div>
    <?php endforeach; ?>    

    

    <form  class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>
            <label for="titulo" >Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">
            <label for="precio" >Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo($precio); ?>">
            <label for="imagen" >Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion"  id="descripcion" cols="30" rows="10"><?php echo $descripcion; ?></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion Propiedad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej. 3" min="1" value="<?php echo $habitaciones; ?>">
            <label for="toilet">Baños</label>
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
        <input type="submit"  class="boton boton-verde" value="Crear Anuncio">

    </form>   
    </main>
<?php incluirTemplate("footer"); ?>