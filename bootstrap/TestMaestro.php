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
 * Time: 08:11 PM
 */


require("Maestro.php");


$maestro = new Maestro();


$maestro->deleteUsuario(5);
?>