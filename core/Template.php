<?php
class Template
{
	protected $base = NULL;

	protected $assets = "assets/";
	protected $inc = 'incs/';
	protected $img = 'imgs/';
	protected $css = 'css/';
	protected $js  = 'js/';

	public function construct()
	{
		$this->base = dirname(dirname(__FILE__));
	}

	public function getIncs($file = NULL)
	{
		$file.='.php';

		if (!file_exists($this->base . $file))
		{
			return json_encode(['error' => 'Arquivo não encontrado', 'file' => $file]);
		}

		include_once($this->base . $file);
	}

	public function getJS($file = NULL)
	{
		$file.='.js';

		if (!file_exists($this->base . $this->assets . $this->js . $file))
			return json_encode(['error' => 'Arquivo não encontrado', 'file' => $file]);
		
		return '<script src="'. $this->base . $this->js . $file . '"></script>';
	}


	public function getCss($file = NULL, $media = 'all')
	{
		$file.='.css';

		if (!file_exists($this->base . $this->assets . $this->css . $file))
			return json_encode(['error' => 'Arquivo não encontrado', 'file' => $file]);

		return '<link rel="stylesheet" type="text/css" media="'.$media.'" href="'.$this->base . $this->assets . $this->css . $file.'" />';
	}

}
?>