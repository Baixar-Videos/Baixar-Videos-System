<?php
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
?>
