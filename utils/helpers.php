<?php

class Helpers {
    
    public static function formatarValorPtBr($valor) {
        return 'R$ ' . number_format($valor, 2, ',', '.');
    }

    public static function formatarPeso($peso) {
        return number_format($peso, 2, ',', '.') . ' kg';
    }
}
