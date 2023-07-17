<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "myshop";

$connection = new mysqli($server, $user, $pass, $database);

$nombre = "";
$email = "";
$telefono = "";
$direccion = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location: /Crud/index.php");
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM clientes WHERE id = $id";
    $resultado = $connection->query($sql);
    $row = $resultado->fetch_assoc();

    if (!$row) {
        header("location: /Crud/index.php");
        exit;
    }

    $nombre = $row["name"];
    $email = $row["email"];
    $telefono = $row["phone"];
    $direccion = $row["address"];
} else {
    $id = $_POST["id"];
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $telefono = $_POST["phone"];
    $direccion = $_POST["address"];

    do {
        if (empty($nombre) || empty($email) || empty($telefono) || empty($direccion)) {
            $errorMessage = "Todos los campos son requeridos";
            break;
        }

        $sql = "UPDATE clientes SET name = '$nombre', email = '$email', phone = '$telefono', address = '$direccion' WHERE id = $id";

        $resultado = $connection->query($sql);

        if (!$resultado) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Nuevo cliente agregado correctamente";

        header("location: /Crud/index.php");
        exit;

    } while (false);
}
?>

<!doctype html>
<html lang="es">

<head>
    <title>Editar cliente</title>
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
            <h2>Editar el perfil de <?php echo $nombre; ?></h2>
            <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>
            <form method="post">
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="" value="<?php echo $nombre; ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" name="email" id="" value="<?php echo $email; ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-6">
                        <input type="text" name="phone" id="" value="<?php echo $telefono; ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-6">
                        <input type="text" name="address" id="" value="<?php echo $direccion; ?>"
                            class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a href="index.php" class="btn btn-outline-primary" role="button">Cancelar</a>
                    </div>
                </div>
            </form>
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
