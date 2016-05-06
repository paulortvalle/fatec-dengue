<?php

class Database extends PDO
{
	private $dns     = 'mysql:host=localhost;dbname=teste;';//dns na sequencia, driver, host, banco de dados
	private $user    = 'root';//usuário do banco de dados
	private $pass    = '';//senha do banco de dados
    private $charset = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];//evitando erros de acentuação
	
	function __construct()
	{
		try 
		{
			parent::__construct($this->dns,$this->user,$this->pass,$this->charset);
			parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			parent::setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			return TRUE;
		}
		catch(PDOException $e) 
		{
			echo json_encode([
								"message" => $e->getMessage(), 
								"code" => $e->getCode(), 
								"file" => $e->getFile(), 
								"lineError" => $e->getLine()
							]);
			return FALSE;
		}
	}
}

?>