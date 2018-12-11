<?php
namespace Gerador\Arquivo;

class Util {
    
    public function converterMaiusculo($str) {
        return srttoupper($str);
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
        return strtr($str, $acentos);
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
        return strtr($str, $carac);
    }
    
    public function adicionarZerosEsq($str, $tamanho) {
        return str_pad($str, $tamanho, '0', STR_PAD_LEFT);
    }
    
    public function adicionarEspacosDir($str, $tamanho) {
        return str_pad($string, $tamanho, ' ', STR_PAD_RIGHT);
    }
}
