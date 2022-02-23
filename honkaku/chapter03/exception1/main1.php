<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>例外処理 - honkaku</title>
</head>
<body>
<pre>
<?php
    require_once dirname(__FILE__) . '/TaxCalculator.php';
    $calculator = new TaxCalculator();
    $priceWithTax = $calculator->calculate(100, -0.08);
    echo '計算結果は', $priceWithTax, '円です。';
?>
</pre>
</body>
</html>
