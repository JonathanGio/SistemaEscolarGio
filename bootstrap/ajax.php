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
require ("Materia.php");
require ("bd.php");

echo"<br><br><br>";
@$id_mate=$_POST['materia'];
@$id_maestro=$_POST['maestro'];
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




$materia->datosMaestro($id_maestro);

$materia->materiasasignadas($id_maestro);

$materia->Asignarnuevasmaterias($id_maestro);


require("footer.php");
echo"</div>";
?>
</body>
</html>