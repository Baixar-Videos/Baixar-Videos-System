<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=utf-8");
$json = json_decode(file_get_contents("https://www.baixar-videos.net/API/privadas/info_video/get_json.php?id=".$_GET['u']));
echo json_encode($json);

// Arquivo principal que puxa os LINKS e gera o JSON fica em YouTube-Downloader-0.5.1/src/ResultController.php
?>
