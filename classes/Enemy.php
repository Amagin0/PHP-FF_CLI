<?php

class Enemy extends Lives
{
  const MAX_HITPOINT = 50;

  public function __construct($name, $attackPoint)
  {
    $hitPoint = 50;
    $inteligence = 0;
    parent::__construct($name, $hitPoint, $attackPoint, $inteligence);
  }

  /* 以下すべてLivesクラスから継承 */

  // public function getName()
  // {
  //   return $this->name;
  // }

  // public function getHitPoint()
  // {
  //   return $this->hitPoint;
  // }

  // public function getAttackPoint()
  // {
  //   return $this->attackPoint;
  // }

  // public function doAttack($humans)
  // {
  //   /* チェック１：自身のHPが0かどうか */
  //   if($this->getHitPoint() <= 0) {
  //     return false;
  //   }
    
  //   $humanIndex = rand(0, count($humans) -1);
  //   $human = $humans[$humanIndex];

  //   echo "『" . $this->getName() . "』の攻撃！\n";   // $this = 自分自身のクラス = Enemyクラス
  //   echo "【" . $human->getName() . "】に" . $this->attackPoint . "のダメージ！\n";
  //   $human->tookDamage($this->attackPoint);
  // }

  // public function tookDamage($damage)
  // {
  //   $this->hitPoint -= $damage;
  //   // HPがマイナスにならない為の処理
  //   if ($this->hitPoint < 0) {
  //       $this->hitPoint = 0;
  //   }
  // }
}