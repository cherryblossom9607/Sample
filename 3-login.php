<?php
session_start();
if (isset($_SESSION["token"])) {
    header("Location: 4-home.php");
    exit;
}

require "2-google.php";
if (isset($_GET["code"])) {
    $token = $goo->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token["error"])) {
        $_SESSION["token"] = $token;
        header("location: 4-home.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login With Google</title>
</head>

<body>
    <?php if (isset($token["error"])) { ?>
        <div><?= print_r($token); ?></div>
    <?php } ?>
    <a href="<?= $goo->createAuthUrl() ?>"> Login With Google</a>
</body>

</html>