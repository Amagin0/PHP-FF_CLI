<?php

class Enemy
{
  const MAX_HITPOINT = 50;
  private $name;
  private $hitPoint = 50;
  private $attackPoint = 10;
  
  public function __construct($name, $attackPoint)
  {
    $this->name = $name;
    $this->attackPoint = $attackPoint;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getHitPoint()
  {
    return $this->hitPoint;
  }

  public function getAttackPoint()
  {
    return $this->attackPoint;
  }

  public function doAttack($humans)
  {
    /* チェック１：自身のHPが0かどうか */
    if($this->getHitPoint() <= 0) {
      return false;
    }
    
    $humanIndex = rand(0, count($humans) -1);
    $human = $humans[$humanIndex];

    echo "『" . $this->getName() . "』の攻撃！\n";   // $this = 自分自身のクラス = Enemyクラス
    echo "【" . $human->getName() . "】に" . $this->attackPoint . "のダメージ！\n";
    $human->tookDamage($this->attackPoint);
  }

  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    // HPがマイナスにならない為の処理
    if ($this->hitPoint < 0) {
        $this->hitPoint = 0;
    }
  }
}