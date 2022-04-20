<?php

class Enemy
{
  const MAX_HITPOINT = 50;
  public $name;
  public $hitPoint = 50;
  public $attackPoint = 10;
  
  // method
  public function doAttack($human)
  {
    echo "『" . $this->name . "』の攻撃！\n";   // $this = 自分自身のクラス = Enemyクラス
    echo "【" . $human->name . "】に" . $this->attackPoint . "のダメージ！\n";
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