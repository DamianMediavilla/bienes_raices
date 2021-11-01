<?php 
    require 'includes/config/database.php';
    $db = conectarDB();
    //$db->set_charset('utf8');
    $errores = [];
    // autenticar usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        $email = mysqli_real_escape_string ($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db,  $_POST['password']);
        if(!$email){
            $errores[]= "Debe inresar un email valido";
            
        }
        if(!$password){
            $errores[]= "Debe ingresar un password";
            
        }

        if(empty($errores)){
            //revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
            $resultado = mysqli_query($db, $query);
            var_dump($query);
            echo"sarasa";
            var_dump($resultado->num_rows);
            if($resultado->num_rows){
                //Revisar si e password es correcto
                $usuario   = mysqli_fetch_assoc($resultado);
                // verificar password
                var_dump($usuario);
                $auth = password_verify($password, $usuario['password']);
                echo "<pre>";
                echo 'auth333';
                var_dump($auth);
                if($auth){
                    session_start();

                    $_SESSION['usuario']= $usuario['email'];
                    $_SESSION['login']= true;



                    echo "sesion";
                    echo "<pre>";
                    var_dump($_SESSION);

                }else{
                    $errores[]= "El Password es incorrecto";
                }
            }else{
                $errores[] = "El Usuario no existe";
            }
        }
        echo "<pre>";
        echo "errores";
        var_dump($errores);
        echo "</pre>";


    }
//incluye header
    require 'includes/funciones.php';
    incluirTemplate("header");
?>
    <main class="contenedor seccion">
    <h1>Iniciar Sesion</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>

        </div>

    <?php endforeach; ?>



    <form method="POST"  class="formulario">
        <fieldset>
            <legend>Email y contraseña</legend>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Tu email" required>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Tu password" required>
        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>


        
    </main>
<?php incluirTemplate("footer"); ?>