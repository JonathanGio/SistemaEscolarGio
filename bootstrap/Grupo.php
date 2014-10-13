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

class Grupo{

    private $id;
    private $idg;
    private $id_asi;

    public function createAsignag($id,$id_g){

        for($i=0;$i<count($id);$i++)
            mysql_query("INSERT INTO `usuario`.`asigna_g`(`Id`,`Idg`) VALUES ($id[$i],$id_g)");
    }
    public function deleteAsugnag($id_asi){

            $delete001 = "DELETE FROM `usuario`.`asigna_g` WHERE `Id`= $id_asi";

            $result003 = mysql_query($delete001) or die ("Error $delete001") ;

    }

}
?>