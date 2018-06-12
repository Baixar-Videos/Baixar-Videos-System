<?php
require '../processar/Logado.php';

if ($_GET['ANO'] == null){$ANO = date("Y");}else{$ANO = $_GET['ANO'];};

$i = 1;
while( $i <= 12 ){

if ($i <= 9){$mes = "0".$i;}else{$mes = "".$i;}

$SAIDA = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes LIKE '%".$ANO."%' && rumo = 'Saida'"));
$TotalSaida = $SAIDA['total_valor'];

$ENTRADA = mysqli_fetch_assoc(mysqli_query ($connect,"SELECT *, SUM(valor) as total_valor  FROM fi_lancamentos WHERE data_mes LIKE '%".$ANO."%' && rumo = 'Entrada'"));
$TotalEntrada = $ENTRADA['total_valor'];

$SaldoAno = $TotalEntrada-$TotalSaida;

$i++;
}






$data_atual = date("Y-m-d",mktime(date("H"),date("i"),date("s"),date("m"),date("d")-30,date("Y")));
$data_fim = date('Y-m-d');

?>
<script>
$.get("http://api.planetsweb.com.br/publicas/analytics/get_visitas_site.php?token=131586465&fim=<?php echo $data_fim;?>&inicio=<?php echo $data_atual;?>", function(data){
$("#ViewMes").html(data);
});
</script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel de Controle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge anima_numeros"><span id="ViewMes">0</span></div>
                                    <div>Visitas ao Site/Aplicativo esse Mês.<br><?php echo date('m');?></div>
                                </div>
                            </div>
                        </div>
                        <a href="https://analytics.google.com/analytics/web/?hl=pt-BR&pli=1#embed/report-home/a50795258w127887045p131586465/" target="_blank">
                            <div class="panel-footer">
                                <span class="pull-left">Ver mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><span>R$ <?php echo number_format($SaldoAno, 2, ',', '.'); ?></span></div>
                                    <div>Saldo de <form method="get" enctype="multipart/form-data"><input value="<?php echo $ANO; ?>" name="ANO" id="ANO" style="border:0;background-color: rgba(255, 255, 255, 0);text-align: right!important;"></form></div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:CarregarPG('re_fluxo_caixa', '');">
                            <div class="panel-footer">
                                <span class="pull-left">Ver mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

<hr>


        </div>
        <!-- /#page-wrapper -->