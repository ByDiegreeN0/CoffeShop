<?php


class Admin extends Connection
{
    private $id;
    private $ident;
    private $name;
    private $correo;
    private $password;
    private $connect;

    public function __construct()
    {
        parent::__construct();
        $this->connect = $this->connectDatabase();
    }

    public function AdminAuth($correo, $password)
    {
        $sql = "SELECT * FROM administrador WHERE admin_correo = ?, and admin_password = ?";
        $prepare = $this->connect->prepare($sql);

        if($prepare){
            $prepare->bind_param('ss', $correo, $password);

           $prepare->execute();

           $result = $prepare->get_result();

           if($result->num_rows === 1){
                // TERMINAR (probablemente no se use)
           }
        }
    }
}
