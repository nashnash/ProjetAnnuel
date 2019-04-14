<?php
namespace Nowaste;
use \PDO;


class Database{

	private $pdo;

	public function getPDO()
	{
		if($this->pdo === null)
		{
			echo 'initialisation';
		$this->pdo = new PDO('mysql:host=localhost;Port=3306','dbname=NoWaste','root', '');
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		echo 'requete executer';
		return $this->pdo;
	}

	public function query()
	{
		return $this->getPDO()->query('SELECT * FROM user')->fetchAll();
	}

	public function find($id)
	{
		return $this->query('SELECT * FROM user WHERE id='.$id);
	}

	public function prepare($statement, $params) // requête préparée
	{
		$req = $this->getPDO()->prepare($tatement);
		$req->execute($params);
	}


}