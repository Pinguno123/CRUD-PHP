<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $server = "localhost";
    $user = "root";
    $pass = "root";
    $database = "myshop";

    $connection = new mysqli($server, $user, $pass, $database);

    $sql = "DELETE FROM clientes WHERE id = $id";
    $connection->query($sql);
}

header("location: /myshop/vistas/administrador/index.php");
exit;
?>