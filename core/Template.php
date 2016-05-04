<?php
class Template
{
	public $base = NULL;
	protected $img = '/imgs';
	protected $css = '/css';
	protected $js  = '/js';

	public function construct()
	{
		$this->base = dirname(dirname(__FILE__));
	}

	public function getFile($file = NULL)
	{
		$file.='.php';

		if (!file_exists($this->base . $file))
		{
			return json_encode(['error' => 'Arquivo não encontrado', 'file' => $file]);
		}

		include_once($this->base . $file);
	}
}
?>