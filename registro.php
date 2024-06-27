<?php
// Base de datos con usuarios y contraseñas
$users = array();
$employees = array(); // Array para almacenar los empleados

// Acción para crear un nuevo usuario
function createNewUser($users) {
    echo "Crear un nuevo usuario:\n";
    echo "Ingrese su nombre de usuario: ";
    $newUsername = readline();
    echo "Ingrese su contraseña: ";
    $newPassword = readline();
    $users[$newUsername] = $newPassword;
    echo "Usuario creado con éxito!\n";
    return $users;
}

// Acción para iniciar sesión
function login($users) {
    echo "Iniciar sesión:\n";
    echo "Ingrese su usuario: ";
    $username = readline();
    echo "Ingrese su contraseña: ";
    $password = readline();
    if (array_key_exists($username, $users)) {
        if ($password == $users[$username]) {
            echo "¡Bienvenid@ a la huerta ecologica $username!\n";
        } else {
            echo "Contraseña incorrecta\n";
        }
    } else {
        echo "Usuario no encontrado\n";
    }
}

// Acción para registrar personal
function registerEmployees() {
    global $employees; // Accedemos al array de empleados
    echo "REGISTRO DE PERSONAL\n";
    $respuesta1 = readline("¿Desea registrar nuevos empleados? (S/N) :");
    if (strtoupper($respuesta1) == "S") {
        $numeroEmpleados = intval(readline("¿Cuantos empleados desea registrar? :"));
        for ($i = 0; $i < $numeroEmpleados; $i++) {
            $nombre = readline("Nombre: ");
            $dni = intval(readline("DNI: "));
            $genero = readline("Genero  (M / F):");
            $edad = intval(readline("Edad : "));
            $estatura = floatval(readline("Estatura (m): "));
            $peso = floatval(readline("Peso (kg): "));
            $fumador = readline("¿Fuma? (S/N) :");

            $employees[] = ['nombre' => $nombre, 'dni' => $dni, 'genero' => $genero, 'edad' => $edad, 'estatura' => $estatura, 'peso' => $peso, 'fumador' => $fumador];
        }
    } else {
        echo "Adios";
    }
}

// Acción para buscar empleado
function searchEmployee() {
    global $employees; // Accedemos al array de empleados
    $buscar = readline("Ingrese nombre o DNI, de empleado a buscar: ");
    foreach ($employees as $empleado) {
        if ($empleado['nombre'] == $buscar || $empleado['dni'] == $buscar) {
            echo "EMPLEADO ENCONTRADO:\n";
            echo "Edad: " . $empleado['edad'] . "\n";
            echo "Genero: " . $empleado['genero'] . "\n";
            break;
        }
    }
}

// Menú principal para iniciar sesión o registro
while (true) {
    echo "¿Qué deseas hacer?\n";
    echo "1. Crear un nuevo usuario\n";
    echo "2. Iniciar sesión\n";
    echo "3. Registro de personal\n";
    echo "4. Buscar empleado\n";
    echo "5. Salir\n";
    $option = readline("Elija una opción: ");
    switch ($option) {
        case "1":
            $users = createNewUser($users);
            break;
        case "2":
            login($users);
            break;
        case "3":
            registerEmployees();
            break;
        case "4":
            searchEmployee();
            break;
        case "5":
            exit;
            break;
        default:
            echo "Opción inválida\n";
    }
}
?>