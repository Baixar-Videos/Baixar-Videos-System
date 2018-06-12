<script>
$(".click_interno").click(function(e){
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
window.history.pushState({url: " "}, " " , href_name);
document.title = "Baixar Vídeos - "+href_name+" - Painel";
$('ul.nav a').removeClass('in').parent();
$(this).addClass('active').parent();
return;
});
});

</script>