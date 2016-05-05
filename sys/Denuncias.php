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

					echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));

				break;
			case 'SetPoints':
				break;
			default:
					echo json_encode(['error' => 'Ação não encontrada. :(']);
				break;
		}
	}
?>