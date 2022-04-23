<?php

class Brave extends Human
// class [クラス名] extends [継承元クラス名]
// 設定したクラスは、継承元クラスが持っているプロパティやメソッドを使うことが出来る
{
  const MAX_HITPOINT = 120;
  private $hitPoint = self::MAX_HITPOINT;
  private $attackPoint = 30;
  
  private static $instance;
  
  /* コンストラクタ */
  private function __construct($name) // privateにすることで、外部から呼ぶことを不可能にしている
  {
    parent::__construct($name, $this->hitPoint, $this->attackPoint);
  }
  // プロパティをprivateにしたので、明示的にプロパティを書き換える必要がある


  /* シングルトンで常にインスタンスは一つしか生成しない */
  public static function getInstance($name)
  {
    if(empty(self::$instance)) {
      self::$instance = new Brave($name);
    }
    return self::$instance;
  }

  /* オーバーライド */
  public function doAttack($enemies)  
  {
    /* 自分のHPが0以上か、敵のHPが0以上かなどをチェックするメソッドを用意 */
    if (!$this->isEnableAttack($enemies)) {
      return false;
    }
    
    /* ターゲットの決定 */
    $enemy = $this->selectTarget($enemies);
    
    /* Livesクラスから継承*/

    // /* チェック１：自身のHPが0かどうか */
    // if($this->getHitPoint() <= 0) {
    //   return false;
    // }
    
    // $enemyIndex = rand(0, count($enemies) -1);
    // $enemy = $enemies[$enemyIndex];

    
    /* 乱数の発生 */
    if(rand(1,3) === 1) {
      /* スキルの発動 */
      echo "『" . $this->getName() . "』のスキルが発動した！\n";
      echo "『ギガスラッシュ』！！\n";
      echo $enemy->getName() . "に" . $this->attackPoint * 1.5 . "のダメージ！\n";
      $enemy->tookDamage($this->attackPoint * 1.5);
    } else {
      parent::doAttack($enemies);
      // スキルが発動しない場合は、親クラスのdoAttack()を呼び出している
    }
    return true;
  }
}