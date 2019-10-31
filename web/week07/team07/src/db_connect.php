<?php

function getDatabase() {
    $database = NULL;
    
    try {
        $url = getenv('DATABASE_URL');
        
        if( !isset($url) || empty($url) ) {
            $url = "postgres://postgres:postgres@localhost:5432/prove05";
        } 
    
        $opts = parse_url($url);
        $port = $opts["port"];
        $host = $opts["host"];
        $user = $opts["user"];
        $pass = $opts["pass"];
        $name = ltrim($opts["path"], '/');

        $database = new PDO("pgsql:host=$host;port=$port;dbname=$name", $user, $pass);
        $database->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    } catch (PDOException $e) {
        echo "There was an error connecting to the database. Exception Details: $e->getMessage()";
        die();
    }

    return $database;
}

?>