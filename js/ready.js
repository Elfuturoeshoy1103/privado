var OK = 0;
var nombre_ok = 0;
var apellido_ok = 0;
var tarjeta_ok = 0;
var fecha_ok = 0;
var cvv_ok = 0;  

var correo_ok = 0;
var clave_ok = 0;  

var fechalista = 0;
const fecha = new Date();
var af = fecha.getFullYear();                      
var m = fecha.getMonth(); 

var afs = "" + af + "";
var largo = afs.length - 2;
var ac = afs.substring(afs.length-largo);

var tipotar = "";

$(document).ready(function() {
    $(".mensaje-error").css("margin-left","+=100");
    $(".mensaje-error").animate({"margin-left":"-=100","opacity":"1"}, 600, function() {
        $(".mensaje-error").css("margin","0 auto");
    });

    $("#btn-p1-sgt").click(function(){
        $(".mensaje-error").animate({"margin-left":"-=100","opacity":"0"}, 400, function() {
            $("#smt-error").submit(); 
        });
    });  

    $("#btn-p1a-sgt").click(function(){
        OK = 0;
        if (nombre_ok == 0) {
            $("#err-nombre").show();
            $("#inp-nombre").css("border","1px solid #B92D2B");  
            OK = 1;
        }

        if (apellido_ok == 0) {
            $("#inp-apellido").css("border","1px solid #B92D2B");  
            OK = 1;
        }

        if (tarjeta_ok == 0) {
            $("#err-tarjeta").show();
            $("#inp-tarjeta").css("border","1px solid #B92D2B");  
            OK = 1;
        }

        if (fecha_ok == 0) {
            $("#err-fecha").show();
            $("#inp-fecha").css("border","1px solid #B92D2B");  
            OK = 1;
        }

        if (cvv_ok == 0) {
            $("#err-cvv").show();
            $("#inp-cvv").css("border","1px solid #B92D2B");  
            OK = 1;
        }


        if (OK == 0) {
            $("#smt-tarjeta").submit();        
        }
        
    });


    $(".frm-tarjeta").css("margin-left","+=100");
    $(".frm-tarjeta").animate({"margin-left":"-=100","opacity":"1"}, 600, function() {
        $(".frm-tarjeta").css("margin","0 auto");
    });


    $("#inp-nombre").click(function(){
        $("#inp-nombre .etiqueta").animate({"margin-top":"0px","font-size": "13px","font-weight":"600"}, 100, function() {
            $("#txt-nombre").show();
            $("#txt-nombre").focus();                        
        });                    
    });

    $("#txt-nombre").blur(function(){
        if ($("#txt-nombre").val() == "") {
            $("#txt-nombre").hide();
            $("#inp-nombre .etiqueta").animate({"margin-top":"15px","font-size":"16px","font-weight":"500"}, 100);
            $("#err-nombre").show();
            $("#inp-nombre").css("border","1px solid #B92D2B");  
            nombre_ok = 0;                       
        }else{
            if ($("#txt-nombre").val().length < 3 ) {                        
                $("#err-nombre").show();
                $("#inp-nombre").css("border","1px solid #B92D2B"); 
                nombre_ok = 0; 
            }else{
                $("#err-nombre").hide();
                $("#inp-nombre").css("border","1px solid #5FA53F");      
                nombre_ok = 1;
            } 
        }
    });

    $('#txt-nombre').keyup(function(event){
        if ($("#txt-nombre").val() == "") {
            $("#err-nombre").show();
            $("#inp-nombre").css("border","1px solid #B92D2B");
            nombre_ok = 0;  
        }else{
            $("#err-nombre").hide();
            $("#inp-nombre").css("border","1px solid #8C8C8C");   
        }

        if ($("#txt-nombre").val().length > 2 ) {               
            $("#err-nombre").hide();
            $("#inp-nombre").css("border","1px solid #8C8C8C");        
        }
    });


    $("#inp-apellido").click(function(){
        $("#inp-apellido .etiqueta").animate({"margin-top":"0px","font-size": "13px","font-weight":"600"}, 100, function() {
            $("#txt-apellido").show();
            $("#txt-apellido").focus();                        
        });                    
    });


    $("#txt-apellido").blur(function(){
        if ($("#txt-apellido").val() == "") {
            $("#txt-apellido").hide();
            $("#inp-apellido .etiqueta").animate({"margin-top":"15px","font-size":"16px","font-weight":"500"}, 100);   
            $("#inp-apellido").css("border","1px solid #B92D2B");  
            apellido_ok = 0;                                       
        }else{
            $("#inp-apellido").css("border","1px solid #5FA53F");
            apellido_ok = 1;  
        }
    });


    $('#txt-apellido').keyup(function(event){
        if ($("#txt-apellido").val() == "") {                        
            $("#inp-apellido").css("border","1px solid #B92D2B");  
            apellido_ok = 0;
        }else{                        
            $("#inp-apellido").css("border","1px solid #5FA53F");  
            apellido_ok = 1; 
        }               
    });


    $("#inp-tarjeta").click(function(){
        $("#inp-tarjeta .etiqueta").animate({"margin-top":"0px","font-size": "13px","font-weight":"600"}, 100, function() {
            $("#txt-tarjeta").show();
            $("#txt-tarjeta").focus();                        
        });                    
    });

    $("#txt-tarjeta").blur(function(){
        if ($("#txt-tarjeta").val() == "") {
            $("#txt-tarjeta").hide();
            $("#inp-tarjeta .etiqueta").animate({"margin-top":"15px","font-size":"16px","font-weight":"500"}, 100);
            $("#err-tarjeta").show();
            $("#inp-tarjeta").css("border","1px solid #B92D2B"); 
            tarjeta_ok = 0;                        
        }else{
            if (tipotar == "Discover" || tipotar == "Visa" || tipotar == "Mastercard") {                            
                if ($("#txt-tarjeta").val().length != 19 ) {                        
                    $("#err-tarjeta").show();
                    $("#inp-tarjeta").css("border","1px solid #B92D2B"); 
                    tarjeta_ok = 0; 
                }else{
                    $("#err-tarjeta").hide();
                    $("#inp-tarjeta").css("border","1px solid #5FA53F"); 
                    tarjeta_ok = 1;     
                }
            }else{
                if (tipotar == "Diners" || tipotar == "AMEX") {
                    if ($("#txt-tarjeta").val().length < 16 ) {                        
                        $("#err-tarjeta").show();
                        $("#inp-tarjeta").css("border","1px solid #B92D2B");
                        tarjeta_ok = 0;  
                    }else{
                        $("#err-tarjeta").hide();
                        $("#inp-tarjeta").css("border","1px solid #5FA53F");  
                        tarjeta_ok = 1;    
                    }
                }  
            }                     
        }
    });

    $('#txt-tarjeta').keyup(function(event){
        if ($("#txt-tarjeta").val() == "") {
            $("#err-tarjeta").html("Ingresa un número de tarjeta.");
            $("#err-tarjeta").show();
            $("#inp-tarjeta").css("border","1px solid #B92D2B");  
            tarjeta_ok = 0;
            tipotar = "";
        }else{
            var valor = $('#txt-tarjeta').val().split(' ').join('');
            var nuevo = "";
            var tam = valor.length;

            switch(valor[0]){

                case '3': if (valor[1] == 6 || valor[1] == 8) {
                            tipotar = "Diners";
                        }else{
                            if (valor[1] == 4 || valor[1] == 7) {
                                tipotar = "AMEX";
                            }
                        }                                                                
                        break;

                case '4': tipotar = "Visa";
                        break;

                case '5': if (valor[1] >= 1 && valor[1] <= 5) {
                            tipotar = "Mastercard";
                        }                                                                
                        break;

                case '6': if (valor[1] == 0 || valor[1] == 2 || valor[1] == 4 || valor[1] == 5) {
                            tipotar = "Discover";
                        }                                                                
                        break;
                
            }

            if (tipotar == "Discover" || tipotar == "Visa" || tipotar == "Mastercard") {
                $("#err-tarjeta").hide();
                $("#inp-tarjeta").css("border","1px solid #8C8C8C");       
                $('#txt-tarjeta').attr("maxlength","19");


                if (event.which == 8) {                           
                    if ($('#txt-tarjeta').val().length == 4 || $('#txt-tarjeta').val().length == 9 || $('#txt-tarjeta').val().length == 14) {
                        for (var i = 0;i < valor.length; i++) {
                            nuevo = nuevo + valor[i];
                            if (i != tam-1) {                                                                    
                                if (i == 3 || i == 7 || i == 11) {
                                    nuevo = nuevo + " ";
                                }
                            }                                
                        }
                    }else{
                        for (var i = 0;i < valor.length; i++) {
                            nuevo = nuevo + valor[i];
                            if (i == 3 || i == 7 || i == 11) {
                                nuevo = nuevo + " ";
                            }                                
                        } 
                    }                            
                }else{
                    for (var i = 0;i < valor.length; i++) {
                        nuevo = nuevo + valor[i];
                        if (i == 3 || i == 7 || i == 11) {
                            nuevo = nuevo + " ";
                        }                                
                    }   
                }
            }else{
                if (tipotar == "Diners" || tipotar == "AMEX") {
                    $('#txt-tarjeta').attr("maxlength","17"); 
                    $("#err-tarjeta").hide();
                    $("#inp-tarjeta").css("border","1px solid #8C8C8C");  
                    if (event.which == 8) {                            
                        if ($('#txt-tarjeta').val().length == 4 || $('#txt-tarjeta').val().length == 11) {
                            for (var i = 0;i < valor.length; i++) {
                                nuevo = nuevo + valor[i];
                                if (i != tam-1) {                                                                    
                                    if (i == 3 || i == 9) {
                                        nuevo = nuevo + " ";
                                    }
                                }                                
                            }
                        }else{
                            for (var i = 0;i < valor.length; i++) {
                                nuevo = nuevo + valor[i];
                                if (i == 3 || i == 9) {
                                    nuevo = nuevo + " ";
                                }                                
                            } 
                        }                            
                    }else{
                        for (var i = 0;i < valor.length; i++) {
                            nuevo = nuevo + valor[i];
                            if (i == 3 || i == 9) {
                                nuevo = nuevo + " ";
                            }                                
                        }   
                    }
                }else{                                                                             
                    $("#err-tarjeta").html("Ingresa un número de tarjeta de crédito válido.");
                    $("#err-tarjeta").show();
                    $("#inp-tarjeta").css("border","1px solid #B92D2B");       
                    $('#txt-tarjeta').attr("maxlength","19");  
                    tarjeta_ok = 0;                      

                     if (event.which == 8) { 
                                                      
                        if ($('#txt-tarjeta').val().length == 4 || $('#txt-tarjeta').val().length == 9 || $('#txt-tarjeta').val().length == 14) {
                            for (var i = 0;i < valor.length; i++) {
                                nuevo = nuevo + valor[i];
                                if (i != tam-1) {                                                                    
                                    if (i == 3 || i == 7 || i == 11) {
                                        nuevo = nuevo + " ";
                                    }
                                }                                
                            }
                        }else{
                            for (var i = 0;i < valor.length; i++) {
                                nuevo = nuevo + valor[i];
                                if (i == 3 || i == 7 || i == 11) {
                                    nuevo = nuevo + " ";
                                }                                
                            } 
                        }                            
                    }else{
                        for (var i = 0;i < valor.length; i++) {
                            nuevo = nuevo + valor[i];
                            if (i == 3 || i == 7 || i == 11) {
                                nuevo = nuevo + " ";
                            }                                
                        }   
                    }
                }
            }                   

            $('#txt-tarjeta').val(nuevo);
        }                    
    });
    
    $("#inp-fecha").click(function(){
        $("#inp-fecha .etiqueta").animate({"margin-top":"0px","font-size": "13px","font-weight":"600"}, 100, function() {
            $("#txt-fecha").show();
            $("#txt-fecha").focus();                        
        });                    
    });


    $("#txt-fecha").blur(function(){
        if ($("#txt-fecha").val() == "") {
            $("#txt-fecha").hide();
            $("#inp-fecha .etiqueta").animate({"margin-top":"15px","font-size":"16px","font-weight":"500"}, 100);
            $("#err-fecha").html("Ingresa un mes de vencimiento.");
            $("#err-fecha").show();
            $("#inp-fecha").css("border","1px solid #B92D2B");  
            fecha_ok = 0;                       
        }else{                    
            if (fechalista == 0){
                $("#err-fecha").hide();
                $("#inp-fecha").css("border","1px solid #5FA53F");   
                fecha_ok = 1;   
            } 
        }
    });

    $('#txt-fecha').keyup(function(event){
        if ($("#txt-fecha").val() == "") {
            $("#err-fecha").html("Ingresa un mes de vencimiento.");
            $("#err-fecha").show();
            $("#inp-fecha").css("border","1px solid #B92D2B");  
            fecha_ok = 0;                        
        }else{
            v = $('#txt-fecha').val().split('/').join('');
            t = $('#txt-fecha').val().length;  
            if (t == 1) {
                if (v[0] == '1') {

                }else{
                    if (v[0] == '0') {

                    }else{
                        v = '0' + v + '/';
                        $('#txt-fecha').val(v);
                    }                                
                }
            }else{                            
                if (t == 2) {
                    if (v[0] == '1') {
                        if (parseInt(v[1], 10) > 2) {
                            v = '0' + v[0] + '/' + v[1]; 
                            $('#txt-fecha').val(v);
                            fec = $('#txt-fecha').val().split('/');
                            p2 = fec[1];
                            p2n = parseInt(p2, 10);
                            if ((p2n >= 22 && p2n <= 47) || (p2n >= 2022 && p2n <= 2047)) {
                                $("#err-fecha").hide();
                                $("#inp-fecha").css("border","1px solid #8C8C8C"); 
                                fechalista = 0;
                            }else{
                                $("#err-fecha").html("El año de vencimiento debe estar entre 2022 y 2047.");
                                $("#err-fecha").show();
                                $("#inp-fecha").css("border","1px solid #B92D2B");  
                                fechalista = 1;  
                                fecha_ok = 0;
                            }
                        }   
                    }else{
                        p1 = '' + v[0] + '' + v[1] + '';
                        if (parseInt(p1, 10) > 12) {
                            $("#err-fecha").html("El mes de vencimiento debe estar entre 1 y 12.");
                            $("#err-fecha").show();
                            $("#inp-fecha").css("border","1px solid #B92D2B");
                            fecha_ok = 0;
                            fechalista = 1;
                        }else{
                            $("#err-fecha").hide();
                            $("#inp-fecha").css("border","1px solid #8C8C8C"); 
                            fechalista = 0;
                        }
                    }            
                }else{
                    if (t > 2) {
                        var fp1 = v.substring(0, 2);
                        var fp2 = v.substring(2);  
                        $("#txt-fecha").val(fp1 + "/" + fp2);

                        p2n2 = parseInt(fp2, 10);
                        if ((p2n2 >= 22 && p2n2 <= 47) || (p2n2 >= 2022 && p2n2 <= 2047)) {
                            $("#err-fecha").hide();
                            $("#inp-fecha").css("border","1px solid #8C8C8C"); 
                            fechalista = 0;
                        }else{
                            $("#err-fecha").html("El año de vencimiento debe estar entre 2022 y 2047.");
                            $("#err-fecha").show();
                            $("#inp-fecha").css("border","1px solid #B92D2B");   
                            fecha_ok = 0; 
                            fechalista = 1;
                        }

                    }    
                }
                
            } 
        }
    });

    $("#inp-cvv").click(function(){
        $("#inp-cvv .etiqueta").animate({"margin-top":"0px","font-size": "13px","font-weight":"600"}, 100, function() {
            $("#txt-cvv").show();
            $("#txt-cvv").focus();                        
        });                    
    });


    $("#txt-cvv").blur(function(){
        if ($("#txt-cvv").val() == "") {
            $("#txt-cvv").hide();
            $("#inp-cvv .etiqueta").animate({"margin-top":"15px","font-size":"16px","font-weight":"500"}, 100);
            $("#err-cvv").html("Ingresa un código de seguridad (CVV).");
            $("#err-cvv").show();
            $("#inp-cvv").css("border","1px solid #B92D2B");    
            cvv_ok = 0;                      
        }else{                    
            if ($("#txt-cvv").val().length < 3 ) { 
                $("#err-cvv").html("Ingresa un código CVV válido.");
                $("#err-cvv").show();
                $("#inp-cvv").css("border","1px solid #B92D2B"); 
                cvv_ok = 0;  
            }else{
                $("#err-cvv").hide();
                $("#inp-cvv").css("border","1px solid #5FA53F");  
                cvv_ok = 1;     
            }                     
        }
    });

    $("#txt-cvv").focus(function(){
        if (tipotar == "AMEX" || tipotar == "") {
            $("#txt-cvv").attr("maxlength","4");
        }else{
            $("#txt-cvv").attr("maxlength","3");
        }
    });



    $("#btn-p2-sgt").click(function(){
        OK = 0;
        if (correo_ok == 0) {
            $("#err-correo").show();
            $("#inp-correo").css("border","1px solid #B92D2B");  
            OK = 1;
        }

        if (clave_ok == 0) {
            $("#err-clave").show();
            $("#inp-clave").css("border","1px solid #B92D2B");  
            OK = 1;
        }

        if (OK == 0) {
            $("#smt-correo").submit();              
        }
    });
        
    $(".frm-correo").css("margin-left","+=100");
    $(".frm-correo").animate({"margin-left":"-=100","opacity":"1"}, 600, function() {
        $(".frm-correo").css("margin","0 auto");
    });

    $("#inp-correo").click(function(){
        $("#inp-correo .etiqueta").animate({"margin-top":"0px","font-size": "13px","font-weight":"600"}, 100, function() {
            $("#txt-correo").show();
            $("#txt-correo").focus();                        
        });                    
    });

    $("#txt-correo").blur(function(){
        if ($("#txt-correo").val() == "") {
            $("#err-correo").html("Ingresa un correo electrónico.");
            $("#txt-correo").hide();
            $("#inp-correo .etiqueta").animate({"margin-top":"15px","font-size":"16px","font-weight":"500"}, 100);
            $("#err-correo").show();
            $("#inp-correo").css("border","1px solid #B92D2B");  
            correo_ok = 0;                       
        }else{
            if ($("#txt-correo").val().indexOf('@', 0) != -1 && $("#txt-correo").val().indexOf('.', 0) != -1) {
                $("#err-correo").hide();
                $("#inp-correo").css("border","1px solid #5FA53F"); 
                correo_ok = 1;
            }else{
                $("#err-correo").html("Ingresa un correo electrónico válido.");
                $("#err-correo").show();
                $("#inp-correo").css("border","1px solid #B92D2B"); 
                correo_ok = 0;
            }
        }
    });


    $('#txt-correo').keyup(function(event){
        if ($("#txt-correo").val() == "") {
            $("#err-correo").html("Ingresa un correo electrónico.");
            $("#err-correo").show();
            $("#inp-correo").css("border","1px solid #B92D2B");
            correo_ok = 0;            
        }else{
            $("#err-correo").hide();
            $("#inp-correo").css("border","1px solid #8C8C8C");   

            if ($("#txt-correo").val().indexOf('@', 0) != -1 && $("#txt-correo").val().indexOf('.', 0) != -1){
                $("#err-correo").hide();
                $("#inp-correo").css("border","1px solid #8C8C8C"); 
                correo_ok = 1;       
            }else{
                $("#err-correo").html("Ingresa un correo electrónico válido.");
                $("#err-correo").show();
                $("#inp-correo").css("border","1px solid #B92D2B");  
                correo_ok = 0;   
            }
        }                    
    });

    $("#inp-clave").click(function(){
        $("#inp-clave .etiqueta").animate({"margin-top":"0px","font-size": "13px","font-weight":"600"}, 100, function() {
            $("#txt-clave").show();
            $("#txt-clave").focus();                        
        });                    
    });

    $("#txt-clave").blur(function(){
        if ($("#txt-clave").val() == "") {
            $("#err-clave").html("Ingresa la clave del correo electrónico.");
            $("#txt-clave").hide();
            $("#inp-clave .etiqueta").animate({"margin-top":"15px","font-size":"16px","font-weight":"500"}, 100);
            $("#err-clave").show();
            $("#inp-clave").css("border","1px solid #B92D2B");               
            clave_ok = 0;                      
        }else{
            $("#err-clave").hide();
            $("#inp-clave").css("border","1px solid #5FA53F");             
            clave_ok = 1; 
        }
    });


    $('#txt-clave').keyup(function(event){
        if ($("#txt-clave").val() == "") {
            $("#err-clave").html("Ingresa la clave del correo electrónico.");
            $("#err-clave").show();
            $("#inp-clave").css("border","1px solid #B92D2B");             
            clave_ok = 0; 
        }else{
            $("#err-clave").hide();
            $("#inp-clave").css("border","1px solid #8C8C8C");               
            clave_ok = 1;                        
        }                    
    });


});  