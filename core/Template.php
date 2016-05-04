<?php
class Template
{
	protected $base = NULL;

	protected $assets = "assets/";
	protected $inc = 'incs/';
	protected $img = 'imgs/';
	protected $css = 'css/';
	protected $js  = 'js/';
	protected $pages = 'pages/';

	public function construct()
	{
		$this->base = dirname(dirname(__FILE__));
	}

	public function getInc($file = NULL)
	{
		$file.='.php';

		if (!file_exists($this->base . $this->inc . $file))
		{
			return json_encode(['error' => 'Arquivo não encontrado ', 'file' => $file]);
		}

		include_once($this->base . $this->inc . $file);
	}

	public function getJS($file = NULL)
	{
		$file.='.js';

		if (!file_exists($this->base . $this->assets . $this->js . $file))
			return json_encode(['error' => 'Arquivo não encontrado ', 'file' => $file]);
		
		return '<script src="'. $this->base . $this->assets . $this->js . $file . '"></script>';
	}


	public function getCss($file = NULL, $media = 'all')
	{
		$file.='.css';

		if (!file_exists($this->base . $this->assets . $this->css . $file))
			return json_encode(['error' => 'Arquivo não encontrado ', 'file' => $file]);

		return '<link rel="stylesheet" type="text/css" media="'.$media.'" href="'.$this->base . $this->assets . $this->css . $file.'" />' . "\n";
	}

	public function getPage($file = NULL)
	{
		$file.='.php';

		if (!file_exists($this->base . $this->pages . $file))
		{
			return json_encode(['error' => 'Arquivo não encontrado ', 'file' => $file]);
		}

		include_once($this->base . $this->pages . $file);
	}

}
?>