<?php
require("Seguridad.php");
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 2/10/14
 * Time: 07:52 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<?php
require ("Header.php");
?>
<body>
<?php
require ("Grupo.php");
require ("bd.php");

$grupo = new Grupo();

if(isset($_REQUEST["submit"]))
{
    switch($_REQUEST["submit"])
    {
        case "Añade":
            $id1=$_POST['checkbox'];
            $app=$_POST['groupid'];
            $grupo->createAsignag($id1,$app);
            break;
        case "Eliminar":
            $_REQUEST["varid"];
            $grupo->deleteAsugnag($_REQUEST["varid"]);
            break;
    }
}


echo"<div class='container'>";
echo"<br<br><br>";
echo"<br<br><br>";
echo"<br<br><br>";
$sql01 = "SELECT * FROM usuario WHERE Nivel=3";
$result01 = mysql_query($sql01) or die ("Error $sql01") ;

echo"<div class=table-responsive>";
echo"<form name='fi' action='Asignargrupo.php' method='post'>";
echo"<table class=\"table table-striped\">";
echo"<tr><td colspan='6' align='center' class='alert-info'><strong>Lista de Alumnos</strong></td></tr>";
echo"<tr align='center'><td>ASIGNAR</td><td>ID</td><td>NOMBRE</td><td>A PETERNO</td><td>A MATERNO</td></tr>";
while($field = mysql_fetch_array($result01)){
    $id = $field['Id'];
    $nombre = $field['Nombre'];
    $apellidoPaterno = $field['ApellidoPaterno'];
    $apellidoMaterno = $field['ApellidoMaterno'];
    $nivel = $field['Nivel'];

    $sql07 = "SELECT g.`N_grupo` AS nobre FROM asigna_g AS a, grupo AS g WHERE a.`Id`= $id  AND g.`Idg`=a.`Idg`";
    $result07 = mysql_query($sql07) or die ("Error $sql07") ;
    $esult07 = mysql_fetch_array($result07);
    $nobre = $esult07['nobre'];

    if($esult07 > 0){
        echo"<tr align='center'><td>$id</td><td>$nombre</td><td>$apellidoPaterno</td><td>$apellidoMaterno</td><td><input type='hidden' name='varid' value=$id />$nobre<a href=Asignargrupo.php?varid=$id&submit=Eliminar>Desasignar</a></td></tr>";
    }else{
        echo"<tr align='center'><td><input name='checkbox[]' type='checkbox' id='checkbox' value='$id'/></td><td>$id</td><td>$nombre</td><td>$apellidoPaterno</td><td>$apellidoMaterno</td></tr>";
    }


}

echo"<tr align='center'><td colspan='5' ><strong>Grupos:</strong><br><select name='groupid'>";
$sql04 = "SELECT * FROM grupo ORDER BY N_grupo ASC";
$result04 = mysql_query($sql04) or die ("Error $sql04");
while($field = mysql_fetch_array($result04)){
    $idg = $field['Idg'];
    $nombre_g = $field['N_grupo'];
    echo"

                <option value=$idg>$nombre_g</option>";
}
echo" </select></td></td></tr>";
echo"<tr><td colspan='5' align='center'><input type=submit value=Añade name=submit  class='btn btn-success' /></td>";
echo"</table>";
echo"</form>";
echo"</div>";
echo"</table>";
require("footer.php");
echo"</div>";
?>
</body>
</html>