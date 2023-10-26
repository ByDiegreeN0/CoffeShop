<?php 

require_once('../../Model/Modelos/Citas.php');

$citas = new Citas;


$id = $_GET['id'];

if($citas = $citas->DeleteCitas($id)){
    echo "<script>
    alert('Se ha eliminado la cita')
    window.location.href = '../../vista/admin/tables.php';
    </script>";
}else {
    echo "<script>
    alert('ha ocurrido un eroror al eliminar')
    window.location.href = '../../vista/admin/tables.php';
    </script>";
}

?>

