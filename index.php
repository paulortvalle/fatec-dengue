<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/theme.css" />
    
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/jquery.form-20140218.min.js"></script>    
    <script src="js/script20160430.js"></script>

    <title>DEV DAY 2016</title>
</head>

<body>
<div class="">

    <!-- AREA DO MENU -->
    <nav class="navbar navbar-default" style="margin-bottom:0;">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">
	      	<img src="img/logo-Combate-Mosquito.png" style="max-height:40px; margin-top:-10px; margin-right:30px;"/>
	      </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="index.html">Mapa de Casos</a></li>
	        <li><a href="dicas.html">Dicas</a></li>
	        <li><a href="noticias.php">Notícias</a></li>
	      </ul>
	      
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Contato</a></li>
	       	<li><a href="sobre.html">Sobre</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
    <!-- AREA DO MENU -->

</div>



	<!-- AREA DO MAPA -->
	<div id="map" class="col-xs-12">
	
	</div>
    <!-- AREA DO MAPA -->

    <!-- SCRIPT DO MAPA -->
    <script type="text/javascript">
		var map;
		var myLatLng = {lat: -22.424856, lng: -46.950374};

		var neighborhoods = [
			{posicao:{lat: -22.424856, lng: -46.9503745},denuncia:'aqui tem varios focos de dengue'},
		  	{posicao:{lat: -22.359745, lng: -46.955618},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.311793, lng: -46.961969},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.361809, lng: -46.934332},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.364111, lng: -46.933817},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.346914, lng: -46.924453},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.380370, lng: -46.934921},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.382116, lng: -46.932947},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.405837, lng: -46.945022},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.465020, lng: -46.977466},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.465020, lng: -46.977466},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.402185, lng: -46.985534},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.442333, lng: -46.935409},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.416112, lng: -46.956995},denuncia:'aqui tem varios focos de dengue'},
			{posicao:{lat: -22.407481, lng: -46.945629},denuncia:'A casa ao lado tem vários pneus abandonados!<br/>Vocês podem verificar?'},
		];

		var denguemap = {
		  fatec: {
		    center: {lat: -22.424856, lng: -46.950374},
		    area: 3000
		  },

		  centro: {
		    center: {lat: -22.382116, lng: -46.932947},
		    area: 8000
		  },

		  outros: {
		    center: {lat: -22.407481, lng: -46.945629},
		    area: 5000
		  },
		};

		var markers = [];

		var imagem = 'img/pin-combate.png';

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

			drop();

			/*
			var infowindow = new google.maps.InfoWindow({
			    content: 'Change the zoom level',
			    position: myLatLng
			});
			infowindow.open(map);
			*/

			google.maps.event.addListener(map, 'click', function(event) {
				mostraModal(event.latLng);
			}); 




		}

		function drop() {
		  clearMarkers();
		  for (var i = 0; i < neighborhoods.length; i++) {
		    addMarkerWithTimeout(neighborhoods[i], i * 800);
		  }
		}

		function addMarkerWithTimeout(elemento, timeout) {
		  window.setTimeout(function() {
		    markers.push(new google.maps.Marker({
		      position: elemento.posicao,
		      map: map,
		      animation: google.maps.Animation.DROP,
		      icon: imagem,
		      title: elemento.denuncia
		    })); janela();
		  }, timeout);

		}

		function clearMarkers() {
		  for (var i = 0; i < markers.length; i++) {
		    markers[i].setMap(null);
		  }
		  markers = [];
		}

		function janela(){
			infowindow = new google.maps.InfoWindow({
			    content: "aqui voce pode adicionar conteudo <strong>HTML</strong>"
			});

			for (var i = 0; i < markers.length; i++) {
				var marker = markers[i];
				google.maps.event.addListener(marker, 'click', function () {
					infowindow.setContent('<h3>'+marker.title + '</h3><i class="btn btn-primary fa fa-thumbs-up" aria-hidden="true"></i> 3<div class="space-sm"></div>');
					infowindow.open(map, this);
				});
			}
		}


    </script>

    <!-- Scrip de chamada da API do Google Maps -->
    <script async defer
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCxSegRjXkpdafvNz06fRGBCifnac9f4V0&callback=initMap">
    </script>

    <script>
    	
    </script>
    <!-- SCRIPT DO MAPA -->



<div class="backg" style="display:none; z-index:9998; background:#333; opacity:0.65; -moz-opacity: 0.65; filter: alpha(opacity=65); width:100%; height:100%; position:fixed; top:0; left:0;"></div>

<div class="modalinfo col-xs-9 col-md-6" style="display:none; z-index:9999; background:#FFF; position:fixed; padding: 20px 20px 40px 20px; border-radius: 8px;">    
    <div class="conteudo">
        <div class="col-xs-12">
            <h2><center>Registre a sua denuncia!</center></h2>
        </div>
        <div class="space-sm"></div>
        <div class="col-xs-12">
            
			<form>
			  <div class="form-group">
			    <label for="txnome">Seu nome:</label>
			    <input type="text" class="form-control" id="txnome" placeholder="">
			  </div>
			  <div class="form-group">
			    <label for="txmail">Seu e-mail:</label>
			    <input type="email" class="form-control" id="txmail" placeholder="">
			  </div>
			  <div class="form-group">
			    <label for="txdenuncia">Sua denuncia:</label>
			    <textarea class="form-control" id="txdenuncia" rows="5"></textarea>
			  </div>
			  <a id="btn-enviar" data-coordenadas="" class="btn btn-primary">Enviar</a>
			  <a id="btn-cancelar" class="btn btn-default">Cancelar</a>
			</form>

        </div>
    </div>
</div>
    



<style>
    .backg, .modalinfo {-webkit-transition: 0s ease-out; -moz-transition: 0s ease-out; -o-transition: 0s ease-out; transition: 0s ease-out;}
    .fechar {float:right; position: absolute; right:0px; top:-54px; background:#825F35 !important; color:#fff; padding: 10px; cursor:pointer;}
    .conteudo .fa {margin-top:25px;}
</style>

<script>
    
     function dimensionamodal(){
        var telah = $(window).height();
        var telaw = $(window).width();
        
        var janelah = $('.modalinfo').height();
        var janelaw = $('.modalinfo').width();
        
        var topjanela = (telah*0.5) - (janelah*0.5)- 20;
        var leftjanela = (telaw*0.5) - (janelaw*0.5) -20;
        
        $('.modalinfo').css('top', topjanela).css('left', leftjanela);
    }
    
    function mostraModal($coordenadas){
        dimensionamodal();
        $('.modalinfo').fadeIn(800);
        $('.backg').slideDown(200);
        $('#btn-enviar').data('coordenadas', $coordenadas);
    }
    
    function fechaModal(){
        $('.modalinfo').fadeOut(600);
        $('.backg').slideUp(200);
        $('.has-error input').focus();
    }

</script>

<script>
    
    $(function(){ 

        dimensionamodal();
        $(window).resize(function(){ dimensionamodal() });

        $('.backg, #btn-cancelar').on('click', function(){
            fechaModal();
            return false;
        });

        // chamada do botão de cadastro de novo associado
        $('#btn-enviar').on('click', function(){

        	var coord = $(this).data('coordenadas');

        	var markerIn = new google.maps.Marker({
    			position: coord,
    			map: map,
    			animation: google.maps.Animation.DROP,
		      	icon: imagem,
		      	title: $('#txdenuncia').val()
  			});

  			google.maps.event.addListener(markerIn, 'click', function () {
				infowindow.setContent('<h3>'+markerIn.title+ '</h3><i class="btn btn-primary fa fa-thumbs-up" aria-hidden="true"></i><div class="space-sm"></div>');
				infowindow.open(map, this);
			});

			fechaModal();

        	return false;

        }); 
        
        
    
    }) // final do load

</script>