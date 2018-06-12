<?php
require '../processar/Logado.php';
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Folha de pontos de <?php echo date("Y"); ?></h1>
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

  newWin.document.write('<html><head><link href="http://painel.baixar-videos.net/src/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print();"><center><img src="http://painel.baixar-videos.net/img/logotipo_baixarvideos.png" alt="BaixarVídeos" width="70%"><h2>Folha de pontos de <?php echo date('Y');?></h2></center><hr><table width="100%" class="table table-striped table-bordered table-hover">'+divToPrint.innerHTML+'</table><hr><center><img src="http://fotos.planetsweb.com.br/painel/logotipo_home.png" alt="PlanetsWEB"></center></body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},500);

}
</script>

<div class="col-md-12">
<div class="panel panel-red">
<div class="panel-heading">
<div class="pull-right">
<a href="javascript:printDiv('Tabela_tempo_trabalho');" class="btn btn-default btn-circle">
<i class="fa fa-print"></i>
</a>
</div>
Folha de pontos de <?php echo date("Y"); ?></div>
<div class="panel-body">

<div>
<br><br>

<script>
$(document).ready(function() {
    $('#Tabela_tempo_trabalho').DataTable({
        responsive: true,
        language: {"url": "http://painel.baixar-videos.net/src/vendor/datatables/Portuguese-Brasil.json"}
    });
});
</script>
<table width="100%" class="table table-striped table-bordered table-hover" id="Tabela_tempo_trabalho">
<thead>
<tr>
<th>Data</th>
<th>Nome - Usuario</th>
<th>Horas trabalhadas</th>
<th>Entrada</th>
<th>Saida</th>
<th>Intervalo</th>
</tr>
</thead>
<tbody>
<?php
$Fluxos = mysqli_query ($connect,"SELECT * FROM fu_ponto WHERE data_mes LIKE '%".date("Y")."%'  ");
while($Fluxo = mysqli_fetch_array($Fluxos)){
$F_User = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM usuarios WHERE id = '".$Fluxo['id']."'"));
echo '
<tr>
<td>'.$Fluxo['data'].'</td>
<td>'.$F_User['nome'].' - '.$F_User['usuario'].'</td>
<td>'.$Fluxo['horas_trabalhadas'].'</td>
<td>'.$Fluxo['entrada'].'</td>
<td>'.$Fluxo['saida'].'</td>
<td>'.$Fluxo['intervalo'].'</td>
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