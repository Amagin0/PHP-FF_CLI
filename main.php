<?php

/* ファイルのロード */
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

/* インスタンス化 */
$player = new Brave("勇者");
$goblin = new Enemy("ゴブリン");

// $player->name = "勇者";
// $goblin->name = "ゴブリン";

$turn = 1;

/* どちらかのHPが0になるまで繰り返す */
while ($player->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
  /* ターン数の表示 */
  echo "*** $turn ターン目 *** \n\n";
  
  /* 現在のHPの表示 */
  echo $player->getName() . "  :  " . $player->getHitPoint() . "/" . $player::MAX_HITPOINT . "\n";  
  echo $goblin->getName() . "  :  " . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n";
  echo "\n";
  // constで定義したものはオブジェクト定数
  // オブジェクト定数は "::" で参照するため "$player::MAX_HITPOINT" と呼び出す
  
  /* 攻撃 */
  $player->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($player);
  echo "\n";
  
  $turn++;
  
}

echo "<<<戦闘終了！>>>\n\n";
echo $player->getName() . "  :  " . $player->getHitPoint() . "/" . $player::MAX_HITPOINT . "\n";  
echo $goblin->getName() . "  :  " . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n\n";
