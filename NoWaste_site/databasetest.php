<?php
namespace Nowaste;
use \PDO;


class Database{
	private $pdo;

	public function getPDO()
	{
		if($this->pdo === null)
		{
		$this->pdo = new PDO('mysql:host=localhost;dbname=nowaste','root' , '');
		//$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return $this->pdo;
	}

	public function query($statement)
	{
		$req = $this->getPDO()->query($statement);
		if(strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0||
			strpos($statement, 'UPDATE') === 0)
		{
			return $req;
		}
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function find($id)
	{
		return $this->query('SELECT * FROM user WHERE id='.$id);
	}

	public function prepare($statement, $params) // requête préparée
	{
		$req = $this->getPDO()->prepare($tatement);
		$req->execute($params);
		if(strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0||
			strpos($statement, 'UPDATE') === 0)
		{
			return $req;
		}
		return $req->fetchAll(PDO::FETCH_OBJ);
	}



}