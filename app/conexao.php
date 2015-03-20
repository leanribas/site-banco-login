<?php

function conexaoDB(){
    try {
        
      $config = require_once 'configdb.php';
      
      if(! isset($config['db']))
      {
          throw new \InvalidArgumentException('Configurações para conexão com o banco não existe!');
      }    
      
      $host = (isset($config['db']['host'])?$config['db']['host']:null);
      $dbname = (isset($config['db']['dbname'])?$config['db']['dbname']:null);
      $user = (isset($config['db']['user'])?$config['db']['user']:null);
      $password = (isset($config['db']['password'])?$config['db']['password']:null);
      
      return new \PDO("mysql:host={$host};dbname={$dbname}",$user,$password);
      
    } catch (\PDOException $e) {
        echo $e->getMessage() . "\n";
        echo $e->getTraceAsString() . "\n";
    }
    
}
