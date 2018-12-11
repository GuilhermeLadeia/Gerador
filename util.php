<?php

class util {
    public function converterMaiusculo($str) {
        $str = srttoupper($str);
    }
    
    public function removerAcentos($str) {
        $acentos = array(
            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            'Á' => 'A',
            'À' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'É' => 'E',
            'Ê' => 'E',
            'Í' => 'I',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ú' => 'U',
            'Ü' => 'U',
            'Ç' => 'C'
        );
        $str = strtr($str, $acentos);
    }
    
    public function removerCaracEspeciais($str) {
        $carac = array(
            '!' => '',
            '@' => '',
            '#' => '',
            '$' => '',
            '%' => '',
            '&' => '',
            '*' => '',
            'ª' => '',
            'º' => '',
            '|' => '',
            '/' => '',
            '?' => '',
            '"' => '',
            '´' => '',
            '`' => '',
            '^' => '',
            '~' => '',
            '_' => '',
            '-' => '',
            '=' => '',
            '+' => '',
            '§' => ''
        );
        $str = strtr($str, $carac);
    }
    
    public function adicionarZerosEsq($str) {
        $str = str_pad($str, 3, '0', STR_PAD_LEFT);
    }
    
    public function adicionarEspacosDir($str) {
        $str = str_pad($string, 9, ' ', STR_PAD_RIGHT);
    }
}
