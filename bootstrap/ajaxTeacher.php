<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 8/10/14
 * Time: 11:07 PM
 */
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
require ("Header2.php");
?>
<body>
<?php
require ("Materia.php");
require ("bd.php");

echo"<br><br><br>";
@$idu=$_COOKIE['idu'];
/*if(isset($_POST["submit"]))
{
    switch($_POST["submit"])
    {
        case "Agregar":
            $id_maestro=$_POST['maestro'];
            $id_materia=$_POST['accion'];
            $materia->createMateria($id_materia, $id_maestro);
            break;
        case "Eliminar":
            $materia->deleteMateria($id_mate);
            break;
    }
}*/

$materia = new materia();
echo"<div class='container'>";

$materia->datosMaestroU($idu);
$materia->materiasasignadasU($idu);




require("footer.php");
echo"</div>";
?>
</body>
</html>