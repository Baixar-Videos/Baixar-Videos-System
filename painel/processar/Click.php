<script>
<?php
if ($_GET['url'] == null){
echo '
var href = "http://painel.baixar-videos.net/painel_controle";
var href_name = href.replace("http://painel.baixar-videos.net/", "");
var href = "paginas/" + href_name + ".php";
$.get(href, function(data){
$("#PageDados").html(data);
window.history.pushState({url: " "}, " " , href_name);
document.title = "Baixar Vídeos - "+href_name+" - Painel";
});
';
}else
if ($_GET['url'] == "home"){
echo '
var href = "http://painel.baixar-videos.net/painel_controle";
var href_name = href.replace("http://painel.baixar-videos.net/", "");
var href = "paginas/" + href_name + ".php";
$.get(href, function(data){
$("#PageDados").html(data);
window.history.pushState({url: " "}, " " , href_name);
document.title = "Baixar Vídeos - "+href_name+" - Painel";
});
';
}else
if (file_exists("paginas/".$_GET['url'].".php")){
if ($_GET['ANO'] != null){echo 'var get = "?ANO='.$_GET['ANO'].'";';}else{echo 'var get = "";';}
echo '
var href = "http://painel.baixar-videos.net/'.$_GET['url'].'";
var href_name = href.replace("http://painel.baixar-videos.net/", "");
var href = "paginas/" + href_name + ".php";
$.get(href+get, function(data){
$("#PageDados").html(data);
window.history.pushState("string", "Baixar Vídeos - "+href_name+" - Painel", "/"+href_name+get);
});
';
}else{
echo '$(".page-header").html("ERRO: Pagina não encontrada!");';
}
?>

var atualizar;

$(".click").click(function(e){
var href = this.href;
var href_name = href.replace("http://painel.baixar-videos.net/", "");
var href = "paginas/" + href_name + ".php";
e.preventDefault();
e.stopPropagation();
$("#PageDados").html('<div id="page-wrapper"><div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-spinner fa-pulse fa-fw"></i>Carregando...</h1></div></div></div>');
$.get(href, function(data){
$("#PageDados").html(data);
$(".sidebar-nav").attr("style", "height: 0.8px;");
$('.sidebar-nav').removeClass('in').parent();
window.history.pushState({url: " "}, href_name , href_name);
document.title = "Baixar Vídeos - "+href_name+" - Painel";
$('ul.nav a').removeClass('in').parent();
$(this).addClass('active').parent();
return;
});
});

var href_antigo = window.location.href;

jQuery(document).ready(function($) {

  if (window.history && window.history.pushState) {
    window.history.pushState(window.location.href.replace("http://painel.baixar-videos.net/", ""), null, './'+window.location.href.replace("http://painel.baixar-videos.net/", ""));

    $(window).on('popstate', function() {
var href = window.location.href;
if (href_antigo != href){
var href_name = href.replace("http://painel.baixar-videos.net/", "");
var href = "paginas/" + href_name + ".php";
href_antigo = window.location.href;
$.get(href, function(data){
$("#PageDados").html(data);
console.log('ATUALIZOU A PAGINA');
});
}
    });

  }
});

function CarregarPG(href, get)
{
var href_name = href.replace("http://painel.baixar-videos.net/", "");
var href = "paginas/" + href_name + ".php";
$("#PageDados").html('<div id="page-wrapper"><div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-spinner fa-pulse fa-fw"></i>Carregando...</h1></div></div></div>');
$.get(href+get, function(data){
$("#PageDados").html(data);
$(".sidebar-nav").attr("style", "height: 0.8px;");
$('.sidebar-nav').removeClass('in').parent();
window.history.pushState({url: " "}, href_name , href_name);
document.title = "Baixar Vídeos - "+href_name+" - Painel";
$('ul.nav a').removeClass('in').parent();
return;
});
}

</script>