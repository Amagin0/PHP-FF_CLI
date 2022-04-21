<?php

/* ファイルのロード */
require_once('./classes/Lives.php');
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');
require_once('./classes/Message.php');

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

$messageObj = new Message;

/* 終了条件の判定 */
function isFinish($objects)
{
  $deathCnt = 0; // death count...HPが0以下の仲間の数
  foreach($objects as $object) {
  /* １人でもHPが0を超えていたらfalseを返す */
    if ($object->getHitPoint() > 0) {
      return false;
    }
    $deathCnt++;
  }
  /* 仲間の数と死亡数が同じならtrueを返す */
  if ($deathCnt === count($objects)) {
    return true;
  }
}

/* どちらかのHPが0になるまで繰り返す */
while(!$isFinishFlg) {
  /* ターン数の表示 */
  echo "*** $turn ターン目 *** \n\n";
  
  /* 仲間の表示 */
  $messageObj->displayStatusMessage($members);
  
  /* 敵の表示 */
  $messageObj->displayStatusMessage($enemies);
  
  /* 以下、リファクタリングにより削除(Message.php) */
  // /* 現在のHPの表示 */
  // foreach($members as $member) {
  //   echo $member->getName() . "  :  " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";  
  //   echo "\n";
  // }
  
  // foreach($enemies as $enemy) {
  //   echo $enemy->getName() . "  :  " . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
  //   echo "\n";
  // }
  // // constで定義したものはオブジェクト定数
  // // オブジェクト定数は "::" で参照するため "$member::MAX_HITPOINT" と呼び出す
  
  
  /* プレイヤー側の攻撃 */
  $messageObj->displayAttackMessage($members, $enemies);
  
  /* 以下、リファクタリングにより削除(Message.php) */
  // foreach($members as $member) {
  //   /* 白魔導士の場合、味方のオブジェクトも渡す */
  //   if (get_class($member) == "WhiteMage") {
  //     $member->doAttackWhiteMage($enemies, $members);
  //   } else {
  //     $member->doAttack($enemies);
  //   }
  //   echo "\n";
  // }
  
  /**
   * foreach で $members 配列から $member を取り出す
   * $enemyIndex を乱数から決定(添字は0から始まるので、-1する)
   * $enemies 配列から対象の $enemy を取り出す
   * もし、$member が WhiteMageクラスだった場合、doAttackWhiteMageメソッドを呼ぶ
   * もし、$member が WhiteMageクラスじゃない場合、doAttackメソッドを呼ぶ
   * 以降、上記の繰り返し
  */
  
  /* エネミー側の攻撃 */
  $messageObj->displayAttackMessage($enemies, $members);
  
  /* 以下、リファクタリングにより削除(Message.php) */
  // foreach($enemies as $enemy) {
  //   $enemy->doAttack($members);
  //   echo "\n";
  // }
  
  /* 先頭終了条件のチェック(仲間全員のHPが0 もしくは、敵全員のHPが0) */
  $isFinishFlg = isFinish($members);
  if ($isFinishFlg) {
    $message = "GAME OVER .....\n\n";
    break;
  }
  
  $isFinishFlg = isFinish($enemies);
  if ($isFinishFlg) {
    $message = "♪♪♪ファンファーレ♪♪♪\n\n";
    break;
  }
  
  
  
  /* 以下、リファクタリングにより削除(isFinish, isFinishFlg) */
  // /* プレイヤーの全滅チェック */
  // $deathCnt = 0; // death count...HPが0以下の仲間の数
  // foreach($members as $member) {
  //   if($member->getHitPoint() > 0) {
  //     $isFinishFlg = false;
  //     break;
  //   }
  //   $deathCnt++;
  // }
  
  // if($deathCnt === count($members)) {
  //   $isFinishFlg = true;
  //   echo "GAME OVER .....\n\n";
  //   break;
  // }
  
  // /* エネミーの全滅チェック */
  // $deathCnt = 0;
  // foreach($enemies as $enemy) {
  //   if($enemy->getHitPoint() > 0) {
  //     $isFinishFlg = false;
  //     break;
  //   }
  //   $deathCnt++;
  // }
  
  // if($deathCnt === count($enemies)) {
  //   $isFinishFlg = true;
  //   echo "♪♪♪ファンファーレ♪♪♪\n\n";
  //   break;
  // }
  
  $turn++;
}

echo "<<<戦闘終了！>>>\n\n";

echo $message;

/* 仲間の表示 */
$messageObj->displayStatusMessage($members);

/* 敵の表示 */
$messageObj->displayStatusMessage($enemies);

/* 以下、リファクタリングにより削除(Message.php) */
// /* 現在のHPの表示 */
// foreach($members as $member) {
//   echo $member->getName() . "  :  " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";  
//   echo "\n";
// }

// foreach($enemies as $enemy) {
//   echo $enemy->getName() . "  :  " . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
//   echo "\n";
// }