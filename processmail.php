<?php
    $suspect=false;
    $pattern='/Content-Type:|Bcc:|Cc:/i';
    
//Funcion para verificar frases sospechosas
        //&$suspect cambia cualquier valor presente en el pues es parametro por referencia
    function isSuspect($val, $pattern, &$suspect){
        /*si la variable es una matriz, recorrer cada elemento
         y pasar de forma recursiva de nuevo a la misma función
        */
        if(is_array($val)){
            foreach($val as $item){
                isSuspect($item,$pattern, $suspect);
            }
            
        }
        else{
            //si una de las frases sospechoso se encuentra, establezca el valor true en Booleano
            if(preg_match($pattern,$val)){
                //preg_match = Realiza una comparación con una expresión regular
                $suspect=true;
            }
        }
    }
        if(!$suspect){
            foreach ($_POST as $key => $value) {
                /* asignar a la variable temporal y
                Eliminar espacios en blanco si no es una matriz*/
                $temp = is_array($value) ? $value : trim($value);
                // si está vacío y es necesario, agrega a $missing array
                    if (empty($temp) && in_array($key, $required)) {
                        $missing[] = $key;
                    }
                    elseif (in_array($key, $expected)) {
                        // de lo contrario, se asigna a una variable del mismo nombre que $ key
                        ${$key} = $temp;
                    }
            }
        }      

    if(!$suspect && !empty($correo)){
        
        $validemail=filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
       
        if($validemail){
            $headers.="\r\nReply-To: $validemail";
        }
        else{
            $errors['correo']=true;
        }        
    }
    
    $mailSent=false;
    //continua sólo si no se campo sospechoso y todos los campos requeridos estan
    //verifica que todos estas variables esten negativas para continuar
    if(!$suspect && !$missing && !$errors){
        //inicializa la variable mensaje
        $message='';
        //loop para verificar el array $expected
        foreach($expected as $item){
            //asignar el valor del elemento actual de $val
            //${$item} se refiere a  $nombre
            if(isset(${$item}) && !empty(${$item})){
                $val=${$item};                
            }
            else{
                //si no tiene ningún valor, asignar "no seleccionado"
                $val='No seleccionado';
            }
            //Si una matriz, separada por comas
            if(is_array($val)){
                //implode Une elementos de un array en una cadena
                $val=implode(' , ',$val);
            }
            //sustituir por rayas y guiones en las etiquetas con espacios
            $item= str_replace(array('_','-'),' ', $item);
            //agregar valores a la etiqueta y al cuerpo del mensaje
            //ucfirst->Convierte el primer caracter de una cadena a mayúsculas
            $message.=ucfirst($item).": $val\r\n\r\n";
        }
        //limite de longitud dell mensaje de 70 caracteres
        //wordwrap — Ajusta un string hasta un número dado de caracteres
        $message=wordwrap($message,70);
        //Despues de tanto dar vueltas y validaciones este es el envio del mensaje
        $mailSent=mail($to, $subject, $message, $headers);
            if(!$mailSent){
                $errors['mailfail']=true;
            }
    }
?>