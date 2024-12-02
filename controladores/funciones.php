<?php 
require_once('helpers/dd.php');

function guardarPlato($bd, $tabla, $datos, $avatar) {
    $nombre = $datos['nombre'];
    $descripcion = $datos['descripcion'];
    $precio = $datos['precio'];
    $descuento = $datos['descuento'];
    $imagen = $avatar;

    // Preparar la consulta
    $sql = "INSERT INTO $tabla (nombre, descripcion, precio, descuento, imagen) 
        VALUES (:nombre, :descripcion, :precio, :descuento, :imagen)";

    try {
        $query = $bd->prepare($sql);
        $query->bindValue(':nombre', $nombre);
        $query->bindValue(':descripcion', $descripcion);
        $query->bindValue(':precio', $precio);
        $query->bindValue(':descuento', $descuento);
        $query->bindValue(':imagen', $imagen);

        $query->execute();
    } catch (PDOException $e) {
        echo "Error al guardar el plato: " . $e->getMessage();
    }
}



// conexion.php
function conexion($host, $dbname, $user, $password) {
    try {
        // Utilizando PDO para conectar a la base de datos
        $dsn = "mysql:host=$host;dbname=$dbname";
        $bd = new PDO($dsn, $user, $password);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para capturar errores
        return $bd;
    } catch (PDOException $error) {
        echo "Error de conexión: " . $error->getMessage();
        return null; // Si la conexión falla, se retorna null
    }
}



function validarPlato($datos,$imagen){
    $errores = [];
    $nombre = trim($datos['nombre']);
    $descripcion = trim($datos['descripcion']);
    $precio = trim($datos['precio']);
    $descuento = trim($datos['descuento']);

    if(empty($nombre)){
        $errores['nombre'] = 'El campo nombre no puede estar vacio';
    }
    if(empty($descripcion)){
        $errores['descripcion'] = 'Debes de añadir una descipcion';
    }
    if(empty($precio)){
        $errores['precio'] = 'No hay un precio ingresado';
    }
    if(empty($descuento)){
        $errores['descuento'] = 'Olvidaste ingresar un descuento';
    }
    if($imagen['avatar']['error'] !=0){
        $errores['avatar'] ='porfavor subir tu imagen';
    }

    return $errores;
}
    
 
function armarAvatar($imagen) {
        $avatar = $imagen['avatar']['name'];
        $ext = pathinfo($avatar, PATHINFO_EXTENSION);
        $archivoOrigen = $imagen['avatar']['tmp_name'];
        $nombreArchivo = uniqid('avatar-') . '.' . $ext;
        $ruta = dirname(__DIR__) . '/imagenes/usuarios/';
        $archivoDestino = $ruta . $nombreArchivo;
        move_uploaded_file($archivoOrigen, $archivoDestino);
        return $nombreArchivo;
    }
    


?>