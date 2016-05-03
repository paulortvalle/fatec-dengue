<?php

// CLASSE DE BANCO DE DADOS
// Criada em 27 de abril de 2016
// Versão 1 de 27 de abril de 2016

class Database {
	
	static public function connect(){
		
		$host = "localhost";
		$name = "h3s7s_secfatec";
		$user = "h3s7s_secfatec";
		$pass = "%kv+3-,^4IBW";
		
		try {
        	
        	$db = new PDO("mysql:host=" . $host . ";dbname=" . $name, $user, $pass);
			
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			
            return $db;

            //eh neh

        } catch(PDOException $e) {
			
			$arr['titulo'] = 'Erro de Conexão com o Banco de Dados!';
			$arr['msg'] = 'Um erro inesperado de conexão está ocorrendo com o sistema! 
				Não é possível realizar solicitações de dados. Verifique seu acesso à internet para continuar.';
			$arr['info'] = 'Informações sobre o erro para suporte primenote: Class DB | ' . $e->getMessage();
			
			$retorno[erro][] = $arr;
			return $retorno;
			die();

        }

	}
	
}