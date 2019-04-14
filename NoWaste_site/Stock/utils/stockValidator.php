<?php 
	class stockValidator{
		public static function validate(array $data, $fields):bool{
			foreach ($fields as $field) {
				if(isset($data[$field])){
					return false;
				}
			}
			return true;
		}
	}
 ?>