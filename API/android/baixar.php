<?php
 header('Access-Control-Allow-Origin: *');
require("http://www.baixar-videos.net/API/GoogleAnalytics.php");
require("/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/get_video_id.php");

echo '<br><br><div class="alert alert-warning" role="alert"><strong>Atenção! </strong> Nosso aplicativo vai parar de dar suporte direto a partir do dia <strong>05/04/2018</strong>, isso significa que a partir dessa data vamos deixar de existir o motivo é a falta de oportunidades financeiras, ainda sim quem tiver nosso <strong>aplicativo instalado será redirecionado</strong> para um site parceiro nosso que continuará dando um suporte mesmo que inferior.</div><br><br>';

if ($_GET['url'] != null){$youtubeurl = $_GET['url'];}else{$youtubeurl = $_POST['url'];}
if ($youtubeurl == null){$ID_VIDEO = getYoutubeVideoId($_REQUEST['videoid']);}else{$ID_VIDEO = getYoutubeVideoId($youtubeurl);}

$json = json_decode(file_get_contents("http://www.baixar-videos.net/API/privadas/get_video_info_download.php?u=".$ID_VIDEO));
$e = $json->download_links;

header('Content-Disposition: attachment; filename="'.$json->url_amigavel.'"');

if ($ID_VIDEO == null){
echo '<h2 lang="ERRO_URL_NULL">ERRO: O campo link(URL) não foi preenchido!</h2>';
}else
if ($ID_VIDEO == "ERRO"){
echo '<h2 lang="ERRO_INESPERADO">ERRO: Ocorreu um erro inesperado, tente novamente mais tarde!</h2>';
}else
if ($ID_VIDEO == "URL_ERROR"){
echo '<h2 lang="ERRO_URL_NAO_CONFERE">ERRO: O link(URL) digitado não confere!</h2>';
}else{

?>

<center>
<strong style="font-size: 25px;"><?php echo $json->titulo;?></strong>
<br>
<img src="<?php echo $json->tumb;?>" class="img-thumbnail img-responsive" alt="Tumb do video">
<br><br>

<?php 

echo $json->tags_html;

echo '<br><br><hr>';


if ($e != null){
for($i = 0; $i < count($e); $i++) {
$f = $e[$i]->{'formato'};
$f_s = str_replace("/mp4","",$f);
if ((strpos($f, 'mp4') !== false)) {
    echo '<a href="" onclick="window.open(\''.$e[$i]->{'url'}.'\', \'_system\')" download target="_blank" class="btn btn-default btn-lg baixar_link" style="text-decoration: none;color: #333;display: inline-block;padding: 6px 12px;border: 1px solid transparent;border-radius: 4px;border-color: rgb(15, 158, 222);"> <span lang="BOTAO_BAIXAR_VIDEO">Baixar</span> - '.$f_s.'</a> <span class="label label-primary">'.$e[$i]->{'tamanho'}.'</span><br><br>';
}
}
}else{
    echo '<h3 lang="ERRO_DOWNLOAD_INDISPONIVEL_1">Desculpe esse vídeo não está disponivel para baixar na versão de Aplicativo</h3><p lang="ERRO_DOWNLOAD_INDISPONIVEL_2">tente usar a versão de navegador acesse o link abaixo</p><a href="" onclick="ref.close();window.open(encodeURI(\'//www.baixar-videos.net/navegador\'), \'_system\')" target="_blank">www.baixar-videos.net/navegador</a>';
}

?>

</center>
<br><br>
<?php

    }
?>
<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '826a0e83b3c21f51bc8d819489ab3de3af61ae36');
</script>