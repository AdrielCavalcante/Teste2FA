<?php
declare(strict_types=1);
//Criando o form para conferir se o Token de 6 digitos está correto
include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

//Criar chave secret
$secret = 'AdrielPegadorDeTodas';

//Validar o Token enviado
if(isset($_POST['token'])){
    $token = $_POST['token'];
    var_dump($g);
    echo "<br>";

    echo $token ."<br>". $g->getCode($secret);
    echo "<br>";
    if($g->checkCode($secret, $token)){
        //true
        echo 'Autenticação concluida com sucesso';
    } else {
        //false
        echo 'Token inválido ou expirado';
    }
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
