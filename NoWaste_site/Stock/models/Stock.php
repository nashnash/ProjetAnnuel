<?php
	/**
	 * 
	 */
	class Stock
	{
		private $id;
		private $Url;
		private $Peremption;
		private $Quantite;
		function __construct(?int$i, string $t, float $dur, string $rd)
		{
			$this->id = $i;
			$this->Url = $t;
			$this->Peremption = $dur;
			$this->Quantite = $rd;

		}
		public function getId():?int{return $this->id;}
		public function getUrl():?string{return $this->Url;}
		public function getPeremption():?float{return $this->Peremption;}
		public function getQuantite():?string{return $this->Quantite;}

		public function setId(int $id): void{$this->id = $id;}
		public function setUrl(int $Url): void{$this->Url = $Url;}
		public function setPeremption(int $Peremption): void{$this->Peremption = $Peremption;}
		public function setQuantite(int $Quantite): void{$this->Quantite = $Quantite;}

		public function deleteStock(Stock $mov){
			$db = DatabaseManager::getManager();
			$Row = $db->exec('DELETE FROM Stock WHERE id = ?', [$mov->getId()]);
		}

		public function insert(Stock $mov): ?Stock{
			$db = DatabaseManager::getManager();
			$Row = $db->exec('INSERT INTO Stock (Url, Peremption, Quantite) VALUES (?,?,?)', [$mov->getUrl(),$mov->getPeremption(),$mov->getQuantite()]);
			if($Row >= 0){
				$mov->setId(($db->lastInsertId()));
				return $mov;
			}
			return NULL;
		}



	}
?>