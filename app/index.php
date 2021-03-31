<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Heroku</title>
</head>
<body>
<form method="POST" action="index.php">
        <input type="text" required placeholder="Mail" name="mail"><br>
        <input type="text" required placeholder="Clave" name="clave"><br><br><br>
        <input  type="submit" value="Validar Usuario">
</form>
    
</body>
</html>

<?php
require_once "Usuario.php";
/******************************************************************************
Alumno : Alejandro Bongioanni
Aplicación Nº 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario
*******************************************************************************/
//$clave = $_POST['clave'];
//$mail = $_POST['mail'];


if (isset($_POST['mail']) && isset($_POST['clave'])) {
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];
    $usuario= new Usuario("", $clave, $mail);

    $listadoUsuarios = Usuario::LeerArchivoCSV("registro.csv");
    //var_dump($listadoUsuarios);
    $resultado = $usuario->ValidarUsuario($listadoUsuarios);
    echo "Usuario Solicitado: ", $usuario->ToString()."\n";
    switch ($resultado) {
        case -1:
            {
                echo "Usuario no registrado\n>";
                break;
            }
        case 0:
            {
                echo "Error en los datos\n";
                break;
            }
        default:
            {
                echo "Verificado\n";
                break;
            }
    }
    //var_dump($resultado);
} else {
    echo "Algun dato es invalido";
}

?>