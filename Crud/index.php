<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "myshop";

$connection = new mysqli($server, $user, $pass, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM clientes";
$resultado = $connection->query($sql);

if (!$resultado) {
    die("Invalid query: " . $connection->error);
}
?>

<!doctype html>
<html lang="es">

<head>
    <title>My Shop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container my-5">
            <h2>Lista de clientes</h2>
            <a href="crear.php" class="btn btn-primary" role="button">Crear cliente</a>
            <div class="table-responsive-md my-3">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $resultado->fetch_assoc()) {
                            echo "
                        <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['created_at'] . "</td>
                            <td>
                                <a href='editar.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Editar</a>
                                <a href='eliminar.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Eliminar</a>
                            </td>
                        </tr>
                        ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
        crossorigin="anonymous"></script>
</body>

</html>