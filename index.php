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
if(isset($_POST['token'])){
    $token = $_POST['token'];
    if ($g->checkCode($secret, $token)) {
        echo "YES \n";
    } else {
        echo "NO \n";
        }
}
echo "Get a new Secret: $secret \n";
echo "The QR Code for this secret (to scan with the Google Authenticator App: \n";

echo \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('', $secret, 'NoteSec');
echo "\n";
die(); //Só pra n iniciar o form dnv
?>


