<?php
require '../processar/Logado.php';
require '/home/plane132/public_html/SitesHospedados/baixar-videos.net/API/painel/anti_csrf.php';
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Configurações</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">

<script>
function ProcessarConfiguracoes()
{
$("input[type=submit]").fadeToggle();
$.post("http://painel.baixar-videos.net/processar/Configuracoes.php",  $("#form_Configuracoes").serialize(), function(data){
$("#Resuntado_Form").html(data);
$("input[type=submit]").fadeToggle();
});

}

</script>

<div class="col-md-12">
<div class="panel panel-red">
<div class="panel-heading">Configurações da conta <?php echo $USER['nome']; ?></div>
<div class="panel-body">

<div class="col-md-4"></div>
<div class="col-md-4">
<div id="Resuntado_Form"></div>
<form role="form" method="post" enctype="multipart/form-data" action="javascript:ProcessarConfiguracoes();" id="form_Configuracoes" name="form_Configuracoes">
<?php echo csrf_gerar(); ?>
<input value="<?php echo $USER['id']; ?>" class="form-control " placeholder="Id" name="id" id="id" type="hidden" required>
<br>
<span>Nome: </span>
<input value="<?php echo $USER['nome']; ?>" class="form-control " placeholder="Nome" name="nome" id="nome" type="text" autofocus required>
<br>
<span>Usuario: </span>
<input value="<?php echo $USER['usuario']; ?>" class="form-control " placeholder="Usuario" name="usuario" id="usuario" type="text" required>
<br>
<span>Senha: </span>
<input class="form-control " placeholder="Senha" name="senha" id="senha" type="password" required>
<br>
<input value="OK >>" type="submit" class="btn btn-lg btn-danger btn-block ">
</form>
</div>


</div>
</div>
</div>


</div>
 
        </div>
        <!-- /#page-wrapper -->