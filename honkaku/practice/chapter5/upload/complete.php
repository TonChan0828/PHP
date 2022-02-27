<?php

declare(strict_types=1);

function getExtension(string $file)
{
    return pathinfo($file, PATHINFO_EXTENSION);
}

function validate(): array
{
    if ($_FILES['image1']['error'] !== UPLOAD_ERR_OK) {
        return [false, 'アップロードエラを検出しました'];
    }

    if (!in_array(getExtension($_FILES['image1']['name']), ['jpg', 'jpeg', 'png', 'gif'])) {
        return [false, '画像ファイルのみアップロード可能です'];
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $_FILES['image1']['tmp_name']);
    finfo_close($finfo);
    if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image.gif'])) {
        return [false, '不正な画像形式です'];
    }

    if (filesize($_FILES['image1']['tmp_name']) > 1024 * 1024 * 2) {
        return [false, 'ファイルサイズは２Mbまでとしてください'];
    }

    return [true, null];
}

function generateDestinationPath(): string
{
    return 'uploaded/' . date('Ymd-His-') . rand(10000, 99999) . '.' . getExtension($_FILES['image1']['name']);
}

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

list($result, $message) = validate();
if ($result !== true) {
    echo '[Error]', $message;
    return;
}

$destinationPath = generateDestinationPath();
$moved = move_uploaded_file($_FILES['image1']['tmp_name'], $destinationPath);
if ($moved !== true) {
    echo 'アップロード処理中にエラーが発生しました';
    return;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ファイルアップロード</title>
</head>

<body>
    <p>アップロードに成功しました。保存された画像は以下です。</p>
    <img src="<?= $destinationPath ?>" style="width:300px"><br>
    (保存ファイル名:<?= escape($destinationPath) ?>)<br>
    (元のファイル名:<?= escape($_FILES['image1']['name']) ?>)
</body>

</html>
