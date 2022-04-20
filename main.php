<?php

/* ファイルのロード */
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

$hero = new Human();
$goblin = new Enemy();

$hero->name = "勇者";
$goblin->name = "ゴブリン";

$turn = 1;

/* どちらかのHPが0になるまで繰り返す */
while ($hero->hitPoint > 0 && $goblin->hitPoint > 0) {
  /* ターン数の表示 */
  echo "*** $turn ターン目 *** \n\n";
  
  /* 現在のHPの表示 */
  echo $hero->name . "  :  " . $hero->hitPoint . "/" . $hero::MAX_HITPOINT . "\n";  
  echo $goblin->name . "  :  " . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";
  echo "\n";
  // constで定義したものはオブジェクト定数
  // オブジェクト定数は "::" で参照するため "$hero::MAX_HITPOINT" と呼び出す
  
  /* 攻撃 */
  $hero->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($hero);
  echo "\n";
  
  $turn++;
  
}

echo "<<<戦闘終了！>>>\n\n";
echo $hero->name . "  :  " . $hero->hitPoint . "/" . $hero::MAX_HITPOINT . "\n";  
echo $goblin->name . "  :  " . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n\n";
