<?php
// (A) Not Logged In
session_start();
if (!isset($_SESSION["token"])) {
    header("location: 3-login.php");
    exit;
}
// (B) Token Expired - To login page
require "2-google.php";
$goo->setAccessToken($_SESSION["token"]);
if ($goo->isAccessTokenExpired()) {
    unset($_SESSION["token"]);
    header("location: 3-login.php");
    exit;
}
// (C) Get user profile
$user = (new Google\Service\Oauth2($goo))->userinfo->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        * {
            margin: 0 auto;
        }

        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Welcome ! : <?php echo $user->givenName; ?> .</h1>
    <img src="<?php echo $user->picture ?>" alt="">
    <button id="logout">Logut</button>
    <script>
        const btnLogout = document.getElementById('logout');
        btnLogout.addEventListener('click', (e) => {
            location.href = "http://localhost/project/5-logout.php";
        });
    </script>
</body>

</html>