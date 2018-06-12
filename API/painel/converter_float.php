<?php

   function moedaToFloat($valor) {
        if ($valor === "") {
            $valor = 0;
        } else {
            $valor = str_replace(".", "",$valor);
            $valor = str_replace(",", ".",$valor);
        }
        return (float) $valor;
    }
?>