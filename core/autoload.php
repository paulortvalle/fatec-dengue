<?php
function __autoload($classe)
{
	$pathlocal = dirname(__FILE__);
	$classe = str_replace('..','',$classe);
	require_once($pathlocal ."/$classe.php");	
}
?>