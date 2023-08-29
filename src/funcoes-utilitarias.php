<?php
    function formatarPreco(float $preco):string{
        $precoFormatado = number_format($preco, 2, ",", ".");
        return "R$ ".$precoFormatado;
    };
?>