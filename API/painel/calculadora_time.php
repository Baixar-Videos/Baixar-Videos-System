<?php
function calcular_tempo($entrada, $saida)
{
//Calcula o tempo de upload
$hora1 = explode(":",$entrada);
$hora2 = explode(":",$saida);
$acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
$acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
$resultado = $acumulador2 - $acumulador1;
$hora_ponto = floor($resultado / 3600);
$resultado = $resultado - ($hora_ponto * 3600);
$min_ponto = floor($resultado / 60);
$resultado = $resultado - ($min_ponto * 60);
$secs_ponto = $resultado;
//Grava na variável resultado final
$tempo = $hora_ponto.":".$min_ponto.":".$secs_ponto;
return $tempo;
}
?>