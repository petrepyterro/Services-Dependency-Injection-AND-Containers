<?php

class Container{
  private $pdo;
  private $configuration;
  private $shipLoader;
  
  public function __construct(array $configuration) {
    $this->configuration = $configuration;
  }
  
  /**
   * @return ShipLoader
   */
  public function getShiploader() {
    if ($this->shipLoader === null){
      $this->shipLoader = new ShipLoader($this->getPDO());
    }
    
    return $this->shipLoader;
  }
  /**
   * @return PDO
   */
  public function getPDO() {
    if ($this->pdo === null){
      $this->pdo = new PDO(
        $this->configuration['db_dsn'],
        $this->configuration['db_user'],
        $this->configuration['db_pass']      
      );
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $this->pdo;
  }
}

