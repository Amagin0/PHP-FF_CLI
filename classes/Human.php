<?php

class Human
{
  const MAX_HITPOINT = 100;
  public $name;
  public $hitPoint = 100;
  public $attackPoint = 20;
  
  // method
  public function doAttack($enemy)
  {
    echo "『" . $this->name . "』の攻撃！\n";   // $this = 自分自身のクラス = Humanクラス
    echo "【" . $enemy->name . "】に" . $this->attackPoint . "のダメージ！\n";
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
}
