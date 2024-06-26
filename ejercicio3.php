<?php
// Base de datos con usuarios y contraseñas
$users = array(
    "Einer Sanchez" => "einer123",
    "Anyi Hortua" => "anyi123",
    "Oscar Ortega" => "oscar123",
    "Luisa Campos" => "luisa123",
    "Mayer Manjarrez" => "mayer23"
);
// se solicita al usuario que ingrese su usuario y contraseña
echo "Ingrese su usuario: ";
$usuario = readline();

echo "Ingrese su contraseña: ";
$password = readline();

// Verificamos si el usuario suministrado existe
if (array_key_exists($usuario, $users)) {
    $mensaje = match (true) {
        $password == $users[$usuario] => "¡Bienvenid@ a la huerta ecologica $usuario!",
        default => "Contraseña incorrecta",
    };
    echo "$mensaje \n";
    }
// Registro del personal
echo "Registro del personal\n";
echo "Ingrese su nombre: ";
$nombre = readline();

echo "Ingrese su identificación: ";
$identificacion = readline();

echo "Ingrese su genero (M / F ): ";
$genero = readline();

echo "Ingrese su edad: ";
$edad = readline();

echo "Ingrese su estatura: ";
$estatura = readline();

echo "Ingrese su peso: ";
$peso = readline();

echo "Es fumador (Si / No): ";
$fumador = readline();
// Se almacenan los datos suministrados
$personal = array(
    "nombre" => $nombre ,
    "identificación" => $identificacion,
    "genero" => $genero,
    "edad" => $edad,
    "estatura" => $estatura,
    "peso" => $peso,
    "fumador" => $fumador
);
// Se crea una función para buscar por nombre o identificacion del personal
function buscarPersonal($busqueda) {
    global $personal;
    foreach ($personal as $key => $value) {
        if (stripos($personal['nombre'], $busqueda) !== false || stripos($personal['identificación'], $busqueda) !== false) {
            return $personal; // Devolvemos el array completo $personal
        }
    }
    return array(); // en caso de no encontrar nada se devolve un array vacio
}
// Se solicita al usuario que ingrese su búsqueda
echo "Ingrese su búsqueda (nombre o identificacion): ";
$busqueda = readline();

// Se llama a la función de búsqueda
$resultado = buscarPersonal($busqueda);
// Se muestran los resultados
if (count($resultado) > 0) {
    echo "Resultados de la búsqueda:\n";
    echo "Nombre: " . $resultado['nombre'] . "\n";
    echo "Identificación: " . $resultado['identificación'] . "\n";
    echo "Género: " . $resultado['genero'] . "\n";
    echo "Edad: " . $resultado['edad'] . "\n";
    echo "Estatura: " . $resultado['estatura'] . "\n";
    echo "Peso: " . $resultado['peso'] . "\n";
    echo "Fumador: " . $resultado['fumador'] . "\n";

// Se indica que el usuario no se a encontrado

} else {
    echo "Usuario no encontrado\n";
}
?>