<?php
if ($_SERVER['SERVER_NAME'] == "www.planetsweb.com.br"){
include ("/home/plane132/public_html/SitesHospedados/baixar-videos.net/aplicativo/NovaVersao/index.php");
}
else
if ($_GET['modo'] == "APP"){
include ("/home/plane132/public_html/SitesHospedados/baixar-videos.net/aplicativo/NovaVersao/index.php");
}else{
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Baixar Vídeos - Baixe vídeos do YouTube no seu celular</title>
<link rel="shortcut icon" href="//www.baixar-videos.net/img/Logo/vermelha.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="PlanetsWEB">
<meta name="description" content="Baixar Vídeos - Baixe vídeos do YouTube no seu celular"/>
<meta name="keywords" content="Vídeos, Musica, Videos, baixar musica, baixar vídeos, baixar videos, Baixar Vídeos, Baixe vídeos do YouTube no seu celular" />

<meta property="og:title" content="Baixar Vídeos - Baixe vídeos do YouTube no seu celular"/>
<meta property="og:image" content="//www.baixar-videos.net/img/Wallpaper/paisagem_logo.jpg"/>
<meta property="og:site_name" content="Baixar Vídeos"/>
<meta property="og:description" content="Baixe vídeos do YouTube no seu celular"/>
<meta name="twitter:title" content="Baixar Vídeos - Baixe vídeos do YouTube no seu celular" />
<meta name="twitter:image" content="//www.baixar-videos.net/img/Wallpaper/paisagem_logo.jpg" />

<link href="//www.baixar-videos.net/src/css/bootstrap.min.css" rel="stylesheet">
<link href="//www.baixar-videos.net/src/css/landing-page.css" rel="stylesheet">
<link href="//www.baixar-videos.net/src/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>
<?php require("https://www.baixar-videos.net/API/GoogleAnalytics.php"); ?>
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
<div class="container topnav">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand topnav" href="//www.baixar-videos.net" style="padding: 7px 7px;"><img class="img-responsive" src="//www.baixar-videos.net/img/LogoTipo/vermelha.png" width="100"></a>
</div>
 
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
<li>
<a href="#Home">Home</a>
</li>
<li>
<a href="#SaibaMais">Saiba Mais</a>
</li>
<li>
<a href="#RedesSociais">Redes Sociais</a>
</li>
</ul>
</div>

</div>

</nav>

<a name="Home"></a>
<div class="intro-header parallax-window" data-parallax="scroll" data-image-src="//www.baixar-videos.net/img/Wallpaper/paisagem_escuro.jpg">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="intro-message">
<img class="img-responsive" src="img/LogoTipo/branca.png">
<h4>O aplicativo para você baixar musicas e videos direto do seu dispositivo com facilidade!</h4>
<hr class="intro-divider">
<ul class="list-inline intro-social-buttons">
<li>
<a target="_blank" href="https://www.microsoft.com/pt-br/store/apps/baixar-v%C3%ADdeos/9nblggh4ncbg"><img class="img-responsive" src="//www.baixar-videos.net/img/botao/WindowsStore.png"></a>
</li>
<li>
<a target="_blank" href="//www.baixar-videos.net/baixar/android"><img class="img-responsive" src="//www.baixar-videos.net/img/botao/APK.png"></a>
</li>
<li>
<a disabled target="_blank" href="https://baixar-videos.br.uptodown.com/android"><img class="img-responsive" src="//www.baixar-videos.net/img/botao/Uptodown.png"></a>
</li>
<li>
<a target="_blank" href="http://m.planetsweb.store.aptoide.com/app/market/xdk.intel.blank.ad.BaixarVideos_Android/18/23538425/Baixar+V%C3%ADdeos"><img class="img-responsive" src="//www.baixar-videos.net/img/botao/Aptoide.png"></a>
</li>
<hr class="intro-divider">
<li>
<a target="_blank" href="//www.baixar-videos.net/navegador" class="btn btn-default btn-lg"><i class="fa fa-desktop fa-fw"></i> <span class="network-name">Versão para Navegadores</span></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>

<a  name="SaibaMais"></a>

<div class="content-section-a">
<div class="container">
<div class="row">
<div class="col-lg-5 col-sm-6">
<hr class="section-heading-spacer">
<div class="clearfix"></div>
<h2 class="section-heading">Otimo para seu<br>Tablet</h2>
<p class="lead">Nosso aplicativo funciona com todas plataformas e o tablets não poderia ficar fora.</p>
</div>
<div class="col-lg-5 col-lg-offset-2 col-sm-6">
<img class="img-responsive" src="//www.baixar-videos.net/img/ipad.png" alt="">
</div>
</div>
</div>
</div>

<div class="content-section-b parallax-window" data-parallax="scroll" data-image-src="//www.baixar-videos.net/img/Wallpaper/paisagem_escuro.jpg">
<div class="container">
<div class="row">
<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
<hr class="section-heading-spacer">
<div class="clearfix"></div>
<h2 class="section-heading">Magnifico para seu<br>Computador</h2>
<p class="lead">Nosso aplicativo começou com os computadores com nosso site e é claro que o novo app não vai ficar de fora para computadores.</p>
</div>
<div class="col-lg-5 col-sm-pull-6  col-sm-6">
<img class="img-responsive" src="//www.baixar-videos.net/img/dog.png" alt="">
</div>
</div>
</div>
</div>

<div class="content-section-a">
<div class="container">
<div class="row">
<div class="col-lg-5 col-sm-6">
<hr class="section-heading-spacer">
<div class="clearfix"></div>
<h2 class="section-heading">Perfeito para seu<br>Celular</h2>
<p class="lead">Celulares hoje em dia é os dispositivos mais usados é claro que a gente não ia esquecer dele nosso aplicativo funciona perfeitamente para celulares.</p>
</div>
<div class="col-lg-5 col-lg-offset-2 col-sm-6">
<img class="img-responsive" src="//www.baixar-videos.net/img/phones.png" alt="">
</div>
</div>
</div>
</div>

<a  name="RedesSociais"></a>
<div class="banner parallax-window" data-parallax="scroll" data-image-src="//www.baixar-videos.net/img/Wallpaper/paisagem_escuro.jpg">
<div class="container">
<div class="row">
<div class="col-lg-12">
<center>
<h2>Venha conheçer o mundo gratis dos videos e musicas.</h2><br>
<a href="//www.baixar-videos.net/baixar" class="btn btn-default btn-lg"><i class="fa fa-download fa-fw"></i> <span class="network-name">Baixar aplicativo</span></a>
</center>
<br><br><br><br><br><br>
</div>
<div class="col-lg-6">
<h2>Siga a gente nas redes sociais:</h2>
</div>
<div class="col-lg-6">
<ul class="list-inline banner-social-buttons">
<li>
<a target="_blank" href="https://www.facebook.com/baixarvideos.online/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">FaceBook</span></a>
</li>
</ul>
</div>
</div>
</div>
</div>

<footer>
<div class="container">
<div class="row">
<div class="col-lg-12">
<p class="copyright text-muted small">&copy; 2016 - <?php echo date('Y'); ?> | Baixar Vídeos - Todos Diretos Reservados!</p>
<center>
<a href="//www.planetsweb.com.br" target="_blank" style="cursor: url(http://fotos.planetsweb.com.br/geral/logo.cur) 4 12, auto!important;border: none!important;">
<img src="http://fotos.planetsweb.com.br/painel/logotipo_home.png" alt="PlanetsWEB">
</a>
<hr class="intro-divider">
</center>
</div>
</div>
</div>
</footer>

<script src="//www.baixar-videos.net/src/js/jquery.js"></script>
<script src="//www.baixar-videos.net/src/js/parallax.min.js"></script>
<script src="//www.baixar-videos.net/src/js/scroll.min.js"></script>
<script src="//www.baixar-videos.net/src/js/bootstrap.min.js"></script>
<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '826a0e83b3c21f51bc8d819489ab3de3af61ae36');
</script>
</body>

</html>
<?php
}
?>