<?php

require_once __DIR__.'/lib/Model/Ship.php';
require_once __DIR__.'/lib/Service/BattleManager.php';
require_once __DIR__.'/lib/Model/BattleResult.php';
require_once __DIR__.'/lib/Service/ShipLoader.php';
require_once __DIR__.'/lib/Service/Container.php';


$configuration = array(
  'db_dsn'  => 'mysql:host=localhost;dbname=Services_Dependency_Injection_AND_Containers',
  'db_user' => 'root',
  'db_pass' => 'mysql'  
);

