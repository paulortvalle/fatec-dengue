<?php

require_once(dirname(dirname(__FILE__)) . '/core/autoload.php');
	
	if(isset($_GET['action']))
	{
		$acao = $_GET['action'];
		
		switch ($acao)
		{
			case 'GetPoints':
					$db = new Database();
					$query = $db->prepare("SELECT * FROM reclamantes");
					$query->execute();
					/*
						Um breve exemplo utilizando uma query, 
						a seguir criarei um .sql, 
						contendo os pontos no mapa, 
						e o id dos reclamantes[cabe alteração de formulário];
					*/

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