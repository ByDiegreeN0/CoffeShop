<?php 
require_once('../../Model/Modelos/Citas.php');

$id = $_POST['id'];
$name = $_POST['name'];
$correo = $_POST['email'];
$fecha = $_POST['date'];




$citas = new Citas;

if($citas = $citas->UpdateCitas($id, $name, $correo, $fecha)){
    echo "<script>
    alert('Se actualizó con exito')
    window.location.href = '../../vista/admin/tables.php';
    </script>";
}else {
    echo "<script>
    alert('ha ocurrido un eroror al actualizar')
    window.location.href = '../../vista/admin/tables.php';
    </script>";
}


?>