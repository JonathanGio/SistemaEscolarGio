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
require ("Grupo.php");
require ("bd.php");


@$id_grupo=$_POST['grupoid'];
@$id_user=$_POST['userid'];

$grupo = new Grupo();
echo"<div class='container'>";


$grupo->createAsignag($id_user,$id_grupo);

$grupo->deleteAsugnag($id_mdetlete);


require("footer.php");
echo"</div>";
?>
</body>
</html>