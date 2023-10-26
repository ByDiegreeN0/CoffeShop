<?php

require_once("Connection.php");


class Citas extends Connection {

private $id;
private $name;
private $correo;
private $fecha;
private $tel;
private $categoria;
private $connect;

public function __construct(){
    parent::__construct();
    $this->connect = $this->connectDatabase(); // conecta la base de datos
}

public function CreateCita($name, $correo, $fecha){
    $sql = "INSERT INTO citas (cita_name, cita_correo, cita_fecha) VALUES (?,?,?)";
    $prepare = $this->connect->prepare($sql);

    if($prepare){
        $prepare->bind_param("sss", $name, $correo, $fecha);

        if($prepare->execute()){
            $prepare->close();
            return true;
        }else {
            $prepare->close();
            return false;
        }
    }else {
        return false;
    }
}

public function GetCitas(){
    $sql = "SELECT * FROM citas";
    $row = $this->connect->query($sql);

    if($row){
        return $row->fetch_all(MYSQLI_ASSOC);
    }else {
        return false;
    }
}

public function GetCitasById($id) {
    $sql = "SELECT * FROM citas where cita_id = ?";
    $stmt = $this->connect->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    } else {
        return false; 
    }
}

public function UpdateCitas($id, $name, $correo, $fecha){
    $sql = "UPDATE citas SET cita_name = ?, cita_correo = ?, cita_fecha = ? WHERE cita_id = ?";
    
    $stmt = $this->connect->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssi",$name, $correo, $fecha, $id);
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    } else {
        return false;
    }
}


public function DeleteCitas($id){
    $sql = "DELETE FROM citas where cita_id = ?";
    $prepare = $this->connect->prepare($sql);

    if($prepare){
        $prepare->bind_param("i", $id);

        if($prepare->execute()){
            $prepare->close();
            return true;
        }else {
            $prepare->close();
            return false;
        }
    }else {
        return false;
    }
}

}

?>
