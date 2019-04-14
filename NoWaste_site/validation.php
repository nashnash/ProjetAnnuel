<?php
class Validateur{
	private $params;
	private $errors=[];
	private $messages = [
		'minlength' => "Le champ %s requiert minimum %d caractères",
		'email'		=> "Le champ %s doit être un email valide",
		'password'	=> "Le champ %s requiert minimum 6 caractères dont 1 caracère spécial, un chiffre, une majuscule et une minuscule"
	];
	private $regles =['minlength','email','password'];

	private $password = '#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{6,20})$#';

	public function __construct($params)
	{
		$this->params = $params;
	}

	private function has($field)
	{
		return array_key_exists($field, $this->params);
	}

	private function addError(string $rule, string $field, $options = null)
	{
		$this->errors[$field][] = sprintf($this->messages[$rule], $field, $options);
	} 

	private function minlength( $field, $nbrmin = 2)
	{

	if(mb_strlen($this->params[$field]) < $nbrmin)
	{
		$this->addError('minlength',$field, $nbrmin);
	}
				
	}

	private function password( string $field, string $parametre)
	{
		if(!preg_match($this->password, $this->params[$field]))
			{
				$this->addError('password', $field);
			}
		
	}

	private function email($field)
	{
		if(!filter_var($this->params[$field], FILTER_VALIDATE_EMAIL))
		{
			$this->addError('email', $field);
		}
		
	}

	private function unique($field, $db)
	{
		$rs = $db->find($field);
		if(!empty($rs))
		{
			$this->addError('unique', $field);
		}
	}

	private function between (string $field, string $parametre)
	{
		$nbrs = explode(':', $parametre);
		if($this->minlength($field, (int) $nbrs[0]) OR $this->maxlength($field, (int)$nbrs[1]))
		{
			return true;
		}
	}

	public function valide($items)
	{
		foreach ($items['regles'] as $regle => $parametre){
			if(in_array($regle, $this->regles))
			{ 			// permet de ne pas afficher l'erreur dans check 
				$this->$regle($items['champs'], $parametre);
			}
		}
	}

	public function check($regles)
	{
		foreach ($regles as $champs=> $rules)
		{
			if($this->has($champs))
			{
				$this->valide([
					'champs' => $champs,
					'regles' => $rules,
					
				]);
			}
		}
	}

	public function getErrors()
	{
		return $this->errors; 
	}

	public function getError($name)
	{
		return $this->errors[$name] ?? false;
	}

}

	