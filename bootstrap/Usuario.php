<?php
require("Seguridad2.php");
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 2/10/14
 * Time: 07:52 PM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 18/09/14
 * Time: 07:47 PM
 */
class Usuario {
    private $id;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $Telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contrasena;
    private $nivel;
    private $Estatus;


    public function createUsuario($nombre,$apellidop,$apellidom,$nivel){
        echo"<br>createUsuario";
        $insert001 = "INSERT INTO usuario (Nombre,ApellidoPaterno,ApellidoMaterno,Pass,Nivel,Estatus,Activo)
        Values ('$nombre','$apellidop','$apellidom','202cb962ac59075b964b07152d234b70','$nivel',1,'SI')";
        $result001 = mysql_query($insert001) or die ("Error $insert001") ;

    }
    public function readUsuarioS($id){
        echo"<br>readUsuarioS";
        $sql02 = "SELECT * FROM usuario WHERE Estatus=2 ORDER BY ApellidoPaterno ASC";
        $result02 = mysql_query($sql02) or die ("Error $sql02") ;
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan='5' align='center'><strong>Estatus de Usuario por Id</strong></td></tr>";
        echo"<tr><td>ID</td><td>NOMBRE</td><td>A PATERNO</td><td>A MATERNO</td><td>ESTATUS</td></tr>";
        while($field = mysql_fetch_array($result02)){
            $this->Id = $field['Id'];
            $this->Nombre = $field['Nombre'];
            $this->ApellidoPaterno = $field['ApellidoPaterno'];
            $this->ApellidoMaterno = $field['ApellidoPaterno'];
            $this->Nivel = $field['Nivel'];
            switch($this->Nivel){
                case 1:
                    $type ="Administrador";
                    break;
                case 2:
                    $type ="Maestro";
                    break;
                case 3;
                    $type ="Alumno";
                    break;
            }
            echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellidoPaterno</td><td>$this->apellidoMaterno</td><td>$this->nivel</td></tr>";
        }
        echo"</table>";
        echo"</div>";

    }
    public function deleteUsuario($id){
        echo"<br>deleteUsuario";
        $delete001 = "DELETE FROM usuario WHERE Id=$id;";
        $result003 = mysql_query($delete001) or die ("Error $delete001") ;
    }
    public function updateUsuario($id,$nombre,$apellidop,$apellidom,$nivel){
        echo"<br>updateUsuario";
        $update001 = "UPDATE usuario SET Nombre='$nombre',ApellidoPaterno='$apellidop',ApellidoMaterno='$apellidom',Nivel='$nivel' WHERE Id=$id";
        $result002 = mysql_query($update001) or die ("Error $update001") ;
    }

    public function readUsuarioG(){
        echo"<br>readUsuarioG";
        $sql01 = "SELECT * FROM usuario WHERE Estatus=1 ORDER BY ApellidoPaterno ASC";
        $result01 = mysql_query($sql01) or die ("Error $sql01") ;

        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan='5' align='center' class='alert-info'><strong>Lista de usuario</strong></td></tr>";
        echo"<tr align='center'><td>ID</td><td>NOMBRE</td><td>A PATERNO</td><td>A MATERNO</td><td>ESTATUS</td></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->id = $field['Id'];
            $this->nombre = $field['Nombre'];
            $this->apellidoPaterno = $field['ApellidoPaterno'];
            $this->apellidoMaterno = $field['ApellidoPaterno'];
            $this->nivel = $field['Nivel'];
            switch($this->nivel){
                case 1:
                    $type ="Administrador";
                    break;
                case 2:
                    $type ="Maestro";
                    break;
                case 3;
                    $type ="Alumno";
                    break;
            }
            echo"<tr align='center'><td>$this->id</td><td>$this->nombre</td><td>$this->apellidoPaterno</td><td>$this->apellidoMaterno</td><td>$this->nivel</td></tr>";
        }
        echo"</table>";
        echo"</div>";
    }
}
?>

