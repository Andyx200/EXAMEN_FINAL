<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    if (isset($_POST["nombre"]) && isset($_POST["correo"]) ) {
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        

        // Conexión a la base de datos (reemplaza los valores con tus propias credenciales)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "registro";

        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para insertar los datos del nuevo usuario en la tabla "usuarios"
        $sql = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";

        if ($conn->query($sql) === TRUE) {
            echo "Usuario registrado exitosamente.";

            echo '<div style="text-align: center; margin-top: 20px;">
            <a href="index.php">Regresar a la página principal</a>
          </div>';


        } else {
            echo "Error al registrar al usuario: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    } else {
        echo "Faltan datos del formulario.";
    }

    
}
?>
