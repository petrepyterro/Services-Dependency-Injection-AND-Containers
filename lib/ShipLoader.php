<?php

class ShipLoader{
  function getShips(){
    $shipsData = $this->queryForShips();
    
    $ships = array();
    
    foreach ($shipsData as $shipData){
      $ship = new Ship($shipData['name']);
      $ship->setId($shipData['id']);
      $ship->setWeaponPower($shipData['weapon_power']);
      $ship->setJediFactor($shipData['jedi_factor']);
      $ship->setStrength($shipData['strength']);
      
      $ships[] = $ship;
    }
    
    return $ships;
  }
  
  public function findOneById($id) {
    $pdo = new PDO('mysql:host=localhost;dbname=Services_Dependency_Injection_AND_Containers','root', 'mysql');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
    $statement->execute(array('id' => $id));
    $shipArray = $statement->fetch(PDO::FETCH_ASSOC);
    
    var_dump($shipArray);die();
  }
  
  private function queryForShips(){
    $pdo = new PDO('mysql:host=localhost;dbname=Services_Dependency_Injection_AND_Containers','root', 'mysql');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->prepare('SELECT * FROM ship');
    $statement->execute();
    $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $shipsArray;
  }
  
}

