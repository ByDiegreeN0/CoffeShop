<?php 

require_once('../../model/Modelos/Citas.php');

$cita = new Citas;
$name = $_POST['name'];
$email = $_POST['email']; 
$date = $_POST['date'];


if($cita->CreateCita($name, $email, $date)){
    echo "<script>
    window.location.href = '../../vista/coffe/index.php';
    alert('Tu cita fue registrada')
    </script>";
}else {
    echo "<script>
    alert('Un error ha ocurrido, intentalo otra vez')
    window.location.href = '../../vista/coffe/index.php';
    </script>";
}






?>