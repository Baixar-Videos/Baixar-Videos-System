<?php
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/mysql_conectar.php';
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/anti_injection.php';


if($_GET['modo'] == "EDIT"){
$Data_mes = substr(date('Y-m-d'), 0, -3);
if (mysqli_query($connect, "UPDATE `fi_lancamentos` SET `data`='".anti_inje($_POST['data'])."',`categoria`='".anti_inje($_POST['categoria'])."',`descricao`='".anti_inje($_POST['descricao'])."',`pagador`='".anti_inje($_POST['pagador'])."',`status`='".anti_inje($_POST['status'])."',`valor`='".anti_inje($_POST['valor'])."',`rumo`='".anti_inje($_POST['rumo'])."',`data_mes`='".$Data_mes."' WHERE id = '".anti_inje($_POST['id'])."'")) {
echo '<h2 class="fadeInDown animated" style="text-align: center;color: #5cb85c;">OK: dados atualizados !</h2>';
} else {
echo '<h2 class="fadeInDown animated" style="text-align: center;color: #d9534f;">ERRO: não conseguimos adicionados os dados!</h2>';
}
}

if($_GET['modo'] == "ADD"){
$Data_mes = substr(anti_inje($_POST['data']), 0, -3);
if (mysqli_query($connect, "INSERT INTO `fi_lancamentos`(`data`, `categoria`, `descricao`, `pagador`, `status`, `valor`, `rumo`, `data_mes`) VALUES ('".anti_inje($_POST['data'])."','".anti_inje($_POST['categoria'])."','".anti_inje($_POST['descricao'])."','".anti_inje($_POST['pagador'])."','".anti_inje($_POST['status'])."','".anti_inje($_POST['valor'])."','".anti_inje($_POST['rumo'])."','".$Data_mes."')")) {
echo '<h2 class="fadeInDown animated" style="text-align: center;color: #5cb85c;">OK: dados adicionados !</h2>';
}else {
echo '<h2 class="fadeInDown animated" style="text-align: center;color: #d9534f;">ERRO: não conseguimos adicionados os dados!</h2>';
}
}

if($_GET['modo'] == "REMOVE"){
if (mysqli_query($connect, "DELETE FROM fi_lancamentos WHERE id = '".$_POST['id']."'")) {
echo '<h2 class="fadeInDown animated" style="text-align: center;color: #5cb85c;">OK: dado removido !</h2>';
}else {
echo '<h2 class="fadeInDown animated" style="text-align: center;color: #d9534f;">ERRO: não conseguimos remover os dados!</h2>';
}
}

?>