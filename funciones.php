<?php
$errores="";

function validaCampoVacio($campo)
{
    if(empty($campo)) 
    {
        $errores= true;
    } 
    else 
    {
        $errores= false;
    }
    return $errores;
}