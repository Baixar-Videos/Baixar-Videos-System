<?php
require '../processar/Logado.php';
if ($_GET['ANO'] == null){$ANO = date("Y");}else{$ANO = $_GET['ANO'];};
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Folha de pagamento de <form method="get" enctype="multipart/form-data"><input value="<?php echo $ANO; ?>" name="ANO" id="ANO" style="border:0;background-color: rgba(255, 255, 255, 0);"></form></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">

<script>
function printDiv(name_div) 
{
  var divToPrint=document.getElementById(name_div);

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><head><link href="http://painel.baixar-videos.net/src/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print();"><center><img src="http://painel.baixar-videos.net/img/logotipo_baixarvideos.png" alt="BaixarVídeos" width="70%"><h2>Folha de pagamento de <?php echo $ANO;?></h2></center><hr><table width="100%" class="table table-striped table-bordered table-hover">'+divToPrint.innerHTML+'</table><hr><center><img src="http://fotos.planetsweb.com.br/painel/logotipo_home.png" alt="PlanetsWEB"></center></body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},500);

}
</script>

<div class="col-md-12">
<div class="panel panel-red">
<div class="panel-heading">
<div class="pull-right">
<a href="javascript:printDiv('Tabela_folha_pagamentos');" class="btn btn-default btn-circle">
<i class="fa fa-print"></i>
</a>
</div>
Folha de pagamento de <?php echo $ANO; ?></div>
<div class="panel-body">

<div>
<br><br>

<script>
$(document).ready(function() {
    $('#Tabela_folha_pagamentos').DataTable({
        responsive: true,
        language: {"url": "http://painel.baixar-videos.net/src/vendor/datatables/Portuguese-Brasil.json"}
    });
});
</script>
<table width="100%" class="table table-striped table-bordered table-hover" id="Tabela_folha_pagamentos">
<thead>
<tr>
<th>Data</th>
<th>Status</th>
<th>Valor</th>
<th>Categoria/Descricao</th>
<th>Cliente ou Fornecedor</th>
</tr>
</thead>
<tbody>
<?php
$Fluxos = mysqli_query ($connect,"SELECT * FROM fi_lancamentos WHERE rumo = 'Saida' && categoria = 'Funcionarios_Pagamento' && data_mes LIKE '%".$ANO."%'  ");
while($Fluxo = mysqli_fetch_array($Fluxos)){
echo '
<tr>
<td>'.$Fluxo['data'].'</td>
<td>'.$Fluxo['status'].'</td>
<td>R$ '.number_format($Fluxo['valor'], 2, ',', '.').'</td>
<td>'.$Fluxo['categoria'].' / '.$Fluxo['descricao'].'</td>
<td>'.$Fluxo['pagador'].'</td>
</tr>
';
}
?>
</tbody>
</table>
</div>
<br><br>

</div>


</div>
</div>
</div>


</div>
 
</div>
<?php require '../processar/Click_interno.php'; ?>