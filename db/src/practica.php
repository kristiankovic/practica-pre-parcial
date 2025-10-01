<?php
require_once "bd.php";

$dataBase = new Database();
$conn = $dataBase->getConn();

class Persona{

    public $nombre;
    public $direccion;
    public $edad;
}

$persona = new Persona();

$persona->nombre = "Juan Carlos Garcilazo Peña";
$persona->direccion = "Av. Siempre Viva 123";
$persona->edad = 30;

$stmt = $conn->prepare("INSERT INTO tbl_clientes (nombre_completo, direccion, edad) VALUES (?, ?, ?)");

$stmt->bindParam(1, $persona->nombre);
$stmt->bindParam(2, $persona->direccion);
$stmt->bindParam(3, $persona->edad);

$stmt->execute();

echo "<br> Registro Insertado <br>";
?>