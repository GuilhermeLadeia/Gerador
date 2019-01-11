<?php

namespace Cnab240;

use \Arquivo\ArquivoValidacao;

class ValidacaoCnab240 extends ArquivoValidacao {

    public function validaOpcao1e2($opcao, $posicao) {
        $opcoes = [1, 2];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaMovimentoRemessa($opcao, $posicao) {
        $opcoes = ["01", "02", "06", "09", "10", "11", "31"];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaIdTitulo($opcao, $posicao) {
        $opcoes = ["A", "N"];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaCodigo($opcao, $posicao) {
        $opcoes = [0, 1, 2];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaEspecieTitulo($opcao, $posicao) {
        $opcoes = [1, 2, 3, 4, 5,
            6, 7, 8, 9, 10,
            11, 12, 13, 14, 15,
            16, 17, 18, 19, 20,
            21, 22, 23, 24, 25, 99];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaCodigoProtesto($opcao, $posicao) {
        $opcoes = [1, 2, 3, 9];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function codigoMoeda($opcao, $posicao) {
        $opcoes = [2, 9];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }
    
//    public function validaOpcoes($array){
//        $this->validaCpfeCnpj($array[0][4], $array[0][5], 6);
//        $this->validaCpfeCnpj($array[1][8], $array[1][9], 10);
//        $this->validaCpfeCnpj($array[3][7], $array[3][8], 9);
//        $this->validaCpfeCnpj($array[3][16], $array[3][17], 18);
//        $this->validaJuroseDesc($array[2][26], $array[2][27], $array[2][28], "28 e 29");
//        $this->validaJuroseDesc($array[2][29], $array[2][30], $array[2][31], "31 e 32");
//        $this->validaJuroseDesc($array[4][7], $array[4][8], $array[4][9], "9 e 10");
//        $this->validaJuroseDesc($array[4][10], $array[4][11], $array[4][12], "12 e 13");
//        $this->validaJuroseDesc($array[4][13], $array[4][14], $array[4][15], "15 e 16");
//        $this->validaCodigoProteMovi($array[2][6], $array[2][35], "36");
//    }
//    
//    public function validaCpfeCnpj($tipo, $num, $posicao) {
//        $tamanho = strlen($num);
//        if($tipo == 1){
//            if(($tamanho == 11)=== false){
//                throw new \Exception("Posição " . $posicao . " inválida");
//            }
//        }else{
//            if(($tamanho == 14||15) === false){
//                throw new \Exception("Posição " . $posicao . " inválida");
//            }
//        }
//    }
//    
//    public function validaJuroseDesc($tipo, $data, $valor, $posicao){
//        if($tipo==0){
//            if(($data==null)and(($valor==null))){
//                throw new \Exception("Posição " . $posicao . " inválida");
//            }
//        }elseif($tipo==1||2){
//            if(empty($data)and(empty($valor))){
//                throw new \Exception("Posição " . $posicao . " inválida");
//            }
//        }
//    }
//    
//    public function validaCodigoProteMovi($codMovi, $codProt, $posicao){
//        if($codProt==9){
//            if(($codMovi==31)===false){
//                throw new \Exception("Posição " . $posicao . " inválida");
//            }
//        }
//    }
    
    public function validaCpfeCnpj($valor, $posicao, $array) {
        $tamanho = strlen($valor);
        if($array[$posicao-2] == 1){
            $this->validaCpf($valor, $posicao);
        }else{
            $this->validaCnpj($valor, $posicao);
        }
    }
    
    public function validaJuroseDescData($data, $posicao, $array){
        if($array[$posicao-2]==0){
            if(($data==0)===false){          
                throw new \Exception("Posição " . $posicao . " inválida");
            }
        }else{
            if($data==0){
                throw new \Exception("Posição " . $posicao . " inválida");
            }
        }
    }
    
    public function validaJurosDescValor($valor, $posicao, $array) {
        if($array[$posicao-2]==0){
            if(($valor==0)===false){
                throw new \Exception("Posição " . $posicao . " inválida");
            }
        }else{
            if(($valor==0)){
                throw new \Exception("Posição " . $posicao . " inválida");
            }
        }
    }
    
    public function validaCodigoProteMovi($codProt, $posicao, $array){
        if($codProt==9){
            if(($array[6]==31)===false){
                throw new \Exception("Posição " . $posicao . " inválida");
            }
        }
    }
    
    public function validaTamanhoArray($array){
        foreach ($array as $keySegmento => $segmento) {
            $contagem = 0;
            foreach ($segmento as $key => $valor) {
                $quant = 0;
                $quant = strlen($valor);
                $contagem = $contagem + $quant;
            }
            if(($contagem==240)===false){
                throw new \Exception("O segmento $keySegmento não possui 240 caracteres");
            }
        }
    }
    
    public function validaData($data, $posicao) {
        $pontos = ["\\", "/", "-", "."];
        $dataFormatada = str_replace($pontos, "", $data);

        if (strlen($dataFormatada) != 8) {
            throw new \Exception("Posição " . $posicao . " inválida");
        } else {
            $dia = substr($dataFormatada, 0, 2);
            $mes = substr($dataFormatada, 2, 2);
            $ano = substr($dataFormatada, 4, 4);
            if (strlen($ano) < 4) {
                throw new \Exception("Posição " . $posicao . " inválida");
            } else {
                if (checkdate($mes, $dia, $ano) === false) {
                    throw new \Exception("Posição " . $posicao . " inválida");
                }
            }
        }
    }
}
