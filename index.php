<?php
	require_once(dirname(__FILE__) . '/core/autoload.php');
	$template = new Template();
	$template->getInc('header');
	$template->getInc('menu');

	/*
		Utilizando carregamento estatico das páginas, para evitar falha de segurança  	
	*/
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];

		switch($page)
		{
			case 'dicas':
					$template->getPage('dicas');
				break;
			case 'noticias':
					$template->getPage('noticias');
				break;
			case 'sobre':
					$template->getPage('sobre');
				break;
			default:
					$template->getPage('mapa');
				break;
		}
	}
	else
	{	
		$template->getPage('mapa');
	}
 
    $template->getInc('footer'); 
?>