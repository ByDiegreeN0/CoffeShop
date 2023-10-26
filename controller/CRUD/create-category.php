<?php 

require_once('../../Model/Models/Categorias.php');

$citas = new Categorias;
$CategoryName = $_POST['category'];

if($citas->Create($CategoryName)){
    echo "<script>
    alert('Se ha creado una categoria con exito')
    window.location.href = '../../View/admin/tables.php';
    </script>";
}else {
    echo "<script>
    alert('Ha ocurrido un error, intentalo otra vez')
    window.location.href = '../../View/admin/tables.php';
    </script>";
}


?>
