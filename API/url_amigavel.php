<?php
function limpar_url($texto){
    // substitui espaços por "-"
    $title = preg_replace('#\s+#', '-', $texto);

    // substitui acentos
    $title = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$title);
    
        // faz a transliteração pra ASCII
        $title = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $title);
    
        // remove qualquer outra coisa inválida da url
        $title = preg_replace('#[^a-zA-Z0-9_-]+#', '', $title);
    
        return strtolower($title);
}
?>
