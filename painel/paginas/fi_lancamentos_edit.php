<?php
require '../processar/Logado.php';
$fi_lancamentos = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM fi_lancamentos WHERE id = '".anti_inje($_GET['id'])."'"));
?>
<script src="http://painel.baixar-videos.net/src/vendor/jquery.maskedinput/main.js" type="text/javascript"></script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Editar Lançamento</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">
<script>
function ProcessarLancamento_EDIT()
{
$("input[type=submit]").fadeToggle();
$.post("http://painel.baixar-videos.net/processar/fi_lancamentos.php?modo=EDIT",  $("#form_lancamentos_EDIT").serialize(), function(data){
$("#Resuntado_Form").html(data);
if (data.includes("OK:")){
delay = setTimeout(function(){CarregarPG("fi_lancamentos", "");clearTimeout(delay);$("input[type=submit]").fadeToggle();}, 3000);
}else{
delay = setTimeout(function(){clearTimeout(delay);$("input[type=submit]").fadeToggle();}, 3000);
}
});

}

</script>

<div class="col-md-12">
<div class="panel panel-red">
<div class="panel-heading">Editar Lançamento</div>
<div class="panel-body">

<div class="col-md-4"></div>
<div class="col-md-4">
<div id="Resuntado_Form"></div>
<form role="form" method="post" enctype="multipart/form-data" action="javascript:ProcessarLancamento_EDIT();" id="form_lancamentos_EDIT" name="form_lancamentos_EDIT" >
<br>
<input value="<?php echo $fi_lancamentos['id']; ?>" name="id" id="id" type="hidden">

<span>Data: </span>
<input  value="<?php echo $fi_lancamentos['data']; ?>" class="form-control " placeholder="Data" name="data" id="data" type="date" autofocus required>
<br>
<span>Status </span>
<select value="<?php echo $fi_lancamentos['status']; ?>" style="width: 100%;" class="form-control" name="status" id="status" required>
<option value="Não_Pago">Não_Pago</option>
<option value="Pago">Pago</option>
<option value="Atrasado">Atrasado</option>
</select>
<br>
<span>Valor </span>
<input value="<?php echo $fi_lancamentos['valor']; ?>" class="form-control " name="valor" id="valor" type="text" required>
<br>
<span>Categoria </span>
<select value="<?php echo $fi_lancamentos['categoria']; ?>" style="width: 100%;" class="form-control" name="categoria" id="categoria" required>
<option value="Outros">Outros</option>
<option value="Dívidas">Dívidas</option>
<option value="Impostos">Impostos</option>
<option value="Taxas">Taxas</option>
<option value="Compras">Compras</option>
<option value="Ganhos">Ganhos</option>
<option value="Salários">Salários</option>
<option value="Adsense">Adsense</option>
<option value="Hospedagem">Hospedagem</option>
<option value="Servidores">Servidores</option>
<option value="Dominio">Dominio</option>
<option value="Funcionarios_Pagamento">Funcionarios_Pagamento</option>
</select>
<br>
<span>Descricao </span>
<input value="<?php echo $fi_lancamentos['descricao']; ?>" class="form-control " name="descricao" id="descricao" type="text" required>
<br>
<span>Nome do Cliente ou Fornecedor </span>
<input value="<?php echo $fi_lancamentos['pagador']; ?>" class="form-control " name="pagador" id="pagador" type="text" required>
<br>
<span>Entrada ou saida </span>
<select value="<?php echo $fi_lancamentos['rumo']; ?>" style="width: 100%;" class="form-control" name="rumo" id="rumo" required>
<option value="Entrada">Entrada</option>
<option value="Saida">Saida</option>
</select>
<br>
<input value="OK >>" type="submit" class="btn btn-lg btn-danger btn-block ">

</form>
</div>


</div>
</div>
</div>


</div>
 
        </div>