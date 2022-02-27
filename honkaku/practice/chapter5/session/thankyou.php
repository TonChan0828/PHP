<?php

declare(strict_types=1);

function deleteSession()
{
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>セッションの利用</title>
</head>

<body>
    <h2>お問い合わせ完了</h2>
    <p>お問い合わせありがとうございました。デバック情報:</p>
    <pre><?php print_r($_SESSION); ?></pre>
    <?php $_SESSION = []; ?>
    <?php deleteSession() ?>
    <?php session_destroy(); ?>
</body>

</html>
