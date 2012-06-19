<?php include_once('analytics.php') ?>
<br>
<div id="contactme" class="prepend-1 span-10 colborder">
    <strong>Formulario de Contacto IRT SOFTECH S.A.S</strong>
    <div class="clear"></div><br>
    <p>
    Lo invitamos a que llene cada uno de los campos indicados con
    un asterisco (*) todo esto con el fin de establecer comunicaci&oacute;n con usted.
    </p>
    <br>
<?php
    require_once('recaptcha/recaptchalib.php');
    $public_key='6LeeNMkSAAAAAFR_uIvm9jDYcbTVvtIS3qrWbKXc';
    $private_key='6LeeNMkSAAAAAJgdJ0U7OwhCB98GbcxR5XbyfGAf';
    $errors=array();
    $missing=array();
    $mensaje='';
    //funcion principal
    if(isset($_POST['enviar'])){
        // correo a procesar 
        $to = 'info@irt.net.co';
        $subject = 'Solicitud desde irt.net.co';
        // campos esperados
        $expected= array('nombre','correo','mensaje');
        //campos requeridos
        $required=array('nombre','mensaje', 'correo');     
        $headers="From: info@irt.net.co <info@irt.net.co>"."\r\n";
        $headers.='Content-Type: text/plain; charset=utf-8';
        /*VALIDACION A TRAVES DE RECAPTCHA 1.11
         * recaptcha_get_answer() toma cuatro argumentos:
         * la clave privada, la supervariable PHP para verificar
         * la direccion IP del cliente que hace la peticion, y
         * las dos variables del $_POST el desafio y la respuesta
        */
        $response= recaptcha_check_answer($private_key, $_SERVER['REMOTE_ADDR'],$_POST['recaptcha_challenge_field'],$_POST['recaptcha_response_field']);
        if(!$response->is_valid ){
            $errors['recaptcha']=true;
        }
        require('processmail.php');
        if($mailSent){
            header('Location: index.php?irt=12');
        }
    }      
?>

<?php
    if($_POST  && $suspect || ($_POST && isset($errors['mailfail']))){ ?>
      <p> Disculpe, su correo de contacto no fue enviado correctamente. Intentelo m&aacute;s tarde.</p>  
    <?php }
    elseif($missing || $errors){ ?>
        <p> Verifique los items indicados y cambielos.</p> 
    <?php }
?>


<form method="post" action="" name="contactme">
    <label for="nombre">*Nombre:
        <?php if ($missing && in_array('nombre', $missing)) { ?>
        <span class="warning">Ingrese su Nombre</span>
        <?php } ?>
    </label>
    <br>
    <input name="nombre" type="text" <?php if ($missing || $errors) { 
                 echo 'value="' . htmlentities($nombre, ENT_COMPAT, 'UTF-8') . '"';
        } ?>>
    <br>
    <label for="correo"> *Correo:
    <?php if ($missing && in_array('correo', $missing)) { ?>
    <span class="warning">Por favor ingrese una direcci&oacute;n de correo</span>
    <?php } ?>
    </label>
    <br>
     <input name="correo" id="correo" type="text"
         <?php if($missing || $errors ){
            echo 'value="'.htmlentities($correo, ENT_COMPAT, 'UTF-8').'"';                     
         }
         ?>>
    <br>
     <label for="mensaje">*Mensaje:
                <?php if ($missing && in_array('mensaje', $missing)) { ?>
                  <span>Por favor ingrese el mensaje</span>
                <?php } ?>
                </label>
                <br>
                <textarea name="mensaje" id="mensaje">
                    <?php
                    if ($missing || $errors) {
                      echo htmlentities($mensaje, ENT_COMPAT, 'UTF-8');
                    } ?>
                </textarea>
                <div class="clear"></div>
    <br>
    <p>*Por favor llenar el captcha es un elemento de seguridad</p>
    <div id="recaptcha_widget_div">
    <?php
        //por si existe el error
        if(isset($errors['recaptcha'])){ ?>
            <p>El Captcha no coincide. Int&eacute;ntelo de nuevo.</p>
    <?php }
    //muestra el widget de recaptcha
        echo recaptcha_get_html($public_key);
        ?>
    </div>
    <br>    
    <input type="submit" name="enviar" id="enviar" value="Enviar"><br>  
</form>
<div class="clear"></div><br>
</div>

<div class="span-11 last">
    <strong>Canales de comunicaci&oacute;n para servicio al Cliente </strong>
    <div class="clear"></div><br>
    <p>
        Fieles a nuestra decidida orientaci&oacute;n al cliente, basada en
        la generaci&oacute;n de confianza, ponemos a su disposici&oacute;n
        nuestros datos de comunicaci&oacute;n para atender sus
        opiniones o solicitudes:
    </p>
    <div class="clear"></div><hr>
    C&oacute;digos QR - para contacto
    <div class="clear"></div><br>
    <div class="span-2 colborder">
        <img src="img/qr.png" width="70px">
        <div class="clear"></div><br><br><br>
    </div>
    <div class="span-3 colborder">
        <img src="img/nancy_qr_p.png" height="70px">
        <small>Gerente Comercial</small>
        <div class="clear"></div><br>
    </div>
    <div class="span-3 last">
        <img src="img/info_qr_mp.png" height="70px">
        <small>Informaci&oacute;n en General</small>
    </div>
    <div class="clear"></div><hr>
</div>
<div class="span-11">
            <strong>Solicite informaci&oacute;n de productos</strong>
            <div class="clear"></div><br>
            <div class="span-7">
                <p>
                    Correo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:info@irt.net.co<br>
                    Pbx&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:679 3202<br>
                    TeleFax&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:674 2490<br>
                    Celular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:312 474 7245<br>
                    Direcci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;:Carrera 21 # 162-43<br>
                    Ciudad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:Bogota - Colombia<br>
                    <a href="http://maps.google.es/maps/ms?msid=208797800535590152559.0004afc742284a38d90b8&msa=0&ll=4.743653,-74.044139&spn=0.002593,0.005284">Ubicaci&oacute;n Por Google Maps</a>
                </p>
            </div>
            <div class="span-3 last">
                <!--<img src="img/book.png">-->
                <img src="img/operator.png" height="110px">
            </div>
</div>