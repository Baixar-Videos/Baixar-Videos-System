<?php
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/anti_injection.php';
$Logado = anti_inje($_COOKIE['Logado']);
if (isset($Logado)) {
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/mysql_conectar.php';
$USER = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM usuarios WHERE id_seguranca = '".$Logado."'"));
if (($USER['id'] == null)){
echo '
<script language="JavaScript"> 
window.location="http://painel.baixar-videos.net/sair"; 
</script> 

<noscript> 
Se não for direcionado automaticamente, clique <a href="http://painel.baixar-videos.net/sair">aqui</a>. 
</noscript>
';
}
}
else
{
echo '
<script language="JavaScript"> 
window.location="http://painel.baixar-videos.net/sair"; 
</script> 

<noscript> 
Se não for direcionado automaticamente, clique <a href="http://painel.baixar-videos.net/sair">aqui</a>. 
</noscript>
';
}
?>