<?php
namespace Nowaste;
class Database{

	private $pdo;

	public function getPDO()
	{
		if($this->pdo === null)
		{
		$this->pdo = new PDO('mysql:host=localhost;dbname=NoWaste','root', '');
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return $this->pdo;
	}

	public function query()
	{
		return $this->getPDO()->query('SELECT * FROM users')->fetchAll();
	}

	public function prepare($statement) // requête préparée
	{
		$req = $this->getPDO()->prepare($tatement);
		$req->execute($params);
	}

	public function find($id)
	{
		return $this->getPDO()->query('SELECT * FROM users WHERE id='.$id)->fetchAll(PDO::FETCH_OBJ);
	}
}