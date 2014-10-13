<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 8/10/14
 * Time: 12:22 AM
 */
	@$idu=$_COOKIE['idu'];
	@$accesos=$_COOKIE['acceso'];
	if($idu=="" or $accesos=="")
    {
        print "<meta http-equiv='refresh' content='0; url=../index.php?msg='>";
        exit;
    }
	@session_start();
	@$idu2=$_SESSION['idu'];
	@$acceso2=$_SESSION['acceso'];
	if ($idu2=="" or $acceso2=="")
    {
        print "<meta http-equiv='refresh' content='0; url=../index.php?msg='>";
        exit;
    }
    require("bd.php");
	$s="SELECT * FROM usuario WHERE Id=$idu";
	$c=mysql_query($s) or die ("error de user");
	$m=mysql_result($c, 0 , 'Nivel');
    if($m=='2' or $m=='3'){
    echo utf8_decode("<script>alert ('USTED NO TIENE LOS PERMISOS PARA REALIZAR ESTA ACCIÓN')</script>");
    print "<meta http-equiv='refresh' content='0; url=index.php?msg='>";
    exit;
}
?>