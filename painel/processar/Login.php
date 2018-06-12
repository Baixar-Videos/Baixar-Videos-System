<?php
header('Access-Control-Allow-Origin: *');
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/anti_csrf.php';
csrf_verificar("http://painel.baixar-videos.net/sair");

require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/mysql_conectar.php';
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/anti_injection.php';
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/calculadora_time.php';

$P_USER = strtolower(anti_inje($_POST['usuario']));
$P_SENHA = anti_inje($_POST['senha']);

$ID_Seguranca = hash('sha256', "".anti_inje($_POST['csrf_token'])."")."-".hash('sha256', "".$_SERVER['REMOTE_ADDR']."");

$array = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM usuarios WHERE usuario = '".$P_USER."'"));
$senha = hash('sha256', "".$P_SENHA."");

if ($array['id'] == null) {
echo "Errou a senha ou o usuario!";
return;
}else{

if (($array['senha'] == $senha) & (strtolower($array['usuario']) == $P_USER)){
if (!mysqli_query($connect, "UPDATE usuarios  SET id_seguranca = '".$ID_Seguranca."', ip = '".$_SERVER['REMOTE_ADDR']."' WHERE id = '".$array['id']."'")){
echo "ERRO: Desculpa aconteceu algo inesperado tente novamente mais tarde!";
}else{
$Data_mes = substr(date('Y-m-d'), 0, -3);
$Entrada = date("H:i");
$Saida = date("H:i",mktime(date("H")+8,date("i"),date("s"),date("m"),date("d"),date("Y")));
if (mysqli_query($connect, "INSERT INTO `fu_ponto`(`user_id`, `data`, `data_mes`, `entrada`, `saida`, `intervalo`, `horas_trabalhadas`) VALUES ('".$array['id']."','".date('Y-m-d')."','".$Data_mes."','".$Entrada."','".$Saida."','01:00','07:00')")){
}

echo "OK: ".$ID_Seguranca;
return;
}
}else{
echo "Errou a senha ou o usuario!";
return;
}


}

?>