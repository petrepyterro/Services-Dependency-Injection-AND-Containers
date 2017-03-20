<?php

class ShipLoader{
  private $pdo;
  private $dbDsn;
  private $dbUser;
  private $dbPass;
  
  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }
  /**
   * 
   * @return Ship[]
   */
  function getShips(){
    $shipsData = $this->queryForShips();
    
    $ships = array();
    
    foreach ($shipsData as $shipData){  
      $ships[] = $this->createShipFromData($shipData);
    }
    
    return $ships;
  }
  
  /*
   * @param $id
   * @return Ship
   */
  public function findOneById($id) {
    $statement = $this->getPDO()->prepare('SELECT * FROM ship WHERE id = :id');
    $statement->execute(array('id' => $id));
    $shipArray = $statement->fetch(PDO::FETCH_ASSOC);
    
    if(!$shipArray){
      return null;
    }
    
    return $this->createShipFromData($shipArray);
  }
  
  private function queryForShips(){
    $statement = $this->getPDO()->prepare('SELECT * FROM ship');
    $statement->execute();
    $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $shipsArray;
  }
  
  private function createShipFromData(array $shipData) {
    $ship = new Ship($shipData['name']);
    $ship->setId($shipData['id']);
    $ship->setWeaponPower($shipData['weapon_power']);
    $ship->setJediFactor($shipData['jedi_factor']);
    $ship->setStrength($shipData['strength']);
    
    return $ship;
  }
  
  /**
   * @return PDO
   */
  private function getPDO() {
    
    return $this->pdo;
  }
  
}

