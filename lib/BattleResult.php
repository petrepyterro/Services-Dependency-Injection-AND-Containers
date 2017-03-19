<?php

class BattleResult{
  private $usedJediPowers;
  private $winningShip;
  private $losingShip;
  
  public function __construct($usedJediPowers, Ship $winningShip, Ship $losingShip) {
    $this->usedJediPowers = $usedJediPowers;
    $this->winningShip = $winningShip;
    $this->losingShip = $losingShip;
  }
}