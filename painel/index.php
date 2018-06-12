<?php
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/anti_csrf.php';
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/anti_injection.php';

if (isset($_COOKIE['Logado'])) {
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/mysql_conectar.php';
$USER = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM usuarios WHERE id_seguranca = '".anti_inje($_COOKIE['Logado'])."'"));
if ($USER['id'] == null){header("Location:http://painel.baixar-videos.net/sair");}else{header("Location:http://painel.baixar-videos.net/home");}
}
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
	
	<link href="http://painel.baixar-videos.net/src/css/animate.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://painel.baixar-videos.net/src/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<script>
function ProcessarLogin()
{
$.post("http://painel.baixar-videos.net/processar/Login.php",  $("#form_login").serialize(), function(data){
var text = data;

if (text.includes("OK:")){
var ID = text.replace("OK:", "");
var d = new Date();
d.setTime(d.getTime() + (1*24*60*60*1000));
var expires = "expires="+ d.toUTCString();
document.cookie = "Logado=" + ID + ";" + expires + ";path=/";

$("#info_login").html("<div class='zoomInDown animated' style='color: green;'>Logado com sucesso!</div>");
$("#body").fadeOut(2000, function(){
$("#body").html(" ");
$(location).attr('href', 'http://painel.baixar-videos.net/home');
});
return;
}
$("#info_login").html("<div class='tada animated' style='color: red;'>"+text+"</div>");


});

}
</script>

<body id="body">
<div class="parallax-window" data-parallax="scroll" data-image-src="http://www.baixar-videos.net/img/Wallpaper/paisagem_escuro.jpg" style="height: 1000px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 150px;">
                <div class="login-panel panel panel-default pulse animated">
                    <div class="panel-heading">
                        <h3 class="panel-title">
						<center><img class="img-responsive fadeInDown animated" src="http://painel.baixar-videos.net/img/logotipos_login.png">
						<hr class="fadeInDown animated" style="border-top: 1.5px solid #777;">
						<div class="fadeInDown animated" id="info_login">Digite suas informações abaixo !</div>
						<center/>
						</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data" action="javascript:ProcessarLogin();" id="form_login" name="form_login" >
                        <?php echo csrf_gerar(); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control fadeInUp animated" placeholder="Usuario" name="usuario" id="usuario" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control fadeInUp animated" placeholder="Senha" name="senha" id="senha" type="password" value="" required>
                                </div>
                                <input value="Entrar >>" type="submit" class="btn btn-lg btn-danger btn-block fadeInUp animated">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
	
    <!-- jQuery -->
    <script src="http://painel.baixar-videos.net/src/vendor/jquery/jquery.min.js"></script>
	<script src="http://painel.baixar-videos.net/src/vendor/jquery/jquery.form.min.js"></script>
	<script src="http://painel.baixar-videos.net/src/vendor/parallax/parallax.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://painel.baixar-videos.net/src/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://painel.baixar-videos.net/src/vendor/metisMenu/metisMenu.min.js"></script>
	
    <!-- Custom Theme JavaScript -->
    <script src="http://painel.baixar-videos.net/src/js/sb-admin-2.js"></script>
	

</body>

</html>
