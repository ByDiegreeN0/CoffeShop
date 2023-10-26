<?php

require_once('../../Model/Modelos/Connection.php');

$conn = new Connection;
$conn = $conn->connectDatabase();

$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM administrador WHERE admin_correo = '$email' AND admin_password = '$pass'";
$result = mysqli_query($conn, $sql);

$row = mysqli_num_rows($result);

if ($row > 0) {
    session_start();
    $_SESSION['administrador'] = $email;


    header("Location: ../../vista/admin/tables.php");
    exit(); 
} else {
    echo "<script>
        alert('Datos no validos')
        window.location.href = '../../vista/admin/login.html';
    </script>";
}

