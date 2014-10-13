<?php
@$idu=$_COOKIE['idu'];
@$accesos=$_COOKIE['acceso'];
if($idu=="" or $accesos=="")
    {
        $msg="Ingresa tus datos...";
        print "<meta http-equiv='refresh' content='0; url=../index.php?msg=$msg'>";
        exit;
    }
    @session_start();
        @$idu2=$_SESSION['idu'];
        @$acceso2=$_SESSION['acceso'];
        if ($idu2=="" or $acceso2=="")
        {
            $msg="Ingresa tus datos2...";
            print "<meta http-equiv='refresh' content='0; url=../index.php?msg=$msg'>";
            exit;
        }
?>