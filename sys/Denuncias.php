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
					
					if($query->rowCount())
						echo json_encode($query->fetch(PDO::FETCH_ASSOC));
					else
						echo json_encode([]);
				break;

			case 'GetAllPoints':

					$db = new Database();
					$query = $db->prepare("SELECT lat, lng, denuncia FROM reclamacoes");
					$query->execute();
					
					if($query->rowCount())
						echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
					else
						echo json_encode([[]]);
				break;
			case 'SetPoints':
					
					$nome = (isset($_POST['nome'])) ? $_POST['nome'] : NULL;
					$email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
					$rg = (isset($_POST['rg'])) ? $_POST['rg'] : NULL;
					$cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : NULL;
					$telefone = (isset($_POST['telefone'])) ? $_POST['telefone'] : NULL;
					$lat = (isset($_POST['lat'])) ? $_POST['lat'] : NULL;
					$lng = (isset($_POST['lng'])) ? $_POST['lng'] : NULL;
					$denuncia = (isset($_POST['denuncia'])) ? $_POST['denuncia'] : NULL;

					$db = new Database();
					$query = $db->prepare("INSERT INTO reclamacoes (nome, email, rg, cpf, telefone, lat, lng, denuncia) VALUES (:nome, :email, :rg, :cpf, :telefone, :lat, :lng, :denuncia)");
					
					$query->bindParam(':nome', $nome, PDO::PARAM_STR);
					$query->bindParam(':email', $email, PDO::PARAM_STR);
					$query->bindParam(':rg', $rg, PDO::PARAM_STR);
					$query->bindParam(':cpf', $cpf, PDO::PARAM_STR);
					$query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
					$query->bindParam(':lat', $lat, PDO::PARAM_STR);
					$query->bindParam(':lng', $lng, PDO::PARAM_STR);
					$query->bindParam(':denuncia', $denuncia, PDO::PARAM_STR);

					$query->execute();
					
					if ($query->rowCount() > 0) 
					{
						echo 'foi';
					}
					else
					{
						echo json_encode(['error' => 'Falha ao Cadastrar']);
					}
					
				break;
			default:
					echo json_encode(['error' => 'Ação não encontrada. :(']);
				break;
		}
	}
?>