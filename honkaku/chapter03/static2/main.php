<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>静的プロパティ - honkaku</title>
</head>
<body>
<?php
    require_once dirname(__FILE__) . '/ShoppingPoint.php';

    // 曜日ポイントクラス
    class WeekDayPoint
    {
        // 今日が金曜日なら、1ポイント加算するメソッド
        public function addWeekDayPoint(string $youbi)
        {
            if ($youbi === 'Fri') {
                ShoppingPoint::countUpPoint();
            }
        }
    }

    // 1000円以上の購入金額の時に、1ポイント加算する関数
    function addPricePoint(int $price)
    {
        if ($price >= 1000) {
            ShoppingPoint::countUpPoint();
        }
    }

    // 初期ポイントはゼロとする
    ShoppingPoint::$point = 0;

    // 購入しただけで無条件に1ポイント加算する(結果、トータル1ポイントになる)
    ShoppingPoint::countUpPoint();

    // 曜日によって1ポイント加算する(結果、トータル2ポイントになる)
    $weekDayPoint = new WeekDayPoint();
    $weekDayPoint->addWeekDayPoint('Fri');

    // 購入金額によって1ポイント加算する(結果、トータル3ポイントになる)
    addPricePoint(5000);

    echo '購入ポイント：', ShoppingPoint::$point; // 出力結果は「3」
?>
</body>
</html>
