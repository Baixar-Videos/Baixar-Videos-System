<?php
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/anti_csrf.php';
csrf_verificar("http://painel.baixar-videos.net/sair");

require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/mysql_conectar.php';
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/anti_injection.php';

$ID_Seguranca = hash('sha256', "".anti_inje($_POST['csrf_token'])."")."-".hash('sha256', "".$_SERVER['REMOTE_ADDR']."");

if (mysqli_query($connect, "UPDATE `usuarios` SET `id_seguranca` = '".$ID_Seguranca."', `ip` = '".$_SERVER['REMOTE_ADDR']."', `nome`='".anti_inje($_POST['nome'])."',`usuario`='".anti_inje($_POST['usuario'])."',`senha`='".hash('sha256', "".anti_inje($_POST['senha'])."")."' WHERE id = '".anti_inje($_POST['id'])."'")) {
echo '<h2 class="fadeInDown animated" style="text-align: center;color: #5cb85c;">OK: dados atualizados !</h2>';
echo '
<script language="JavaScript"> 
window.location="http://painel.baixar-videos.net/sair"; 
</script> 

<noscript> 
Se não for direcionado automaticamente, clique <a href="http://painel.baixar-videos.net/sair">aqui</a>. 
</noscript>
';
} else {
echo '<h2 class="fadeInDown animated" style="text-align: center;color: #d9534f;">ERRO: não conseguimos atualizar os dados!</h2>';
}
?>