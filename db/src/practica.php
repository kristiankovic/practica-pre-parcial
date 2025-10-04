<?php
require_once "bd.php";

$dataBase = new Database();
$conn = $dataBase->getConn();

//Insertar datos en la tabla
if(isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['edad'])){

    $stmt = $conn->prepare("INSERT INTO tbl_clientes (nombre_completo, direccion, edad) VALUES (?, ?, ?)");

    $stmt->bindParam(1, $_POST['nombre']);
    $stmt->bindParam(2, $_POST['direccion']);
    $stmt->bindParam(3, $_POST['edad']);

    $stmt->execute();

    echo "<script>alert('Datos guardados correctamente.');</script>";
    $_SESSION = [];

}

//Mostrar datos en una tabla
$stmt = $conn->prepare("SELECT * FROM tbl_clientes");
$base_datos = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Guadar Usuario</title>
</head>

<body>

    <div class="caja caja-ingreso-datos">

        <form action="#" method="post">

            <legend>Ingresar información...</legend>

            <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre completo" required><br>

            <input type="text" name="direccion" id="direccion" placeholder="Ingrese su dirección" required><br>

            <input type="number" name="edad" id="edad" placeholder="Ingrese su edad" min="8" max="100" required><br>

            <button type="submit">Guardar</button>

        </form>

    </div>

    <div class="caja caja-mostrar-info">

        <table id="info-tabla">

            <caption>Información de usuarios.</caption>

            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Edad</th>
            </thead>

            <tbody>
                <?php foreach ($stmt->fetchAll() as $user) : ?>

                    <tr>
                        <td> <?= $user["id_persona"] ?> </td>
                        <td> <?= $user["nombre_completo"] ?> </td>
                        <td> <?= $user["direccion"] ?> </td>
                        <td> <?= $user["edad"] ?> </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</body>

</html>