<!DOCTYPE html>
<html>
<head>
    <title>Baixar Vídeos - Nova Atualização - APP</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=no">

    <style>
        @-ms-viewport { width: 100vw ; min-zoom: 100% ; zoom: 100% ; }          @viewport { width: 100vw ; min-zoom: 100% zoom: 100% ; }
        @-ms-viewport { user-zoom: fixed ; min-zoom: 100% ; }                   @viewport { user-zoom: fixed ; min-zoom: 100% ; }
        /*@-ms-viewport { user-zoom: zoom ; min-zoom: 100% ; max-zoom: 200% ; }   @viewport { user-zoom: zoom ; min-zoom: 100% ; max-zoom: 200% ; }*/
    </style>

	<link rel="stylesheet" href="//www.baixar-videos.net/aplicativo/NovaVersao/css/style.css">
    <link rel="stylesheet" href="//www.baixar-videos.net/aplicativo/NovaVersao/css/app.css">
	<link rel="stylesheet" href="//www.baixar-videos.net/aplicativo/NovaVersao/css/animate.min.css">
	<link rel="stylesheet" href="//www.baixar-videos.net/aplicativo/NovaVersao/css/bootstrap.min.css">
	<link rel="stylesheet" href="//www.baixar-videos.net/aplicativo/NovaVersao/css/font-awesome.min.css">
    
    <script src="//www.baixar-videos.net/aplicativo/NovaVersao/js/jquery-1.9.js"></script>
    <script type="text/javascript" src="//www.baixar-videos.net/aplicativo/NovaVersao/cordova.js"></script>
    <script src="//www.baixar-videos.net/aplicativo/NovaVersao/js/init-app.js"></script>      <!-- for your init code, see README and file comments for details -->
    <script src="//www.baixar-videos.net/aplicativo/NovaVersao/xdk/init-dev.js"></script>     <!-- normalizes device and document ready events, see file for details -->

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7169391558658534",
    enable_page_level_ads: true
  });
</script>
	
</head>

<body>
<?php require("//www.baixar-videos.net/API/GoogleAnalytics.php"); ?>
    <div id="fullpage">
<div id="loader">
<center>
<br/>
<i id="espaco" class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
<h1>Carregando...</h1>
    <br/>
</center>
</div>
<center class="pg_espaco">

<h1 class="texto_titulo delay animated flipInX">Baixar Vídeos</h1>
<div class="delay animated slideInDown">
<span class="texto_boas_vindas">Bem vindo novamente,</span><br/>
<span class="texto_cinza">
Oque você quer baixar
hoje.
</span>
</div>

<br/><br/><br/>
<form action="javascript: FormularioURL()" method="POST" class="box tile animated active" name="baixarvideos" id="baixarvideos">
<div class=' delay animated zoomIn'>
<h1>Nova atualização disponivel!</h1>
<h3>Para continuar usando nosso aplicativo atualize ele para a versão mais recente clicando no botão abaixo e baixando a nova versão</h3>
<br>
<a target='_blank' href="//www.baixar-videos.net/baixar/" class='btn btn-default btn-lg' style='border-color: rgb(15, 158, 222);'>Baixar ultima versão.</a>
</div>
</form>
<br/><br/><br/>

<div id="anuncio>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- BaixarVideos-Mobile -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7169391558658534"
     data-ad-slot="8124394827"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
    
<div id="BaixarDIV"></div>

</center>

<script type="text/javascript">
    
		// Este evendo é acionado após o carregamento da página
		jQuery(window).load(function() {
			//Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
			jQuery("#loader").delay(1500).fadeOut("slow");
		});
</script>
    </div>
</body>
</html>
