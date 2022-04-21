<?php

class Human
{
  /* プロパティ */
  const MAX_HITPOINT = 100;
  private $name;
  private $hitPoint = 100;
  private $attackPoint = 20;
  
  /* メソッド */
  
  /* コンストラクタ */
  public function __construct($name, $hitPoint = 100, $attackPoint = 20)
  {
    $this->name = $name;
    $this->hitPoint = $hitPoint;
    $this->attackPoint = $attackPoint;
  }
  
  public function doAttack($enemy)
  {
    echo "『" . $this->getName() . "』の攻撃！\n";   // $this = 自分自身のクラス = Humanクラス
    echo "【" . $enemy->getName() . "】に" . $this->attackPoint . "のダメージ！\n";
    $enemy->tookDamage($this->attackPoint);
  }
  
  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    // HPがマイナスにならない為の処理
    if ($this->hitPoint < 0) {
        $this->hitPoint = 0;
    }
  }
  
  public function recoveryDamage($heal, $target)
  {
    $this->hitPoint += $heal;
    if($this->hitPoint > $target::MAX_HITPOINT) {
       $this->hitPoint = $target::MAX_HITPOINT;
    }
  }
  
  /* アクセサーメソッド */
  public function getName()
  {
    return $this->name;
  }
  
  // コンストラクタで設定したため不要
  // public function setName()
  // {
  //   $this->name = $name;
  // }
  
  public function getHitPoint()
  {
    return $this->hitPoint;
  }
  
  public function getAttackPoint()
  {
    return $this->attackPoint;
  }
}
