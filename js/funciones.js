"use strict";


$(document).ready(function() {

    $('.zzzbtn_select_juego').click(function(e){
        e.preventDefault();
        
        var td_id_juego = $(this).attr('codigoJuego');
        let lbl_td_id_juego = document.querySelector("#id_juego");
        lbl_td_id_juego.innerHTML= td_id_juego;
alert(td_id_juego);

        var td_nombre_juego = $(this).attr('td_nombre_juego');
        let lbl_nombre_juego = document.querySelector("#nombre_juego");
        lbl_nombre_juego.innerHTML= td_nombre_juego;

        var td_detalle_juego = $(this).attr('td_detalle_juego');
        let lbl_detalle_juego = document.querySelector("#detalle_juego");
        lbl_detalle_juego.innerHTML= td_detalle_juego;

        var td_altura_minima = $(this).attr('td_altura_minima');
        let lbl_td_altura_minima = document.querySelector("#altura_minima");
        lbl_td_altura_minima.innerHTML= td_altura_minima;

        var td_id_categoria = $(this).attr('td_id_categoria');
        let lbl_td_id_categoria = document.querySelector("#id_categoria");
        lbl_td_id_categoria.innerHTML= td_id_categoria;


    });
   

    $('.btn_select_juego').click(function(e){
        e.preventDefault();       
        var codigoJuego = $(this).attr('codigoJuego');

      alert(codigoJuego);
        let lbl_td_id_juego = document.querySelector("#id_juego");
        let lbl_nombre_juego = document.querySelector("#nombre_juego");
        let lbl_detalle_juego = document.querySelector("#detalle_juego");
        let lbl_td_altura_minima = document.querySelector("#altura_minima");
        let lbl_td_id_categoria = document.querySelector("#id_categoria");


        $.ajax({
            type: 'POST',  // Envío con método POST            
            url: 'ObtenerJuegoJS',  // Fichero destino (el PHP que trata los datos)
            data: { id_juego:codigoJuego }, // Datos que se envían
            dataType: "json",
              
            }).done(function( msg ) {  // Función que se ejecuta si todo ha ido bien                
                //console.log(JSON.stringify(msg));
    alert(msg);
    
                var objetoJSON = JSON.parse(JSON.stringify(msg));
alert(objetoJSON);
                lbl_td_id_juego.innerHTML= objetoJSON.id_juego;
                lbl_nombre_juego.innerHTML= objetoJSON.nombre_juego;
                lbl_detalle_juego.innerHTML= objetoJSON.detalle_juego;
                lbl_td_altura_minima.innerHTML= objetoJSON.altura_minima;
                lbl_td_id_categoria.innerHTML= objetoJSON.id_categoria;

            }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
                // Mostramos en consola el mensaje con el error que se ha producido
                lbl_nombre_juego.innerHTML = "Ocurrió el siguiente error: "+ textStatus +" "+ errorThrown;
           });

    });

});