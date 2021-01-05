<?php
    function sa($longitud){
        $caracteres='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num_caracteres=strlen($caracteres);
        $strAleatorio='';
        for ($i=0; $i<$longitud ; $i++) { 
            $strAleatorio.=$caracteres[rand(0,$num_caracteres.1)];
        }
        return $strAleatorio;
    }


?>