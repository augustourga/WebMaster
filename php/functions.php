<?php

function getRandomCode(){
    $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $su = strlen($an) - 1;
    return substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1);
}
 function sendEmail($user_mail,$random_code){
      
   $titulo = "Codigo de validacion, agendachivilcoyonline";
   $txt = "su codigo de validación es:". $random_code ;
   $from = "-faugustourga@gmail.com" ;
   //cuarto parámetro $from
   $bool = mail($user_mail,$titulo,$txt, $from);

return TRUE;
}
