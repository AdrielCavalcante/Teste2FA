<?php

include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

$secret = 'd6b186e03b2471062ddce1df5ddf8c6e7da75d5d938de09ae8444552aef03f49'; //Senha q vou mudar

$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

echo 'Current Code is: ';
echo $g->getCode($secret); 

echo "\n";

echo "The QR Code for this secret (to scan with the Google Authenticator App: \n";

echo "\n";


echo "Check if your token is valid: ";
if(isset($_POST['btn'])){
    if ($g->checkCode($secret, $_POST['token'])) {
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
    <img src="<?php echo \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('SafeProc', $secret, 'NoteSec'); ?>" alt="">
    <form method="post">
        <input type="number" name="token" placeholder="000000">
        <button type="submit" name="btn">Enviar</button>
    </form>
</body>
</html>
