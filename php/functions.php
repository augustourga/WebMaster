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

function are_u_assistant($user_name, $id_publication){
      include("connections.php");
      $asistente = "SELECT user_name FROM assistants WHERE user_name = '$user_name' AND id_publication='$id_publication'";
      $consulta = mysqli_query($conexion,$asistente) or die (mysqli_error($conexion));
        if($consulta){


            $cant_reg_consulta= mysqli_num_rows($consulta);

               if ($cant_reg_consulta>0) {

                /*es asistente*/
                return TRUE;

               } else{
                /*no es asistente*/
                return FALSE;
               }
           }
           else{
           echo "error en la consulta";
           }

}

function are_u_interested($user_name, $id_publication){
  include("connections.php");
  $interesado = "SELECT user_name FROM interested WHERE user_name = '$user_name' AND id_publication='$id_publication'";
      $consulta = mysqli_query($conexion,$interesado) or die (mysqli_error($conexion));
        if($consulta){


            $cant_reg_consulta= mysqli_num_rows($consulta);

               if ($cant_reg_consulta>0) {

                /*es asistente*/
                return TRUE;

               } else{
                /*no es asistente*/
                return FALSE;
               }
           }
           else{
           echo "error en la consulta";
           }

}

 function desinterest_me($id_publication){
 session_start(); 
  if(isset($_SESSION['user_name'])){

    include("connections.php");
    $user_name = $_SESSION['user_name'];
    $consulta = mysqli_query($conexion,"DELETE FROM interested WHERE id_publication = '$id_publication' AND user_name ='$user_name'
") or die (mysqli_error($conexion));

        header("Location: screen_publication.php?id_publication=$id_publication");

 }
}
 function interest_me($id_publication){
  session_start();

  if(isset($_SESSION['user_name'])){

    include("connections.php");
    $user_name = $_SESSION['user_name'];
    $consulta = mysqli_query($conexion," INSERT INTO interested (id_publication,user_name) VALUES ('$id_publication' , '$user_name')
") or die (mysqli_error($conexion));

        header("Location: screen_publication.php?id_publication=$id_publication");
  
 }
}
 function desassitant_me($id_publication){
  session_start();
  
  if(isset($_SESSION['user_name'])){
    

    include("connections.php");
    $user_name = $_SESSION['user_name'];
    $consulta = mysqli_query($conexion,"DELETE FROM assistants WHERE id_publication = '$id_publication' AND user_name ='$user_name'
") or die (mysqli_error($conexion));

        header("Location: screen_publication.php?id_publication=$id_publication");

  
 }
}
 function assitant_me($id_publication){
  
  if(isset($_SESSION['user_name'])){
    session_start();
    
    include("connections.php");
    $user_name = $_SESSION['user_name'];
    $consulta = mysqli_query($conexion," INSERT INTO assistants (id_publication,user_name) VALUES ('$id_publication' , '$user_name')
") or die (mysqli_error($conexion));

        header("Location: screen_publication.php?id_publication=$id_publication");
 }
}



