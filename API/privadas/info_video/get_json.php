<?php
require "dependencia.php";
include_once("../../url_amigavel.php");

header("Content-Type: application/json; charset=utf-8");

error_reporting(0);

$my_id = $_GET['id'];

$videoFetchURL = "http://www.youtube.com/get_video_info?&video_id=" . $my_id . "&asv=3&el=detailpage&hl=en_US";
$videoData = get($videoFetchURL);

parse_str($videoData, $video_info);

$video_info = json_decode(json_encode($video_info));
if (!$video_info->status ===  "ok") {
    die("erro na busca de dados de vídeo do youtube");
}
$videoTitle = $video_info->title;if(!isset($videoTitle)){$videoTitle = "NULL";}
$videoAuthor = $video_info->author;if(!isset($videoAuthor)){$videoAuthor = "NULL";}
$videoDurationSecs = $video_info->length_seconds;if(!isset($videoDurationSecs)){$videoDurationSecs = "NULL";}
$videoDuration = secToDuration($videoDurationSecs);if(!isset($videoDuration)){$videoDuration = "NULL";}
$videoViews = $video_info->view_count;if(!isset($videoViews)){$videoViews = "NULL";}

//altere hqdefault.jpg para default.jpg para degradar a qualidade da miniatura
$videoThumbURL = "http://i1.ytimg.com/vi/{$my_id}/mqdefault.jpg";if(!isset($videoThumbURL)){$videoThumbURL = "NULL";}
$videoThumbURL_hd = "http://i1.ytimg.com/vi/{$my_id}/hqdefault.jpg";if(!isset($videoThumbURL_hd)){$videoThumbURL_hd = "NULL";}

if (!isset($video_info->url_encoded_fmt_stream_map)) {
    die('Nenhum dado encontrado');
}

$streamFormats = explode(",", $video_info->url_encoded_fmt_stream_map);

if (isset($video_info->adaptive_fmts)) {
    $streamSFormats = explode(",", $video_info->adaptive_fmts);
    $pStreams = parseStream($streamSFormats);
}
    $cStreams = parseStream($streamFormats);


//Pegando mais informações do video

$apikey = 'AIzaSyCxPBQhEkXI9gpmd7U4YRRUlI3BG9wADN0';
$YT_DATA_json = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$my_id.'&key='.$apikey.'&part=snippet');
$YT_DATA = json_decode($YT_DATA_json);

$V_CATEGORIA_ID = $YT_DATA->items[0]->snippet->categoryId;

$YT_VIDEO_CATEGORIA_json = file_get_contents('https://www.googleapis.com/youtube/v3/videoCategories?id='.$V_CATEGORIA_ID.'&key='.$apikey.'&part=snippet');
$YT_VIDEO_CATEGORIA = json_decode($YT_VIDEO_CATEGORIA_json);

    
// Variaveis personalizadas

$cleanedtitle = limpar_url($videoTitle);if(!isset($cleanedtitle)){$cleanedtitle = "NULL";}
$V_tags_array = $YT_DATA->items[0]->snippet->tags;if(!isset($V_tags_array)){$V_tags_array = "NULL";}
$V_id_canal = $YT_DATA->items[0]->snippet->channelId;if(!isset($V_id_canal)){$V_id_canal = "NULL";}
$V_data_publicado = $YT_DATA->items[0]->snippet->publishedAt;if(!isset($V_data_publicado)){$V_data_publicado = "NULL";}
$V_idioma = $YT_DATA->items[0]->snippet->defaultLanguage;if(!isset($V_idioma)){$V_idioma = "NULL";}
$V_idioma_audio = $YT_DATA->items[0]->snippet->defaultAudioLanguage;if(!isset($V_idioma_audio)){$V_idioma_audio = "NULL";}
$V_categoria = $YT_VIDEO_CATEGORIA->items[0]->snippet->title;if(!isset($V_categoria)){$V_categoria = "NULL";}
$V_live_streamer = $YT_DATA->items[0]->snippet->liveBroadcastContent;if(!isset($V_live_streamer)){$V_live_streamer = "NULL";}


// Separando tags da array
$V_tags = "";
if ($V_tags_array != null){foreach ($V_tags_array as $value) {
$V_tags .= $value.", ";
}}

if($V_tags == null){$V_tags = "NULL";}

// Separando tags HTML da array
$V_tags_html = "";
if ($V_tags_array != null){foreach ($V_tags_array as $value) {
$V_tags_html .= " <span class='label label-primary'>$value</span> ";
}}

if($V_tags_html == null){$V_tags_html = "NULL";}

// Pegar a netowrk do canal 
libxml_use_internal_errors(true) and libxml_clear_errors();
$header = "X-Forwarded-For: {$_SERVER['REMOTE_ADDR']}";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,   "https://socialblade.com/youtube/channel/".$V_id_canal);
curl_setopt($ch, CURLOPT_REFERER, "https://socialblade.com");
curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
$DOM = new DOMDocument();
$DOM->loadHTML($html);
$xpath = new DomXpath($DOM);
$NETWORK = $xpath->query('//a[@id="youtube-user-page-network"]')->item(0);
$C_network = $NETWORK->nodeValue;if($C_network == "None"){$C_network = "NULL";}if(!isset($C_network)){$C_network = "NULL";}


// Criando JSON

$PG_EXIBIR = "";

$PG_EXIBIR .= '
{
  "id": "'.$my_id.'",
  "titulo": "'.$videoTitle.'",
  "url_amigavel": "'.$cleanedtitle.'",
  "tumb": "'. $videoThumbURL .'",
  "tumb_hd": "'. $videoThumbURL_hd .'",
  "data_publicado": "'. $V_data_publicado .'",
  "visualizacoes": "'. $videoViews .'",
  "duracao": "'. $videoDuration .'",
  "categoria": "'. $V_categoria .'",
  "canal": "'. $videoAuthor .'",
  "canal_id": "'. $V_id_canal .'",
  "network": "'. $C_network .'",
  "idioma": "'. $V_idioma .'",
  "idioma_audio": "'. $V_idioma_audio .'",
  "live_streamer": "'. $V_live_streamer .'",
  "tags": "'. $V_tags .'",
  "tags_html": "'. $V_tags_html .'",
  "download_links": [
';

if ($V_live_streamer != "live"){


foreach ($cStreams as $stream){
    if (!isset($pStreams)){
    if($stream == end($pStreams)){
        $stream = json_decode(json_encode($stream)) ;
        if ($stream->size != "0 MB"){
        $PG_EXIBIR .= '
        {
        "url": "'.$stream->url.'&title='.$cleanedtitle.'",
        "formato": "'.$stream->type.' - '.$stream->quality.'",
        "tamanho": "'.$stream->size.'"
        }
        ';
        }
    }else{
        $stream = json_decode(json_encode($stream)) ;
        if ($stream->size != "0 MB"){
        $PG_EXIBIR .= '
        {
        "url": "'.$stream->url.'&title='.$cleanedtitle.'",
        "formato": "'.$stream->type.' - '.$stream->quality.'",
        "tamanho": "'.$stream->size.'"
        },
        ';
        }
    }
    }else{
        $stream = json_decode(json_encode($stream)) ;
        if ($stream->size != "0 MB"){
        $PG_EXIBIR .= '
        {
        "url": "'.$stream->url.'&title='.$cleanedtitle.'",
        "formato": "'.$stream->type.' - '.$stream->quality.'",
        "tamanho": "'.$stream->size.'"
        },
        ';
        }
    }
}

if (isset($pStreams)){
    foreach ($pStreams as $stream){
        if($stream == end($pStreams)){
            $stream = json_decode(json_encode($stream)) ;
            if ($stream->size != "0 MB"){
            $PG_EXIBIR .= '
            {
            "url": "'.$stream->url.'&title='.$cleanedtitle.'",
            "formato": "'.$stream->type.' - '.$stream->quality.'",
            "tamanho": "'.$stream->size.'"
            }
            ';
            }
        }else{
            $stream = json_decode(json_encode($stream)) ;
            if ($stream->size != "0 MB"){
            $PG_EXIBIR .= '
            {
            "url": "'.$stream->url.'&title='.$cleanedtitle.'",
            "formato": "'.$stream->type.' - '.$stream->quality.'",
            "tamanho": "'.$stream->size.'"
            },
            ';
            }
        }
    }
}


}

$PG_EXIBIR .= '
]
}
';

echo ($PG_EXIBIR);

?>
