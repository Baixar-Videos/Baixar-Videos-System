<?php
require 'processar/Logado.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Baixar Vídeos - Painel</title>
	<link rel="shortcut icon" href="http://www.baixar-videos.net/img/Logo/vermelha.png" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="http://painel.baixar-videos.net/src/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://painel.baixar-videos.net/src/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://painel.baixar-videos.net/src/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="http://painel.baixar-videos.net/src/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://painel.baixar-videos.net/src/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <!-- DataTables CSS -->
    <link href="http://painel.baixar-videos.net/src/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="http://painel.baixar-videos.net/src/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
	<link href="http://painel.baixar-videos.net/src/vendor/animate/animate.css" rel="stylesheet">
	
    <link href="http://painel.baixar-videos.net/src/vendor/summernote/summernote.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	

</head>


<body>
<div id="loader" style="position: fixed;z-index: 1999;width: 100%;height: 100%;background-color: #f8f8f8;">
<center>
<br/>
<i style="margin-top: 250px;" class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
<h1>Carregando...</h1>
    <br/>
</center>
</div>

<nav class="navbar navbar-default navbar-static-top navbar-shadow-top" role="navigation" style="margin-bottom: 0">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
<a href="home"><img align="left" src="http://painel.baixar-videos.net/img/logotipo_baixarvideos.png" class="img-responsive" width="120" height="120"></a>
</div>

<ul class="nav navbar-top-links navbar-right pull-right">
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu dropdown-user">
<li><a class="click" href="configuracoes"><i class="fa fa-gear fa-fw"></i> Configurações</a></li>
<li class="divider"></li>
<li><a href="sair"><i class="fa fa-sign-out fa-fw"></i> Sair</a></li>
</ul>
</li>
</ul>


<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav navbar-collapse">
<ul class="nav" id="side-menu">

<li><a class="click" href="painel_controle"><i class="fa fa-dashboard fa-fw"></i> Painel de Controle</a></li>
<li>
<a href="#"><i class="fa fa-money fa-fw"></i> Financeiro <span class="fa arrow"></span></a> 
<ul class="nav nav-second-level">
<li><a class="click" href="fi_lancamentos">Lançamentos</a></li>
</ul>
</li>
<li>
<a href="#"><i class="fa fa-pie-chart fa-fw"></i> Relatorios <span class="fa arrow"></span></a> 
<ul class="nav nav-second-level">
<li><a class="click" href="re_fluxo_caixa">Fluxo de caixa</a></li>
<li><a class="click" href="re_folha_pagamento">Folha de pagamento</a></li>
<li><a class="click" href="re_folha_ponto">Folha de ponto</a></li>
</ul>
</li>

<li><a href="http://www.baixar-videos.net/Manual_de_indentidade_visual_Penha_Garden.pdf" target="_blank"><i class="fa fa-file-pdf-o fa-fw"></i> Manual de identidade visual</a></li>
<br>
<center>
<a href="http://www.planetsweb.com.br" target="_blank" style="cursor: url(http://fotos.planetsweb.com.br/geral/logo.cur) 4 12, auto!important;border: none!important;">
<img style="opacity: 0.5;" src="http://fotos.planetsweb.com.br/painel/logotipo_home.png" alt="PlanetsWEB">
</a>
</center>
</ul>
</div>
</div>

</nav>

<!-- ABRE div PageDados -->
<div id="PageDados">

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Carregando...</h1>
</div>
</div>
</div>

</div>
<!-- FECHA div PageDados -->


    </div>
    <!-- /#wrapper -->
	
	<script src="http://painel.baixar-videos.net/src/vendor/jquery/jquery.min.js"></script>
	<script src="http://painel.baixar-videos.net/src/vendor/jquery/jquery.form.min.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="http://painel.baixar-videos.net/src/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://painel.baixar-videos.net/src/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="http://painel.baixar-videos.net/src/vendor/raphael/raphael.min.js"></script>
    <script src="http://painel.baixar-videos.net/src/vendor/morrisjs/morris.min.js"></script>

    <!-- Custom Theme JavaScript -->
	<script src="http://painel.baixar-videos.net/src/vendor/jquery.maskedinput/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="http://painel.baixar-videos.net/src/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="http://painel.baixar-videos.net/src/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="http://painel.baixar-videos.net/src/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="http://painel.baixar-videos.net/src/vendor/datatables-responsive/dataTables.responsive.js"></script>
	
	<!-- include summernote css/js-->
    <script src="http://painel.baixar-videos.net/src/vendor/summernote/summernote.js"></script>
	
	<script src="http://painel.baixar-videos.net/src/vendor/parallax/parallax.min.js"></script>

<script type="text/javascript">
    
		// Este evendo é acionado após o carregamento da página
		$(window).on('load', function() {
			//Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
			$("#loader").delay(1500).fadeOut("slow");
		});
</script>
<?php require 'processar/Click.php';?>

</body>

</html>
