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



class Materia{

    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;

    public function createMateria($id_materia, $id_maestro){

        if($id_materia and $id_maestro != "")
        {
         $insert001 = "INSERT INTO `maestros_materias`(`id_materia`,`id`) VALUES ($id_materia,$id_maestro)";
        $result001 = mysql_query($insert001) or die ("Error $insert001") ;
        }
        else
        {
            echo"";
        }
    }
    public function readMateriaG(){
        echo"<br> Read Materia G";
    }
    public function readMateriaS(){
        echo"<br> Read Materia S";
    }
    public function deleteMateria($id){
        if($id != '')
        {
        $delete001 = "DELETE FROM maestros_materias WHERE idm=$id;";
        $result003 = mysql_query($delete001) or die ("Error $delete001") ;
        }else{
            echo"";
        }
    }
    public function updateMateria(){
        echo"<br> Update Materia";
    }
    public function seleccionaMaestro(){
        echo"<br> <label class='col-sm-2 control-label' for='formGroupInputLarge'>Sellecion de Maestros</label>";
        echo"<div class=tabla-responsive>";
        echo"<form action=ajax.php method=post name=maestro>";
        echo"<table class=\"table table-striped\">
                <tr><td  align='center'><strong>Maestro:</strong></td><td  align='center'> <select name=maestro class=form-control>";
                $sql02 = "SELECT * FROM Maestro WHERE estatus=2 ORDER BY nombre ASC";
                $result02 = mysql_query($sql02) or die ("Error $sql02");
        while($field = mysql_fetch_array($result02)){
            $id_maestro = $field['id'];
            $nombre = $field['nombre'];
            echo"

                <option value=$id_maestro>$nombre</option>";
                }
        echo" </select></td></tr><tr><td colspan=2 align=center><input type=submit value=seleccionar name=seleccionar class='btn btn-primary' /></td></tr></table>
                </form></div>";
    }
    public function datosMaestro($id_maestro){

        $sql03 = "SELECT * FROM maestro WHERE id = $id_maestro";
        $result03 = mysql_query($sql03) or die ("Error $sql03") ;
        echo"<div class=table-responsive>";
        echo"<br> <label class='col-sm-2 control-label' for='formGroupInputLarge'> Maestro seleccionado</label>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan='5' align='center' class=alert-success><strong>Datos del Maestro</strong></td></tr>";
        echo"<tr align='center'><td>ID</td><td>NOMBRE</td><td>AVATAR</td><td>ORDEN</td><td>ESTATUS</td></tr>";
        while($field03 = mysql_fetch_array($result03)){
            $this->id = $field03['id'];
            $this->nombre = $field03['nombre'];
            $this->app = $field03['app'];
            $this->apm = $field03['apm'];
            $this->avatar = $field03['avatar'];
            $this->orden = $field03['orden'];
            $this->estatus = $field03['estatus'];

            echo"<tr align='center'><td>$this->id</td><td>$this->nombre $this->app $this->apm</td><td><img src='$this->avatar' alt='Sin Imagen' class='img-circle' width='50' height='50'></td><td>$this->orden</td><td>$this->estatus</td></tr>";
        }
        echo"</table>";
        echo"</div>";
    }



    public function materiasasignadas($id_maestro){
        $sql0312 = "SELECT ma.`id_materia` AS idmateria, ma.`nombre` AS nommate, mm.`idm` AS isdm FROM maestros_materias AS mm, maestro AS m, materia AS ma
                    WHERE mm.`id`=$id_maestro  AND mm.`id`=m.`id` AND mm.`id_materia`=ma.`id_materia`";
        $result0312 = mysql_query($sql0312) or die ("Error $sql0312") ;
        echo"<div class=table-responsive>";
        echo"<form action=TestMateria.php method=post id=materia>";
        echo"<br> <label class='col-sm-2 control-label' for='formGroupInputLarge'> Materias asignadas</label>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan='5' align='center'  class='alert-danger'><strong>Datos de la materia</strong></td></tr>";
        echo"<tr align='center'><td>ID</td><td>NOMBRE</td><td>ELIMINAR</td></tr>";
        while($field0312 = mysql_fetch_array($result0312)){
            $isdm = $field0312['isdm'];
            $id = $field0312['idmateria'];
            $nombre = $field0312['nommate'];


            echo"<tr align='center' class=alert-danger><td>$id</td><td>$nombre</td><td><input type=hidden id=mate name=mate value=$isdm /><input type=submit value=Eliminar name=Eliminar  class='btn btn-danger' /></td></tr>";
        }
        echo"</table>";
        echo"</form>";
        echo"</div>";
    }


    public function Asignarnuevasmaterias($id_maestro){
            echo"<div class=table-responsive>";
            echo"<form action=TestMateria.php method=post id=materia>";
            echo"<br> <label class='col-sm-2 control-label' for='formGroupInputLarge'> Asignar nuevas materias</label>";
            echo"<table class=\"table table-striped\">";
            echo"<tr><td colspan='2' align='center' class=alert-info><strong>Asignar Nuevas Materias</strong></td></tr>";
            echo"<tr align='center'><td><strong>Materias:</strong></td><td><select name=materiase class=form-control>";
            $sql04 = "SELECT * FROM materia WHERE estatus = 1";
            $result04 = mysql_query($sql04) or die ("Error $sql04") ;
            while($field04 = mysql_fetch_array($result04)){
                $id_materiaa = $field04['id_materia'];
                $opcion = $field04['nombre'];


                $sql07 = "SELECT * FROM maestros_materias WHERE id = $id_maestro and id_materia = $id_materiaa";
                $result07 = mysql_query($sql07) or die ("Error $sql07") ;
                $esult07 = mysql_fetch_array($result07);
                if($esult07 > 0){
                    echo"<option value=0>No Existe</option>";
                }else{
                    echo"<option value=$id_materiaa>$opcion</option>";
                }

            }
            echo"</select></td></tr>";
            echo"<input type=hidden id=accion name=accion value=1 />";
            echo"<input type=hidden id=maestro name=maestro value=$id_maestro />";
            echo"<tr><td colspan=2 align=center><input type=submit value=Agregar name=Agregar class='btn btn-info' /></td></tr>";
            echo"</table></form>";
            echo"</div>";
    }
    public function datosMaestroU($id_maestro){

        $sql037 = "SELECT * FROM usuario WHERE Id = $id_maestro";
        $result037 = mysql_query($sql037) or die ("Error $sql037") ;
        echo"<div class=table-responsive>";
        echo"<br> <label class='col-sm-2 control-label' for='formGroupInputLarge'>Tus Datos</label>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan='5' align='center' class=alert-success><strong>Datos del Maestro</strong></td></tr>";
        echo"<tr align='center'><td>ID</td><td>NOMBRE</td><td>Correo</td><td>User</td><td>Activo</td></tr>";
        while($field037 = mysql_fetch_array($result037)){
            $idU = $field037['Id'];
            $nombreU = $field037['Nombre'];
            $appU = $field037['ApellidoPaterno'];
            $apmU = $field037['ApellidoMaterno'];
            $CorreoU = $field037['Correo'];
            $UsuarioU = $field037['Usuario'];
            $activoU = $field037['Activo'];

            echo"<tr align='center'><td>$idU</td><td>$nombreU $appU $apmU</td><td>$CorreoU</td><td>$UsuarioU</td><td>$activoU</td></tr>";
        }
        echo"</table>";
        echo"</div>";
    }
    public function materiasasignadasU($id_maestro){
        $sql03127 = "SELECT mat.`nombre` AS nombresito
FROM usuario AS u, maestro AS m, maestros_materias AS mm, materia AS mat
WHERE
u.`Nombre`=m.`nombre` AND
m.`id`=mm.`id` AND
mm.`id_materia`=mat.`id_materia` AND
u.`Id`=$id_maestro";
        $result0317 = mysql_query($sql03127) or die ("Error $sql03127") ;
        echo"<div class=table-responsive>";
        echo"<form action=TestMateria.php method=post id=materia>";
        echo"<br> <label class='col-sm-2 control-label' for='formGroupInputLarge'> Materias asignadas</label>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td align='center'  class='alert-info'><strong>Materias Asignadas</strong></td></tr>";
        echo"<tr align='center'><td>NOMBRE</td></tr>";
        while($field03127 = mysql_fetch_array($result0317)){
            $nombresito = $field03127['nombresito'];


            echo"<tr align='center' class=alert-info><td>$nombresito</td></tr>";
        }
        echo"</table>";
        echo"</form>";
        echo"</div>";
    }

}
