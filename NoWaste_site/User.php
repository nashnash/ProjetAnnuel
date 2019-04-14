<?php

class User extends Model
{
	protected $validates = array(
		'prenom' => array(
			'minlength' => 3
		)
	);
	
	public function getUsers()
	{
		return $this->find(array(
				'fields' => array('user', 'password')
			));
	}
}