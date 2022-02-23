<?php

declare(strict_types=1); 

// 税を計算するクラス
class TaxCalculator
{
    // 直近の計算結果を保持するプロパティ
    private $lastCalculated;

    // 税額を計算する
    public function calculate(int $price, float $tax): float
    {
        echo '計算を開始します。', PHP_EOL;
        if ($tax < 0) {
            throw new Exception('税率はマイナスであってはなりません。');
        }
        echo '計算を終了します。', PHP_EOL;
        $this->lastCalculated = $calculated = $price + $price * $tax;
        return $calculated;
    }

    // 直近の税額計算結果をリセットする
    public function reset(): void
    {
        $this->lastCalculated = null;
        echo '計算結果をリセットしました。', PHP_EOL;
    }

}
