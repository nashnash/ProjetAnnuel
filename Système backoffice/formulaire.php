<?php
class Form{

	private $posts;
	private $validateur;
	
	public function __construct(validateur $validateur)
	{
		$this->posts = $_POST;
		$this->validateur =$validateur;

		//var_dump($this->validateur->getError('prenom'));
	}

	private function getValue($name)
	{
		//var_dump($this->posts);
		return $this->posts[$name] ?? null;
	}

	public function create($name, array $options =[])
	{
		//$method = isset($options['method']) ? $options['method'] : 'post';
		$method = $options['method'] ?? 'post'; //si option method existe alors ok sinon post

		return '<form method="'.$method.'" name="'.$name.'" id="form-'.ucfirst($name).'">';
	}

	public function input($name, $texte, array $options = [])
	{
		$html = $this->label($name, $texte);
		$type = $options['type'] ?? 'text';
		//var_dump($this->validateur->getError($name));
		$errors = $this->validateur->getError($name);

		$html .= '<p><input type="'.$type.'" name="'.$name.'" placeholder="'.$texte.'" class="form-control" id="'.$name.'" value="'.$this->getValue($name).'"></p>';

		if(!empty($errors))
		{
			$html .= '<div class =" alert alert-danger">';
			foreach($errors as $error)
			{     
				//echo $error.'<br>';
				$html .='<strong>'.$error.'</strong>'.'<br>';
				//echo '<strong>'.$error.'</strong>'.'<br>';
			}
			$html .='</div>';
		}
		
		return $html;
	}

	public function label($for, $texte)
	{
		return '<label for="'.$for.'">'.$texte.'</label>';
	}

	public function end($texte)
	{
		return '<button type="submit" class="btn btn-primary">'.$texte.'</button>';
	}
}
