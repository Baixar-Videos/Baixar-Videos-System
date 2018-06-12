var versao = "10.0";

$.ajax
({
type: 'POST',
dataType: 'html',
url: 'http://api.planetsweb.com.br/privadas/get_info_projetos_PlanetsWEB/consultar.php?id=5&buscar=versao',
success: function (busca){
if (busca != versao){
document.getElementById('baixarvideos').innerHTML = "<div class=' delay animated zoomIn'><h1>Nova atualização disponivel!</h1><h3>Para continuar usando nosso aplicativo atualize ele para a versão mais recente clicando no botão abaixo e baixando a nova versão</h3><br><a target='_blank' onclick=\"window.open(encodeURI('https://www.microsoft.com/pt-br/store/p/baixar-videos/9nblggh4ncbg'), '_system')\" class='btn btn-default btn-lg'' style='border-color: rgb(15, 158, 222);''>Baixar ultima versão.</a></div>";
}
}});

function AtualizarPG(link){
document.getElementById('BaixarDIV').innerHTML = '<h2 class="animated slideInUp"><i class="fa fa-spinner fa-pulse fa-fw"></i> Carregando..</h2>';
$.ajax
({
type: 'GET',
dataType: 'html',
url: 'http://www.baixar-videos.net/API/windows/baixar.php',
data: {url: '' + link + ''},
error: function() {
document.getElementById('BaixarDIV').innerHTML = '<h2 class="animated slideInUp">ERRO: algo deu erro, verifique se você está com internet!</h2>';
},
timeout: function() {
document.getElementById('BaixarDIV').innerHTML = '<h2 class="animated slideInUp">ERRO: Tempo limite atingido, verifique se você está com internet!</h2>';
},
success: function (codigo){
document.getElementById('BaixarDIV').innerHTML = codigo;
var target_offset = $("#BaixarDIV").offset();
var target_top = target_offset.top;
$('html, body').animate({ scrollTop: target_top }, 0);
}});}

function FormularioURL(){
var url = document.baixarvideos["url"].value;
AtualizarPG(url);
document.getElementById('url').value='';
}
