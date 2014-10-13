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
@$id_mate2=$_POST['materiase'];
@$id_maestro=$_POST['maestro'];
@$id_mate=$_POST['mate'];

$materia = new materia();
echo"<br><br>";
echo"<br><br>";
echo"<div class='container'>";
$materia->seleccionaMaestro();
$materia->createMateria($id_mate2,$id_maestro);
$materia->deleteMateria($id_mate);
require("footer.php");
echo"</div>";

?>
</body>
</html>



