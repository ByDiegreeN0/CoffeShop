<?php 

class Connection {
    private $name = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "coffe";
    private $connect;

    public function __construct(){
        $this->connect = new mysqli($this->name, $this->user, $this->password, $this->db );

        if($this->connect->connect_error){
            die("Error al conectar a base de datos");
        }

        if($this->connect){
            echo "<script>
            console.log('Connected');
            </script>";
        }
    }

    public function connectDatabase(){
        return $this->connect;
    }

    public function closeConnection(){
        if($this->connect){
            $this->connect->close();
        }
    }

  

}

?>