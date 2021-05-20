<?php 
    //base datos
    require '../../includes/config/database.php';
    $db=conectarDB();

    require '../../includes/funciones.php';
    incluirTemplate("header");

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        echo "<pre>";
        var_dump($_POST); 
        echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $toilet = $_POST['toilet'];
        $garage = $_POST['garage'];
        $vendedor = $_POST['vendedor'];
        //$imagen = $_POST['imagen'];

        //insercion BD
        $query = " INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, toilet, garage, vendedorId)  VALUES ( '$titulo', '$precio', '$descripcion', '$habitaciones', '$toilet', '$garage', '$vendedor' )";
        echo $query;
        $resultado= mysqli_query($db, $query);
        if($resultado){
            echo "Insercion correcta";
        }

    }


?>
<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>
    <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Información General</legend>
            <label for="titulo" >Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">
            <label for="precio" >Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">
            <label for="imagen" >Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion"  id="descripcion" cols="30" rows="10"></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion Propiedad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej. 3" min="1">
            <label for="toilet">Baños</label>
            <input type="number" id="toilet" name="toilet" placeholder="Ej. 3" min="1">
            <label for="garage">Garage</label>
            <input type="number" id="garage" name="garage" placeholder="Ej. 3" min="1">

        </fieldset>
        <fieldset>
            <legend>Vendendor</legend>
            <select name="vendedor" id="">
                <option value="1">Damian</option>
                <option value="2">Toto</option>
                <option value="3">Pepe</option>
            </select>
        </fieldset>
        <input type="submit"  class="boton boton-verde">

    </form>   
    </main>
<?php incluirTemplate("footer"); ?>