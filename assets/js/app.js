    var map;
    var myLatLng = {
        lat: -22.424856,
        lng: -46.950374
    };

    var ultima = { lat: 0, lng: 0, denuncia:'mais alguma coisa'};

    var neighborhoods = [{}];

    var denguemap = {
        fatec: {
            center: {
                lat: -22.424856,
                lng: -46.950374
            },
            area: 3000
        },

        centro: {
            center: {
                lat: -22.382116,
                lng: -46.932947
            },
            area: 8000
        },

        outros: {
            center: {
                lat: -22.407481,
                lng: -46.945629
            },
            area: 5000
        },
    };

    var markers = [];

    var imagem = 'assets/img/pin-combate.png';

    var infowindow = null;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12,
            //mapTypeId: google.maps.MapTypeId.TERRAIN
        });

        for (var foco in denguemap) {
            var cityCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: denguemap[foco].center,
                radius: Math.sqrt(denguemap[foco].area) * 10
            });
        }
        GetAllPoints();
        drop();

        google.maps.event.addListener(map, 'click', function(event) {
            mostraModal(event.latLng);
        });



    }

    function drop() {
        for (var i = 0; i < neighborhoods.length; i++) {
            addMarkerWithTimeout(neighborhoods[i], i * 800);
            ultima = neighborhoods[i];
        }
    }

    function addMarkerWithTimeout(elemento, timeout) {
        window.setTimeout(function() {
            markers.push(new google.maps.Marker({
                position: {'lat': parseFloat(elemento.lat), 'lng' : parseFloat(elemento.lng)},
                map: map,
                animation: google.maps.Animation.DROP,
                icon: imagem,
                title: elemento.denuncia
            }));
            janela();
        }, timeout);

    }

    function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    function janela() {
        infowindow = new google.maps.InfoWindow({
            content: "aqui voce pode adicionar conteudo <strong>HTML</strong>"
        });

        for (var i = 0; i < markers.length; i++) {
            var marker = markers[i];
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent('<h3>' + marker.title + '</h3><i class="btn btn-primary fa fa-thumbs-up" aria-hidden="true"></i> 3<div class="space-sm"></div>');
                infowindow.open(map, this);
            });
        }
    }

 function dimensionamodal() {
     var telah = $(window).height();
     var telaw = $(window).width();

     var janelah = $('.modalinfo').height();
     var janelaw = $('.modalinfo').width();

     var topjanela = (telah * 0.5) - (janelah * 0.5) - 20;
     var leftjanela = (telaw * 0.5) - (janelaw * 0.5) - 20;

     $('.modalinfo').css('top', topjanela).css('left', leftjanela);
 }

 function mostraModal($coordenadas) {
     dimensionamodal();
     $('.modalinfo').fadeIn(800);
     $('.backg').slideDown(200);
     $('#btn-enviar').data('coordenadas', $coordenadas);
 }

 function fechaModal() {
     $('.modalinfo').fadeOut(600);
     $('.backg').slideUp(200);
     $('.has-error input').focus();
 }


function GetLastPoint() {
    $.ajax({
        type: 'POST',
        url: 'sys/Denuncias.php',
        data: {
            action: 'GetLastPoint'
        },
        datatype: JSON,
        success: function(resultado) {
            resultado = JSON.parse(resultado);
            if (resultado.lat !== ultima.lat) {
                addMarkerWithTimeout(resultado, 800);
                ultima = resultado;
            }
        }
    });
}

function GetAllPoints() {
    $.ajax({
        type: 'POST',
        url: 'sys/Denuncias.php',
        data: {
            action: 'GetAllPoints'
        },
        datatype: JSON,
        success: function(geral) {
            neighborhoods = JSON.parse(geral);
            drop();
        }
    });
}


$(function() {

        dimensionamodal();
        $(window).resize(function() {
            dimensionamodal()
        });

        $('.backg, #btn-cancelar').on('click', function() {
            fechaModal();
            return false;
        });

        // chamada do botão de cadastro de novo associado
        $('#btn-enviar').on('click', function() {

            var coord = $(this).data('coordenadas');

            var markerIn = new google.maps.Marker({
                position: coord,
                map: map,
                animation: google.maps.Animation.DROP,
                icon: imagem,
                title: $('#txdenuncia').val()
            });

            google.maps.event.addListener(markerIn, 'click', function() {
                infowindow.setContent('<h3>' + markerIn.title + '</h3><i class="btn btn-primary fa fa-thumbs-up" aria-hidden="true"></i><div class="space-sm"></div>');
                infowindow.open(map, this);
            });

            fechaModal();

            return false;

        });

    }) // final do load