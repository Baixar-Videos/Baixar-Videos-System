<?php
require '../processar/Logado.php';
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Lançamentos </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">


<div class="col-md-12">
<div class="panel panel-red">
<div class="panel-heading">Lançamentos</div>
<div class="panel-body">

<div>
<div>
<a align="right" class="btn btn-outline btn-danger pull-right click_interno" href="fi_lancamentos_add">Adicionar Lançamentos de um dia</a>
<br><div id="Resuntado_Form"></div><br>
</div>
<hr>
<br>
<script>
    $(document).ready(function() {
        $('#Tabela_Lancamentos').DataTable({
            responsive: true,
			language: {"url": "http://painel.baixar-videos.net/src/vendor/datatables/Portuguese-Brasil.json"}
        });
    });

function REMOVER(ID, p_foto){
$.post("http://painel.baixar-videos.net/processar/fi_lancamentos.php?modo=REMOVE",  { id: ID }, function(data){
    $("#Resuntado_Form").html(data);
if (data.includes("OK:")){
$('#REMOVER'+ID).modal('hide');
delay = setTimeout(function(){CarregarPG("fi_lancamentos", "");clearTimeout(delay);$('#REMOVER'+ID).remove();}, 3000);
}else{
delay = setTimeout(function(){clearTimeout(delay);$('#REMOVER'+ID).modal('hide');}, 3000);
}
});
};
function REMOVER_MODAL(ID){
$("body").append('<div id="REMOVER'+ID+'" class="modal fade bs-example-modal-lg" tabindex="-1"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><a href="javascript:$(\'#REMOVER'+ID+'\').modal(\'hide\')" class="close"><span class="fa fa-times"></span></a></div><div class="modal-body"><div class="text-center"><h2>'+ID+'</h2><br><h3>Apagar isso??</h3><div class="xs-mt-50"><a href="javascript:$(\'#REMOVER'+ID+'\').modal(\'hide\');" class="btn btn-rounded btn-space btn-danger"><i class="icon icon-left mdi mdi-alert-circle"></i> Não</a> <a class="btn btn-rounded btn-space btn-success" href="javascript:REMOVER(\''+ID+'\');"><i class="icon icon-left mdi mdi-check"></i> Sim</a></div></div></div></div></div></div>');
$("#REMOVER"+ID+"").modal('show');
};

</script>
<table width="100%" class="table table-striped table-bordered table-hover" id="Tabela_Lancamentos">
<thead>
<tr>
<th>Data</th>
<th>Status</th>
<th>Valor</th>
<th>Categoria/Descricao</th>
<th>Cliente ou Fornecedor</th>
<th>Entrada ou saida</th>
<th>Opções</th>
</tr>
</thead>
<tbody>
<?php
$Fluxos = mysqli_query ($connect,"SELECT * FROM fi_lancamentos");
while($Fluxo = mysqli_fetch_array($Fluxos)){
echo '
<tr>
<td>'.$Fluxo['data'].'</td>
<td>'.$Fluxo['status'].'</td>
<td>R$ '.number_format($Fluxo['valor'], 2, ',', '.').'</td>
<td>'.$Fluxo['categoria'].' / '.$Fluxo['descricao'].'</td>
<td>'.$Fluxo['pagador'].'</td>
<td>'.$Fluxo['rumo'].'</td>
<td><center>
<a onclick="javascript:CarregarPG(\'fi_lancamentos_edit\', \'?id='.$Fluxo['id'].'\');" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a>
<a onclick="javascript:REMOVER_MODAL(\''.$Fluxo['id'].'\');" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
</center></td>
</tr>
';
}
?>
</tbody>
</table>
</div>


</div>
</div>
</div>


</div>
 
</div>
<?php require '../processar/Click_interno.php'; ?>