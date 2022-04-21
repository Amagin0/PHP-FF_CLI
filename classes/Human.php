<?php

class Human extends Lives
{
  /* プロパティ */
  const MAX_HITPOINT = 100;
  
  /* Livesクラスから継承*/
  // private $name;
  // private $hitPoint = 100;
  // private $attackPoint = 20;
  
  /* メソッド */
  
  /* コンストラクタ */
  public function __construct($name, $hitPoint = 100, $attackPoint = 20, $inteligence = 0)
  {
    /* Livesクラスから継承*/
    // $this->name = $name;
    // $this->hitPoint = $hitPoint;
    // $this->attackPoint = $attackPoint;
    parent::__construct($name, $hitPoint, $attackPoint, $inteligence);
  }
  
  /* 以下すべてLivesクラスから継承 */
  
  // public function doAttack($enemies)
  // {
  //   /* チェック１：自身のHPが0かどうか */
  //   if($this->getHitPoint() <= 0) {
  //     return false;
  //   }
    
  //   $enemyIndex = rand(0, count($enemies) -1);
  //   $enemy = $enemies[$enemyIndex];

  //   echo "『" . $this->getName() . "』の攻撃！\n";   // $this = 自分自身のクラス = Humanクラス
  //   echo "【" . $enemy->getName() . "】に" . $this->attackPoint . "のダメージ！\n";
  //   $enemy->tookDamage($this->attackPoint);
  // }
  
  // public function tookDamage($damage)
  // {
  //   $this->hitPoint -= $damage;
  //   // HPがマイナスにならない為の処理
  //   if ($this->hitPoint < 0) {
  //       $this->hitPoint = 0;
  //   }
  // }
  
  // public function recoveryDamage($heal, $target)
  // {
  //   $this->hitPoint += $heal;
  //   /* 最大値を超えて回復しない */
  //   if($this->hitPoint > $target::MAX_HITPOINT) {
  //     $this->hitPoint = $target::MAX_HITPOINT;
  //   }
  // }
  
  // /* アクセサーメソッド */
  // public function getName()
  // {
  //   return $this->name;
  // }
  
  // // コンストラクタで設定したため不要
  // // public function setName()
  // // {
  // //   $this->name = $name;
  // // }
  
  // public function getHitPoint()
  // {
  //   return $this->hitPoint;
  // }
  
  // public function getAttackPoint()
  // {
  //   return $this->attackPoint;
  // }
}
