<?php
session_start();

function csrf_gerar()
{

// crian sesão do token
$csrf_token = hash('sha256', md5(uniqid(rand(), TRUE)));;
$_SESSION['csrf_token'] = $csrf_token;

return "<input type='hidden' name='csrf_token' id='csrf_token' value='".$csrf_token."' />";
}

function csrf_verificar($link_pararetorno)
{

if(($_POST['csrf_token'] == $_SESSION['csrf_token']) || ($_GET['csrf_token'] == $_SESSION['csrf_token'])){

// removendo sesão do token
session_unset();
session_destroy();
unset($_SESSION['csrf_token'][""]);
$_SESSION["csrf_token"] = "";

// token validado

}else{
// token não é igual

header('Location: '.$link_pararetorno.'/token nao validado');
return;

}

session_write_close();
}

?>