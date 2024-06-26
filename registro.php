<?php
// Menú principal para iniciar sesion o registro
while (true) {
    echo "¿Qué deseas hacer?\n";
    echo "1. Crear un nuevo usuario\n";
    echo "2. Iniciar sesión\n";
    echo "3. Salir\n";
    $opcion = readline("Elija una opción: ");
    switch ($opcion) {
        case "1":
            $users = crearUsuario($users);
            break;
        case "2":
            iniciarSesion($users);
            break;
        case "3":
            exit;
            break;
        default:
            echo "Opción inválida\n";
     }
}
?>