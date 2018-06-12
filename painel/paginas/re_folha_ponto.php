<?php
require '../processar/Logado.php';
if ($_GET['ANO'] == null){$ANO = date("Y");}else{$ANO = $_GET['ANO'];};
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Folha de pontos de <form method="get" enctype="multipart/form-data"><input value="<?php echo $ANO; ?>" name="ANO" id="ANO" style="border:0;background-color: rgba(255, 255, 255, 0);"></form></h1>
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

  newWin.document.write('<html><head><link href="http://painel.baixar-videos.net/src/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print();"><center><img src="http://painel.baixar-videos.net/img/logotipo_baixarvideos.png" alt="BaixarVídeos" width="70%"><h2>Folha de pontos de <?php echo $ANO;?></h2></center><hr><table width="100%" class="table table-striped table-bordered table-hover">'+divToPrint.innerHTML+'</table><hr><center><img src="http://fotos.planetsweb.com.br/painel/logotipo_home.png" alt="PlanetsWEB"></center></body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},500);

}
</script>

<div class="col-md-12">
<div class="panel panel-red">
<div class="panel-heading">
<div class="pull-right">
<a href="javascript:printDiv('Tabela_re_folha_ponto');" class="btn btn-default btn-circle">
<i class="fa fa-print"></i>
</a>
</div>
Folha de pontos de <?php echo $ANO; ?></div>
<div class="panel-body">

<div>
<br><br>

<script>
$(document).ready(function() {
    $('#Tabela_re_folha_ponto').DataTable({
        responsive: true,
        language: {"url": "http://painel.baixar-videos.net/src/vendor/datatables/Portuguese-Brasil.json"}
    });
});
</script>
<table width="100%" class="table table-striped table-bordered table-hover" id="Tabela_re_folha_ponto">
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
$Fluxos = mysqli_query ($connect,"SELECT * FROM fu_ponto WHERE data_mes LIKE '%".$ANO."%'  ");
while($Fluxo = mysqli_fetch_array($Fluxos)){
$F_User = mysqli_fetch_array(mysqli_query($connect, "SELECT id,nome,usuario FROM usuarios WHERE id = '".$Fluxo['user_id']."'"));
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