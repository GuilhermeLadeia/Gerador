<?php

namespace Cnab400\Layout;

class Bradesco11 {

    public function headerArquivo() {
        return [
            1 => [1, 'num'],
            2 => [1, 'num'],
            3 => [7, 'texto'],
            4 => [2, 'num'],
            5 => [15, 'texto'],
            6 => [20, 'num'],
            7 => [30, 'texto'],
            8 => [3, 'num'],
            9 => [15, 'texto'],
            10 => [6, 'num'],
            11 => [8, 'texto'],
            12 => [2, 'texto'],
            13 => [7, 'num'],
            14 => [277, 'texto'],
            15 => [6, 'num'],
        ];
    }

    public function headerArquivoDefault($numRegistro) {
        return [
            1 => 0,
            2 => 1,
            3 => "REMESSA",
            4 => 01,
            5 => "COBRANCA",
            6 => 33,
            8 => 237,
            9 => "Bradesco",
            10 => date("dmy"),
            11 => "Branco",
            12 => "MX",
            14 => "Branco",
            15 => $numRegistro];
    }

    public function headerArquivoValidacao() {
        return [10 => "validaData"
        ];
    }

    public function headerArquivoDinamico() {
        return [];
    }

    public function tipo1() {
        return [
            1 => [1, 'num'],
            2 => [5, 'num'],
            3 => [1, 'texto'],
            4 => [5, 'num'],
            5 => [7, 'num'],
            6 => [1, 'texto'],
            7 => [17, 'texto'],
            8 => [25, 'texto'],
            9 => [3, 'num'],
            10 => [1, 'num'],
            11 => [4, 'num'],
            12 => [11, 'num'],
            13 => [1, 'texto'],
            14 => [7, 'num'],
            15 => [1, 'texto'],
            16 => [1, 'texto'],
            17 => [10, 'texto'],
            18 => [1, 'texto'],
            19 => [1, 'num'],
            20 => [2, 'texto'],
            21 => [2, 'num'],
            22 => [10, 'texto'],
            23 => [6, 'num'],
            24 => [13, 'num'],
            25 => [6, 'num'],
            26 => [5, 'num'],
            27 => [2, 'num'],
            28 => [1, 'texto'],
            29 => [6, 'num'],
            30 => [2, 'num'],
            31 => [2, 'num'],
            32 => [13, 'num'],
            33 => [6, 'num'],
            34 => [13, 'num'],
            35 => [13, 'num'],
            36 => [13, 'num'],
            37 => [2, 'num'],
            38 => [14, 'num'],
            39 => [40, 'texto'],
            40 => [40, 'texto'],
            41 => [12, 'texto'],
            42 => [5, 'num'],
            43 => [3, 'num'],
            44 => [60, 'texto'],
            45 => [6, 'num']
        ];
    }

    public function tipo1Default($numRegistro) {
        return [
            1 => 9,
            2 => 40021,
            3 => "2",
            4 => 6,
            5 => 5,
            6 => "2",
            7 => "",
            17 => "Brancos",
            18 => "R",
            20 => "",
            25 => 000,
            26 => 000,
            28 => "N",
            29 => date("dmy"),
            41 => "",
            44 => "",
            45 => $numRegistro,
        ];
    }

    public function tipo1Validacao() {
        return [10 => "validaCodigoMulta",
            15 => "validaOpcao1e2",
            23 => "validaData",
            27 => "validaEspecieTitulo",
            29 => "validaData",
            33 => "validaData",
            37 => "validaOpcao1e2",
            38 => "validaCpfeCnpj",
            42 => "validaCep",
            43 => "validaSufixoCep",];
    }

    public function tipo1Dinamico() {
        return [];
    }

    public function tipo2() {
        return [
            1 => [1, 'num'],
            2 => [80, 'texto'],
            3 => [80, 'texto'],
            4 => [80, 'texto'],
            5 => [80, 'texto'],
            6 => [6, 'num'],
            7 => [13, 'num'],
            8 => [6, 'num'],
            9 => [13, 'num'],
            10 => [7, 'texto'],
            11 => [3, 'num'],
            12 => [5, 'num'],
            13 => [7, 'num'],
            14 => [1, 'texto'],
            15 => [11, 'num'],
            16 => [1, 'texto'],
            17 => [6, 'num'],
        ];
    }

    public function tipo2Default($numRegistro) {
        return [ 1 => 2,
            2 => "",
            3 => "",
            4 => "",
            5 => "",
            10 => "",
            14 => "",
            17 => $numRegistro,
            ];
    }

    public function tipo2Validacao() {
        return [6 => "validaData",
            8 => "validaData"];
    }

    public function tipo2Dinamico() {
        return [];
    }

    public function tipo3() {
        return [
            1 => [1, 'num'],
            2 => [16, 'texto'],
            3 => [12, 'texto'],
            4 => [1, 'num'],
            5 => [1, 'num'],
            6 => [12, 'texto'],
            7 => [3, 'num'],
            8 => [5, 'num'],
            9 => [1, 'texto'],
            10 => [12, 'num'],
            11 => [1, 'texto'],
            12 => [15, 'num'],
            13 => [40, 'texto'],
            14 => [31, 'texto'],
            15 => [6, 'texto'],
            16 => [3, 'num'],
            17 => [3, 'num'],
            18 => [5, 'num'],
            19 => [1, 'texto'],
            20 => [12, 'num'],
            21 => [1, 'texto'],
            22 => [15, 'num'],
            23 => [40, 'texto'],
            24 => [31, 'texto'],
            25 => [6, 'texto'],
            26 => [3, 'num'],
            27 => [3, 'num'],
            28 => [5, 'num'],
            29 => [1, 'texto'],
            30 => [12, 'num'],
            31 => [1, 'texto'],
            32 => [15, 'num'],
            33 => [40, 'texto'],
            34 => [31, 'texto'],
            35 => [6, 'texto'],
            36 => [3, 'num'],
            37 => [6, 'num'],
        ];
    }

    public function tipo3Default($numRegistro) {
        return [
            1 => 3,
            2 => "",
            3 => "",
            6 => "Brancos",
            7 => 237,
            14 => "Brancos",
            15 => "",
            17 => 237,
            24 => "Brancos",
            25 => "",
            27 => 237,
            34 => "Brancos",
            37 => $numRegistro,
            ];
    }

    public function tipo3Validacao() {
        return [4 => "validaCodigoRateio",
            5 => "validaOpcao1e2"];
    }

    public function tipo3Dinamico() {
        return [];
    }

    public function tipo6() {
        return [
            1 => [1, 'num'],
            2 => [3, 'num'],
            3 => [5, 'num'],
            4 => [7, 'num'],
            5 => [11, 'num'],
            6 => [1, 'texto'],
            7 => [366, 'texto'],
            8 => [6, 'num'],
        ];
    }

    public function tipo6Default($numRegistro) {
        return [
            1 => 6,
            7 => "Brancos",
            8 => $numRegistro,
        ];
    }

    public function tipo6Validacao() {
        return [];
    }

    public function tipo6Dinamico() {
        return [];
    }

    public function tipo7() {
        return [
            1 => [1, 'num'],
            2 => [45, 'texto'],
            3 => [5, 'num'],
            4 => [3, 'num'],
            5 => [20, 'texto'],
            6 => [2, 'texto'],
            7 => [290, 'texto'],
            8 => [3, 'num'],
            9 => [5, 'num'],
            10 => [7, 'num'],
            11 => [1, 'texto'],
            12 => [11, 'num'],
            13 => [1, 'texto'],
            14 => [6, 'num'],
        ];
    }

    public function tipo7Default($numRegistro) {
        return [
            1 => 7,
            14 => $numRegistro,
        ];
    }

    public function tipo7Validacao() {
        return [3 => "validaCep",
            4 => "validaSufixoCep",
            6 => "validaUf"];
    }

    public function tipo7Dinamico() {
        return [];
    }

    public function trailerArquivo() {
        return [
            1 => [1, 'num'],
            2 => [393, 'texto'],
            3 => [6, 'num'],
        ];
    }

    public function trailerArquivoDefault($numRegistro) {
        return [
            1 => 9,
            2 => "Branco",
            3 => $numRegistro,
            ];
    }

    public function trailerArquivoValidacao() {
        return [];
    }

    public function trailerArquivoDinamico() {
        return [];
    }
    
    public function segmentosObrigatorios(){
        return [
            0, 1, 6, 9,
        ];
    }
}
