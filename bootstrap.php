<?php

require_once __DIR__.'/lib/Ship.php';
require_once __DIR__.'/lib/BattleManager.php';
require_once __DIR__.'/lib/BattleResult.php';
require_once __DIR__.'/lib/ShipLoader.php';


$configuration = array(
  'db_dsn'  => 'mysql:host=localhost;dbname=Services_Dependency_Injection_AND_Containers',
  'db_user' => 'root',
  'db_pass' => 'mysql'  
);

