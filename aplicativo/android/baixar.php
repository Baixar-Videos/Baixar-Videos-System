<?php
 header('Access-Control-Allow-Origin: *');
require("http://www.baixar-videos.net/API/GoogleAnalytics.php");
include_once('../config.php');

if ($_GET['url'] != null){$youtubeurl = $_GET['url'];}else{$youtubeurl = $_POST['url'];}
if ($youtubeurl == null){$my_id = $_REQUEST['videoid'];}else{$my_id = $youtubeurl;}

function getYoutubeVideoId($video){
parse_str( parse_url( $video, PHP_URL_QUERY ), $array );
if ($array['v'] == null){
if (strpos($video, '.be/') !== false) {
$id = explode(".be/", $video);
return $id[1];
}else{
if (strpos($video, '/shared?ci=') !== false) {
$tags = get_meta_tags($video);
$codigo1 = $tags['twitter:image'];
$codigo2 = explode("/maxresdefault", $codigo1);
$id = explode(".com/vi/", $codigo2[0]);
return $id[1];
}else{
return "URL_ERROR";
}
}
}else{
return $array['v'];
}
}

echo '<br/><br/><div class="animated slideInUp">';
if ($my_id == null){
echo '<h2>ERRO: O campo link(URL) não foi preenchido!</h2>';
}else
$videoid = getYoutubeVideoId($my_id);

if ($videoid == "ERRO"){
echo '<h2>ERRO: Ocorreu um erro inesperado, tente novamente mais tarde!</h2>';
}else
if ($videoid == "URL_ERROR"){
echo '<h2>ERRO: O link(URL) digitado não confere!</h2>';
}else{




$my_video_info = curlGet('http://www.youtube.com/get_video_info?&video_id='. $videoid.'&asv=3&el=detailpage&hl=en_US');
if (strpos($my_video_info, 'reason=Invalid') !== false) {
echo '<h2>ERRO: O link(URL) digitado não confere!</h2>';
}else{
$thumbnail_url = $title = $url_encoded_fmt_stream_map = $type = $url = '';
parse_str($my_video_info);
if(isset($url_encoded_fmt_stream_map)) {
$my_formats_array = explode(',',$url_encoded_fmt_stream_map);
if($debug) {
echo '<pre>';
print_r($my_formats_array);
echo '</pre>';
}} else {
echo '<p>URL errada.</p>';
echo $my_video_info;
}
if (count($my_formats_array) == 0) {
echo '<p>Nenhum mapa de fluxo de formato encontrado - foi a identificação de vídeo correta?</p>';
exit;
}

$avail_formats[] = '';
$i = 0;
$ipbits = $ip = $itag = $sig = $quality = '';
$expire = time(); 

foreach($my_formats_array as $format) {
parse_str($format);
$avail_formats[$i]['itag'] = $itag;
$avail_formats[$i]['quality'] = $quality;
$type = explode(';',$type);
$avail_formats[$i]['type'] = $type[0];
$avail_formats[$i]['url'] = urldecode($url) . '&signature=' . $sig;
parse_str(urldecode($url));
$avail_formats[$i]['expires'] = date("G:i:s T", $expire);
$avail_formats[$i]['ipbits'] = $ipbits;
$avail_formats[$i]['ip'] = $ip;
$i++;
}
echo '<h3><p>Titulo: <font color="#3366FF">'.$title.'</font></p><h3>';
echo '<img  src="http://i1.ytimg.com/vi/'. $videoid .'/mqdefault.jpg"></br>';

echo '</br><a href="" onclick="window.open(encodeURI(\'http://www.youtubeinmp3.com/fetch/?video=http://www.youtube.com/watch?v=' . $videoid . '\'), \'_system\')" target="_blank" class="btn btn-default btn-lg" style="text-decoration: none;color: #333;display: inline-block;padding: 6px 12px;border: 1px solid transparent;border-radius: 4px;border-color: rgb(15, 158, 222);">Baixar em MP3 - Normal</a></br>';
echo '</br><a href="" onclick="window.open(encodeURI(\'http://www.youtubeinmp4.com/redirect.php?video=' . $videoid . '&\'), \'_system\')" target="_blank" class="btn btn-default btn-lg baixar_link" style="text-decoration: none;color: #333;display: inline-block;padding: 6px 12px;border: 1px solid transparent;border-radius: 4px;border-color: rgb(15, 158, 222);">Baixar em MP4 - 360p</a></br>';

for ($i = 0; $i < count($avail_formats); $i++) {
if ($avail_formats[$i]['type'] == "video/mp4"){
if ($avail_formats[$i]['quality'] == "hd720"){ $qualidadevideo = "HD 720p";}else{$qualidadevideo = "360p";}
echo '</br><a href="" onclick="window.open(encodeURI(\'' . $avail_formats[$i]['url'] . '&title='.$cleanedtitle.'\'), \'_system\')" download target="_blank" class="btn btn-default btn-lg baixar_link" style="text-decoration: none;color: #333;display: inline-block;padding: 6px 12px;border: 1px solid transparent;border-radius: 4px;border-color: rgb(15, 158, 222);">Baixar em MP4 - '.$qualidadevideo.'</a></br>';
}}
}
}
echo '</div>';
?>

