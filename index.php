<?php

include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

$secret = 'XVQ2UIGO75XRUKJO';
$code = '846474';

$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

echo 'Current Code is: ';
echo $g->getCode($secret);

echo "\n";

echo "Check if your token is valid: ";
    if ($g->checkCode($secret, $code)) {
        echo "YES \n";
    } else {
        echo "NO \n";
        }
echo "Get a new Secret: $secret \n";
echo "The QR Code for this secret (to scan with the Google Authenticator App: \n";

echo "\n";

//Só pra n iniciar o form dnv
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="<?php echo \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('chregu', $secret, 'GoogleAuthenticatorExample'); ?>" alt="">
</body>
</html>
