<?php
require("Seguridad.php");
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 2/10/14
 * Time: 07:52 PM
 */
?>
<?php
require("Seguridad2.php");
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
require ("Usuario.php");
require ("bd.php");

$usuario = new usuario;


/*echo"<br><br>";

$usuario->createUsuario("Jonathan Giovanni","Manches","Unit","Admin");
$usuario->updateUsuario(12,"Raul","Gomez","Hola","Alumno");/*
$usuario->deleteUsuario(3);
*/
if(isset($_POST["submit"]))
{
    switch($_POST["submit"])
    {
        case "Alta":
            $nombre=$_POST['nombre'];
            $app=$_POST['ap'];
            $apm=$_POST['am'];
            $nivel=$_POST['nivel'];
            $usuario->createUsuario("$nombre","$app","$apm","$nivel");
            break;
        case "Eliminar":
            $usuario->deleteUsuario("$_POST[idd]");
            break;
        case "Modificar":
            $usuario->updateUsuario("$_POST[idm]","$_POST[nombre]","$_POST[ap]","$_POST[am]","$_POST[nivel]");
            break;
        case "Buscar":
            $usuario->readUsuarioS($_POST["idbuscar"]);
            break;
    }
}
echo"<div class='container'>";
echo"<br><br><br><br>
<div class='table-responsive' class='col-xs-4'>
    <form name='alumno' action='TestUsuario.php' method='post'>
        <table  class=\"table table-striped\">
        <tr align='center'><td colspan='2' class='alert-info'><strong>Alta de Usuario</strong></td></tr>
        <tr align='center'><td><strong>Nombre</strong></td><td><input type='text' name='nombre' class='form-control' placeholder='Text input' /></td></tr>
        <tr align='center'><td><strong>ApellidoPaterno</strong></td><td><input type='text' name='ap' class='form-control' placeholder='Text input' /></td></tr>
        <tr align='center'><td><strong>ApellidoMaterno</strong></td><td><input type='text' name='am' class='form-control' placeholder='Text input' /></td></tr>
        <tr align='center'><td><strong>Nivel</strong></td><td><select name='nivel' class='form-control' />
                    <option value='1'>1.Administrador</option>
                    <option value='2'>2.Maestro</option>
                    <option value='3'>3.Alumno</option>
            </select></td>
        </tr>
        <tr align='center'><td colspan='2' align='center'><input class='btn btn-info'  type='submit' name='submit' value='Alta'></td></tr>
        <tr align='center'  class='warning'><td>Id: <input type='text' name='idm' class='form-control' placeholder='Text input' /></td><td><input  class='btn btn-warning' type='submit' name='submit' value='Modificar'></td></tr>
        <tr align='center' class='danger'><td>Id: <input type='text' name='idd' class='form-control' placeholder='Text input' class='col-xs-4' /></td><td><input  class='btn btn-danger' type='submit' name='submit' value='Eliminar'></td></tr>
        <tr align='center' class='primary'><td>Id: <input type='text' name='idbuscar' class='form-control' placeholder='Text input'  class='col-xs-4' /></td><td><input  class='btn btn-primary' type='submit' name='submit' value='Buscar'></td></tr>
        </table>
    </form>
</div>

<div class='alert alert-warning alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong>¡Cuidado!</strong> Es muy importante que leas este mensaje de alerta.
</div>
";

$usuario->readUsuarioG();

require("footer.php");
echo"</div>";
?>
</body>
</html>