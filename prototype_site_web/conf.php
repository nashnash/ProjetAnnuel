<?php

    define("DB_HOST", "localhost");
    define("DB_NAME", "projet annuel maj");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");

    try {
        $bdd = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER , DB_PASSWORD );
    }
    catch(Exception $e){
        //Si ca ne marche pas die
        die("Erreur SQL : ". $e->getMessage() );
    }
 

?>