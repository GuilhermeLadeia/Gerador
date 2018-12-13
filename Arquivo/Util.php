<?php

namespace Arquivo;

class Util {

    public function converterMaiusculo($str) {
        $maius = array(
            'a' => 'A',
            'b' => 'B',
            'c' => 'C',
            'd' => 'D',
            'e' => 'E',
            'f' => 'F',
            'g' => 'G',
            'h' => 'H',
            'i' => 'I',
            'j' => 'J',
            'k' => 'K',
            'l' => 'L',
            'm' => 'M',
            'n' => 'N',
            'o' => 'O',
            'p' => 'P',
            'q' => 'Q',
            'r' => 'R',
            's' => 'S',
            't' => 'T',
            'u' => 'U',
            'v' => 'V',
            'w' => 'W',
            'x' => 'X',
            'y' => 'Y',
            'z' => 'Z'
        );
        return strtr($str, $maius);
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
        return str_pad($str, $tamanho, ' ', STR_PAD_RIGHT);
    }

}
