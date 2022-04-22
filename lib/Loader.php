<?php

class Loader
{
  /* オートロード対象のディレクトリを保持するプロパティ */
  private $direcories = array();
  
  /* オートロード対象のフォルダーのパスを$directoriesプロパティに配列形式で格納する */
  public function regDirectory($dir)
  {
    $this->directories[] = $dir;
    return;
  }
  
  /* クラスを読み込むオブジェクトを登録するメソッド */
  public function register()
  {
    /* 自分自身のloadClass()メソッドをコールバックとして登録 */
    spl_autoload_register(array($this, 'loadClass'));
  }
  
  /* register()によってオーバーロードに登録されたコールバック */
  public function loadClass($className)
  {
    /* パスを１個ずつ取り出す */
    foreach ($this->directories as $dir) {
      /* ファイルクラスへのパスを生成 */
      $filePath = $dir . "/" . $className . ".php";
      
      /* $filePathが読み込めるかどうかチェック */
      if (is_readable($filePath)) {
        /* 読み込めたら、requireして、ループ終了 */
        require $filePath;
        return;
      }
    }
  }
}