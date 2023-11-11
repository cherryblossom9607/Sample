<?php
// Load Google Client Lib
require("vendor/autoload.php");

// New Google Client
$goo = new Google\Client();
$goo->setClientId("81733538695-d9lsf6v5a1t4f5rngbik1btg66if7e3q.apps.googleusercontent.com");
$goo->setClientSecret("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");
$goo->setRedirectUri("http://localhost/project/3-login.php");
$goo->addScope("email");
$goo->addScope("profile");

