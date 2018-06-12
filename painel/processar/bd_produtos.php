<?php
require '../processar/Logado.php';
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Produtos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">
<script>

function ProcessarProduto_REMOVER(get_id, get_foto)
{
$.post("http://painel.baixar-videos.net/processar/Produtos.php?modo=REMOVE", {id: get_id, foto: get_foto }, function(data){
$("#Resuntado_Form").html(data);
setTimeout(function() {
CarregarPG('bd_produtos', '');
}, 2000);
});

}
</script>

<div class="col-md-12">
<div class="panel panel-red">
<div class="panel-heading">Banco de dados de produtos</div>
<div class="panel-body">

<div>
<div>
<a align="right" class="btn btn-outline btn-danger pull-right click_interno" href="bd_produtos_add">Adicionar Produto</a>
<br><br>
<div id="Resuntado_Form"></div>
</div>
<hr>
<br>
<script>
    $(document).ready(function() {
        $('#Tabela_Produtos').DataTable({
            responsive: true,
			language: {"url": "http://painel.baixar-videos.net/src/vendor/datatables/Portuguese-Brasil.json"}
        });
    });
</script>
<table width="100%" class="table table-striped table-bordered table-hover" id="Tabela_Produtos">
<thead>
<tr>
<th>ID</th>
<th>Foto</th>
<th>Código de barras</th>
<th>Nome</th>
<th>Classe</th>
<th>Preço</th>
<th>Opções</th>
</tr>
</thead>
<tbody>
<?php
$PRODUTOS = mysqli_query ($connect,"SELECT * barcode,Count(*)>1 FROM produtos");
while($PRODUTO = mysqli_fetch_array($PRODUTOS)){
$V_BarCode = mysqli_fetch_array(mysqli_query($connect, "SELECT barcode, Count(*)>1 FROM `produtos` WHERE barcode = '".$PRODUTO['barcode']."'"));
if ($PRODUTO['barcode'] == $V_BarCode['barcode']){
echo $V_BarCode['barcode']."<br>";
}
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