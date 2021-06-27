<?php
date_default_timezone_set('America/Sao_Paulo');
//Criando QR Code para ler com o app
include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

$g = new \Google\Authenticator\GoogleAuthenticator();

//Criar chave secret
$secret = 'AdrielPegadorDeTodas';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Auth</title>
</head>
<body>
    <h1>Resgistre sua autenticação de 2 fatores com o GoogleAuthenticator</h1>
    <a href="autenticador.php">Inserir o token</a>
    <img src="<?php echo $g->getUrl('', 'teste-2fa-google-php.herokuapp.com', $secret)?>" alt="Qr Code" />
</body>
</html>