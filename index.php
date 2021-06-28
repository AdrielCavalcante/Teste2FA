<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoogleAuth</title>
</head>
<body>
    <h1>Informe o Token de autenticação 2FA</h1>
    <form method="post">
        <img src="<?php echo $g->getUrl('', 'teste-2fa-google-php.herokuapp.com', $secret)?>" alt="Qr Code" />
        <input type="number" name="token" />
        <button type="submit">Autenticar</button>
    </form>
</body>
</html>

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


