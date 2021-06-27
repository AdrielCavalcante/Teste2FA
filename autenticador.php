<?php
//Criando o form para conferir se o Token de 6 digitos está correto
include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

$g = new \Google\Authenticator\GoogleAuthenticator();

//Criar chave secret
$secret = '1234';

//Validar o Token enviado
if(isset($_POST['token'])){
    $token = $_POST['token'];
    if($g->checkCode($secret, $token)){
        //true
        echo 'Autenticação concluida com sucesso';
    } else {
        //false
        echo 'Token inválido ou expirado';
    }
    var_dump($g->checkCode($secret, $token));
    die(); //Só pra n iniciar o form dnv
}
?>

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
        <input type="number" name="token" />
        <button type="submit">Autenticar</button>
    </form>
</body>
</html>
