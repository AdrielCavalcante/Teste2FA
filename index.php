<?php

include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

$secret = 'XVQ2UIGO75XRUKJO';

$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

echo 'Current Code is: ';
echo $g->getCode($secret);

echo "\n";

echo "The QR Code for this secret (to scan with the Google Authenticator App: \n";

echo "\n";


echo "Check if your token is valid: ";
    if ($g->checkCode($secret, $_POST['token'])) {
        echo "YESSSSSSSSS \n";
    } else {
        echo "NOOOOOOOOOO \n";
        }
die();//Só pra n iniciar o form dnv
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="<?php echo \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('NoteSec', $secret, 'SafeProc'); ?>" alt="">
    <form action="" method="post">
        <input type="number" name="token">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
