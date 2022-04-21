<?php

/* ファイルのロード */
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

/* インスタンス化 */
$members = array();
$members[] = new Brave("勇者");
$members[] = new BlackMage("黒魔術師");
$members[] = new WhiteMage("白魔導士");

$enemies = array();
$enemies[] = new Enemy("ゴブリン", 20);
$enemies[] = new Enemy("ボム", 25);
$enemies[] = new Enemy("モルボル", 30);

// $member->name = "勇者";
// $enemy->name = "ゴブリン";

$turn = 1;

/* どちらかのHPが0になるまで繰り返す */
while ($member->getHitPoint() > 0 && $enemy->getHitPoint() > 0) {
  /* ターン数の表示 */
  echo "*** $turn ターン目 *** \n\n";
  
  /* 現在のHPの表示 */
  foreach($members as $member) {
     echo $member->getName() . "  :  " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";  
     echo "\n";
  }
  
  foreach($enemies as $enemy) {
     echo $enemy->getName() . "  :  " . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
     echo "\n";
  }
  // constで定義したものはオブジェクト定数
  // オブジェクト定数は "::" で参照するため "$member::MAX_HITPOINT" と呼び出す
  
  /* 攻撃 */
  foreach($members as $member) {
    $enemyIndex = rand(0, count($enemies) - 1);
    $enemy = $enemies[$enemyIndex];
    
    if (get_class($member) == "WhiteMage") {
      $member->doAttackWhiteMage($enemy, $member);
    } else {
      $member->doAttack($enemy);
    }
  }
  
  $enemy->doAttack($member);
  echo "\n";
  
  $turn++;
  
}

echo "<<<戦闘終了！>>>\n\n";
echo $member->getName() . "  :  " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";  
echo $enemy->getName() . "  :  " . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n\n";
