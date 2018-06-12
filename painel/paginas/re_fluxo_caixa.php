<?php
require '../processar/Logado.php';
if ($_GET['ANO'] == null){$ANO = date("Y");}else{$ANO = $_GET['ANO'];};
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Fluxo do caixa de <form method="get" enctype="multipart/form-data"><input value="<?php echo $ANO; ?>" name="ANO" id="ANO" style="border:0;background-color: rgba(255, 255, 255, 0);"></form></h1>
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

  var codigos = divToPrint.innerHTML;
  var codigo = codigos.replace('style="overflow-x:auto;"',"");

  newWin.document.write('<html><head><link href="http://painel.baixar-videos.net/src/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print();"><center><img src="http://painel.baixar-videos.net/img/logotipo_baixarvideos.png" alt="BaixarVídeos" width="70%"><h2>Fluxo do caixa de <?php echo $ANO;?></h2></center><hr>'+codigo+'<hr><center><img src="http://fotos.planetsweb.com.br/painel/logotipo_home.png" alt="PlanetsWEB"></center></body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},500);

}
</script>

<div class="col-md-12">
<div class="panel panel-red">
<div class="panel-heading">
<div class="pull-right">
<a href="javascript:printDiv('Fluxo_Caixa');" class="btn btn-default btn-circle">
<i class="fa fa-print"></i>
</a>
</div>
Fluxo do caixa de <?php echo $ANO; ?></div>
<div class="panel-body" id="Fluxo_Caixa">

<div>
<br><br>

<h3>Saldos</h3>
<div style="overflow-x:auto;">
<table class="table table-bordered">
<thead>
<tr>

<th>Janeiro</th>
<th>Fevereiro</th>
<th>Março</th>
<th>Abril</th>
<th>Maio</th>
<th>Junho</th>
<th>Julho</th>
<th>Agosto</th>
<th>Setembro</th>
<th>Outubro</th>
<th>Novembro</th>
<th>Dezembro</th>
<th>TOTAL</th>

</tr>
</thead>
<tbody>
<tr>

<?php

$i = 1;
while( $i <= 12 ){

if ($i <= 9){$mes = "0".$i;}else{$mes = "".$i;}

$SAIDA = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes = '".$ANO."-".$mes."' && rumo = 'Saida'"));
$TotalSaida = $SAIDA['total_valor'];

$ENTRADA = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes = '".$ANO."-".$mes."' && rumo = 'Entrada'"));
$TotalEntrada = $ENTRADA['total_valor'];

$Total = $TotalEntrada-$TotalSaida;

echo '<td>R$ '.number_format($Total, 2, ',', '.').'</td>';

$i++;
}

$T_SAIDA = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes LIKE '%".$ANO."%' && rumo = 'Saida'"));
$T_ENTRADA = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes LIKE '%".$ANO."%' && rumo = 'Entrada'"));
$T_TOTAL = $T_ENTRADA['total_valor']-$T_SAIDA['total_valor'];
echo '<td>R$ '.number_format($T_TOTAL, 2, ',', '.').'</td>';
?>
</tr>
</tbody>
</table>
</div>
<br>

<h3>Entrada</h3>
<div style="overflow-x:auto">
<table class="table table-bordered">
<thead>
<tr>

<th>Janeiro</th>
<th>Fevereiro</th>
<th>Março</th>
<th>Abril</th>
<th>Maio</th>
<th>Junho</th>
<th>Julho</th>
<th>Agosto</th>
<th>Setembro</th>
<th>Outubro</th>
<th>Novembro</th>
<th>Dezembro</th>
<th>TOTAL</th>

</tr>
</thead>
<tbody>
<tr>

<?php
$i = 1;
while( $i <= 12 ){

if ($i <= 9){$mes = "0".$i;}else{$mes = "".$i;}

$ENTRADA = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes = '".$ANO."-".$mes."' && rumo = 'Entrada'"));
$TotalEntrada = 0+$ENTRADA['total_valor'];

echo '<td>R$ '.number_format($TotalEntrada, 2, ',', '.').'</td>';

$i++;
}

$T_TOTAL = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes LIKE '%".$ANO."%' && rumo = 'Entrada'"));
echo '<td>R$ '.number_format($T_TOTAL['total_valor'], 2, ',', '.').'</td>';
?>
</tr>
</tbody>
</table>
</div>
<br>

<h3>Saida</h3>
<div style="overflow-x:auto">
<table class="table table-bordered">
<thead>
<tr>

<th>Janeiro</th>
<th>Fevereiro</th>
<th>Março</th>
<th>Abril</th>
<th>Maio</th>
<th>Junho</th>
<th>Julho</th>
<th>Agosto</th>
<th>Setembro</th>
<th>Outubro</th>
<th>Novembro</th>
<th>Dezembro</th>
<th>TOTAL</th>

</tr>
</thead>
<tbody>
<tr>

<?php
$i = 1;
while( $i <= 12 ){

if ($i <= 9){$mes = "0".$i;}else{$mes = "".$i;}

$SAIDA = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes = '".$ANO."-".$mes."' && rumo = 'Saida'"));
$TotalSaida = 0+$SAIDA['total_valor'];

echo '<td>R$ '.number_format($TotalSaida, 2, ',', '.').'</td>';

$i++;
}

$T_TOTAL = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes LIKE '%".$ANO."%' && rumo = 'Saida'"));
echo '<td>R$ '.number_format($T_TOTAL['total_valor'], 2, ',', '.').'</td>';
?>
</tr>
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