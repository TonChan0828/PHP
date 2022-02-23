<?php

declare(strict_types=1); 

require_once dirname(__FILE__) . '/Flyable.php';

// 飛行機クラス
class Airplane implements Flyable
{
    // 飛ぶメソッド
    public function fly(): void
    {
        // 飛行機固有の、飛ぶアニメーション処理を記述する
        echo 'Airplane is flying..';
    }
}
