<?php
// Base de datos con usuarios y contraseñas
$usuario = array();

// Función para crear un nuevo usuario
function crearUsuario($usuario) {
    echo "Crear un nuevo usuario:\n";
    echo "Ingrese su nombre de usuario: ";
    $nuevousuario = readline();
    echo "Ingrese su contraseña: ";
    $nuevacontraseña = readline();
    $usuario[$nuevousuario] = $nuevacontraseña;
    echo "Usuario creado con éxito!\n";
    return $usuario;
}

// Función para iniciar sesión
function iniciarSesion($usuario) {
    echo "Iniciar sesión:\n";
    echo "Ingrese su usuario: ";
    $usuario1 = readline();
    echo "Ingrese su contraseña: ";
    $contraseña = readline();
    if (array_key_exists($usuario1, $usuario)) {
        if ($contraseña == $usuario[$usuario1]) {
            echo "¡Bienvenid@ a la huerta ecologica $usuario1!\n";
        } else {
            echo "Contraseña incorrecta\n";
        }
    } else {
        echo "Usuario no encontrado\n";
    }
}

// Menú principal para iniciar sesion o registro
while (true) {
    echo "¿Qué deseas hacer?\n";
    echo "1. Crear un nuevo usuario\n";
    echo "2. Iniciar sesión\n";
    echo "3. Salir\n";
    $opcion = readline("Elija una opción: ");
    switch ($opcion) {
        case "1":
            $usuario = crearUsuario($usuario);
            break;
        case "2":
            iniciarSesion($usuario);
            break;
        case "3":
            exit;
            break;
        default:
            echo "Opción inválida\n";
     }
}
?>