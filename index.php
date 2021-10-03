<?php

include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

require('vendor/autoload.php');
require('vendor/paragonie/constant_time_encoding/src/Base32.php');

use \Paragonie\ConstantTime\Base32;

$secret = 'adriel';

$secretEncode = Base32::encodeUpper($secret);

$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

// Mostra o token(6 digitos)
echo 'Current Code is: ';
echo $g->getCode($secretEncode);

echo "\n";

echo "The QR Code for this secret (to scan with the Google Authenticator App: \n";

echo "\n";


echo "Check if your token is valid: ";
if (isset($_POST['btn'])) {
    if ($g->checkCode($secretEncode, $_POST['token'])) {
        echo "Acesso permitido \n";
    } else {
        echo "Acesso negado \n";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste2FA</title>
</head>

<body>
    <img src="<?php echo \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('SafeProc', $secretEncode, 'NoteSec'); ?>" alt="">
    <form method="post">
        <input type="number" name="token" placeholder="000000">
        <button type="submit" name="btn">Enviar</button>
    </form>
</body>

</html>