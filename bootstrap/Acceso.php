<?php
require("Decodificar.php");

if($_GET)
{
    decode_get($_SERVER["REQUEST_URI"]);
    $idusuario=$_GET['rugiob'];
    if($idusuario=="")
    {
        $msg="Parece que nunca antes intentaste acceder al sistema desde este navegador.";
        print "<meta http-equiv='refresh' content='0;url=../index.php?msg=$msg'>";
        exit;
    }
    else
    {
    require("bd.php");
    $s="SELECT * FROM usuario WHERE Id=$idusuario";
    $c=mysql_query($s) or die ("error de user");
    $m=mysql_result($c, 0 , 'Nivel');
        if($m=='2')
        {
            setCookie('idu',$idusuario);
            setCookie('acceso',1);
            @session_start();
            $_SESSION['idu']=$idusuario;
            $_SESSION['acceso']=1;
            //echo utf8_decode("<script>alert ('USTED NO TIENE LOS PERMISOS PARA REALIZAR ESTA ACCIÓN')</script>");
            print "<meta http-equiv='refresh' content='0; url=indexTeacher.php?msg='>";
            exit;
        }
           else
           {
               if($m=='1')
               {
                setCookie('idu',$idusuario);
                setCookie('acceso',1);
                @session_start();
                $_SESSION['idu']=$idusuario;
                $_SESSION['acceso']=1;
                print"<meta http-equiv='refresh' content='0;url=index.php'>";
                exit;
               }
           }
    }
}
?>