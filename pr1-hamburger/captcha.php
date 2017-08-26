<?php

if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $secret = "6LeIHC4UAAAAAIzFCUZb4EUpwO11lxRl_Opb26tY";
    $responseKey = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$responseKey&remoteip=$remoteip";
    $captcha = file_get_contents($url);
    $captcha = json_decode($captcha);

    if ($captcha->success) echo "$text";
    else echo "Ошибка при отправке формы!";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="captcha.php" method="post">
    <input type="text" name="text"/>
    <input type="submit" name="submit" value="submit">
    <div class="g-recaptcha" data-sitekey="6LeIHC4UAAAAABjupx6MKvMGwrvGq_mIQIORn73g"></div>
</form>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>

