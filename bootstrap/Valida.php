<?php
require ('Codificar.php');
?>
<?php
function quitar ($cadena)
{
    $nopermitidas=array("'","\\","<",">","\",",";","$"," ","/","//");
    $mensaje=str_replace($nopermitidas,"",$cadena);
    return $mensaje;
}
$correo=mysql_real_escape_string($_REQUEST['email']);
$password=mysql_real_escape_string($_REQUEST['password']);
$band= 0;
/*Paso 1: Verificar Usuario*/
if ($band==0)
{
    require("bd.php");
    $password=md5($password);
    $sql = "SELECT  * FROM usuario WHERE Correo='$correo'";
    $consulta = mysql_query($sql) or die ("Error de consulta usuario".mysql_error());
    $filas = mysql_num_rows($consulta);
    if ($filas==0)
    {
        $msg="El usuario no existe, favor de rectificar.";
        print "<meta http-equiv='refresh' content='0; url=../index.php?msg=$msg'>";
        exit;
        $band=1;
    }
}
$sql2="SELECT * FROM usuario WHERE Correo='$correo' AND Pass='$password'";
$consulta2=mysql_query($sql2) or die ("Error consulta".mysql_error());
$cuantos2=mysql_num_rows($consulta2);
if($cuantos2==0)
{
    $msg='El usuario o password no son correctos';
    print"<meta http-equiv='refresh' content='0; url=../index.php?msg=$msg'>";
    exit;
}
if ($band==0)
{
    $idusuario=mysql_result($consulta2,0,'Id');
    $activo=mysql_result($consulta2,0,'Activo');
    $user=mysql_result($consulta2,0,'Usuario');
    if($activo =='NO')
    {
        $msg='El usuario no esta activo, consulte a su administrador';
        print"<meta http-equiv='refresh' content='0; url=../index.php?msg=$msg'>";
        exit;
        $band=1;
    }
    else
    {
        $rugiob=encode_this("rugiob=$idusuario");
        print"<meta http-equiv='refresh' content='0; url=Acceso.php?".$rugiob."'>";

        /*{
            $sql11="CALL bitac('$user','Inicio de Sesion','--')";
            $consulta11=mysql_query($sql11) or die ("");
        }*/
    }
}
?>