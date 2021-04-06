<?php

require_once "Usuario.php";

if(isset($_GET['listado']))
{
    $listado=$_GET['listado'];
    switch($listado)
    {
        case "usuarios.json":
            {
                $array = Usuario::LeerArchivo($listado);
                Usuario::ListarUsuarios($array);
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