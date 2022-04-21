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

$isFinishFlg = false;

/* どちらかのHPが0になるまで繰り返す */
while(!$isFinishFlg) {
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
  
  /* プレイヤー側の攻撃 */
  foreach($members as $member) {
    $enemyIndex = rand(0, count($enemies) - 1);
    $enemy = $enemies[$enemyIndex];
    
    if (get_class($member) == "WhiteMage") {
      $member->doAttackWhiteMage($enemy, $member);
    } else {
      $member->doAttack($enemy);
    }
  }
  /**
   * foreach で $members 配列から $member を取り出す
   * $enemyIndex を乱数から決定(添字は0から始まるので、-1する)
   * $enemies 配列から対象の $enemy を取り出す
   * もし、$member が WhiteMageクラスだった場合、doAttackWhiteMageメソッドを呼ぶ
   * もし、$member が WhiteMageクラスじゃない場合、doAttackメソッドを呼ぶ
   * 以降、上記の繰り返し
  */
  
  /* エネミー側の攻撃 */
  foreach($enemies as $enemy) {
    $memberIndex = rand(0, count($members) -1);
    $member = $members[$memberIndex];
    $enemy->doAttack($member);
    echo "\n";
  }
  
  /* プレイヤーの全滅チェック */
  $deathCnt = 0; // death count...HPが0以下の仲間の数
  foreach($members as $member) {
    if($member->getHitPoint() > 0) {
      $isFinishFlg = false;
      break;
    }
    $deathCnt++;
  }
  
  if($deathCnt === count($members)) {
    $isFinishFlg = true;
    echo "GAME OVER .....\n\n";
    break;
  }
  
  /* エネミーの全滅チェック */
  $deathCnt = 0;
  foreach($enemies as $enemy) {
    if($enemy->getHitPoint() > 0) {
      $isFinishFlg = false;
      break;
    }
    $deathCnt++;
  }
  
  if($deathCnt === count($enemies)) {
    $isFinishFlg = true;
    echo "♪♪♪ファンファーレ♪♪♪\n\n";
    break;
  }
  
  $turn++;
}

echo "<<<戦闘終了！>>>\n\n";

foreach($members as $member) {
  echo $member->getName() . "  :  " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";  
}
echo "\n";

foreach($enemies as $enemy) {
  echo $enemy->getName() . "  :  " . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n\n";
}
