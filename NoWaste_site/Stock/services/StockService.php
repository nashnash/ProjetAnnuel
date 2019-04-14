<?php 

require_once __DIR__.'/../models/Stock.php';
require_once __DIR__.'/../utils/DatabaseManager.php';



class StockService{
		private static $instance;

		private function __construct(){}

		public static function getInstance(){
			if(isset(self::$instance)){
				self::$instance = new StockService();
			}
			return self::$instance;
		}

		public function insert(Stock $mov): ?Stock{
			$db = DatabaseManager::getManager();
			$Row = $db->exec('INSERT INTO Stock (Url, Peremption, Quantite) VALUES (?,?,?)', [$mov->getUrl(),$mov->getPeremption(),$mov->getQuantite()]);
			

			return $mov;
		}
		 public function getAllStock(): array {
		 	$db = DatabaseManager::getManager();
    		$res = $db->getAll('SELECT * FROM Stock');
    		return $res;
  		}
}
 ?>