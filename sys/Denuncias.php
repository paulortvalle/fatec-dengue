<?php

require_once(dirname(dirname(__FILE__)) . '/core/autoload.php');
	
	if(isset($_POST['action']))
	{
		$acao = $_POST['action'];
		
		switch ($acao)
		{
			case 'GetLastPoint':
					$db = new Database();
					$query = $db->prepare("SELECT lat, lng, denuncia FROM reclamacoes ORDER BY id_rec DESC LIMIT 1");
					$query->execute();
					echo json_encode($query->fetch(PDO::FETCH_ASSOC));
				break;
			case 'GetAllPoints':

					$db = new Database();
					$query = $db->prepare("SELECT lat, lng, denuncia FROM reclamacoes");
					$query->execute();
					
					echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
				break;
			case 'SetPoints':
					$db = new Database();
					$query = $db->prepare("");//vale um insert ;P
					$query->execute();
				break;
			default:
					echo json_encode(['error' => 'Ação não encontrada. :(']);
				break;
		}
	}
?>