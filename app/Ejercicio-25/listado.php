<?php

require_once "Usuario.php";

if(isset($_GET['listado']))
{
    $listado=$_GET['listado'];
    switch($listado)
    {
        case "../Ejercicio-24/Usuarios.json":
            {
                $array = Usuario::LeerArchivo($listado);
                Usuario::ListarUsuarios($array);
                echo "Hola";
                break;
            }

        default:
        {
            echo "No se reconocio el listado solicitado";
            break;
        }
    }

}
else
{
    echo "Algun dato es invalido";
}




?>