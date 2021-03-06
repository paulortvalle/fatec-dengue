<!-- AREA DO MAPA -->
<div id="map" class="col-xs-12"></div>
<!-- AREA DO MAPA -->
<!-- Script de chamada da API do Google Maps -->
<script async defer
  src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCxSegRjXkpdafvNz06fRGBCifnac9f4V0&callback=initMap">
</script>
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
			    <label for="txnome">Nome:</label>
			    <input type="text" class="form-control" id="txnome" placeholder="Nome completo">
			  </div>
			  <div class="form-group">
			    <label for="txmail">E-mail:</label>
			    <input type="email" class="form-control" id="txmail" placeholder="exemplo@email.com">
			  </div>
			  <!--	Inclusão de dados adicionais -->
			  <div class="form-group">
			    <label for="txphone">Telefone:</label>
			    <input type="text" class="form-control" id="txphone" placeholder="(99) 98765 - 4321">
			  </div>

			  <div class="form-group">
			    <label for="txrg">RG:</label>
			    <input type="text" class="form-control" id="txrg" placeholder="23.456.789 - X">
			  </div>
			
			  <div class="form-group">
			    <label for="txcpf">CPF:</label>
			    <input type="text" class="form-control" id="txcpf" placeholder="123.456.789 - 00">
			  </div>
			
			  <!-- fim -->

			  <div class="form-group">
			    <label for="txdenuncia">Denuncia:</label>
			    <textarea class="form-control" id="txdenuncia" rows="5" placeholder="Detalhes da denuncia"></textarea>
			  </div>
			  	<a id="btn-enviar" data-coordenadas="" class="btn btn-primary">Enviar</a>
			  	<a id="btn-cancelar" class="btn btn-default">Cancelar</a>
			</form>

        </div>
    </div>
</div>