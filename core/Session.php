<?php
class Session{
		
	protected $id = NULL;
	protected $nvars = NULL;
		
	public function __construct($begin = TRUE)
	{//construtor da classe
		$this->start();
	}

	public function start()
	{
		if(!session_id())
		{
			session_start();
			$this->id = md5(sha1(session_id().'L19').'13CMA');
			$this->setNvars();	
		}
		else
		{
			return TRUE;
		}

	}

	public function setNvars()
	{//define número de variaveis
		$this->nvars = count($_SESSION);
	}

	public function getNvars()
	{//retorna número de variaveis
		return $this->nvars;
	}	

	public function setVar($var = NULL , $valor = NULL){//adiciona variaveis
		
		$_SESSION[$var] = $valor;
		$this->setNvars();
		
	}

	public function unsetVar($var)
	{//retira variaveis
		unset($_SESSION[$var]);
		$this->setNvars();
	}


	public function getVar($var)
	{//pega variaveis
		if(isset($_SESSION[$var]))
		{
			return $_SESSION[$var];
		}
		else
		{
			return NULL;
		}
	}

	public function destroy($begin = FALSE)
	{//verifica sessão
		session_unset();
		session_destroy();
		$this->setNvars();
		
		if($begin == TRUE)
		{
			$this->start();
		}
	}

	public function verify_session()
	{
		if($this->getNvars() == 0 && $this->getVar('logged') != TRUE && $this->getVar('ip_user') != $_SERVER['REMOTE_ADDR'])
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}

	}
}

?>