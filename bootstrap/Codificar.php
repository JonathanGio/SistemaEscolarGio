<?php
function encode_this($string)
{
    $string=utf8_encode($string);
    $control='ITIC71';
    $string=$control.$string.$control;
    $string=base64_encode($string);
    return $string;
}
?>