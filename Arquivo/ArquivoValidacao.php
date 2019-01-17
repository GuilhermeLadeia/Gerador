<?php

namespace Arquivo;

class ArquivoValidacao {

    public function validaCpf($cpf, $posicao) {
        if(strlen($cpf)==14||15){
            $cpf = substr($cpf,3,11);
        }
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);
        if (strlen($cpf) != 11) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                throw new \Exception("Posição " . $posicao . " inválida");
            }
        }
    }

    public function validaCnpj($cnpj, $posicao) {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        if (strlen($cnpj) == 15) {
            $cnpj = substr($cnpj,1,14);
        }
        if (strlen($cnpj) != 14) {
                throw new \Exception("Posição " . $posicao . " inválida");
        }
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
    }

    public function validaCodigoBarra($codigoBarra, $posicao) {
        if (strlen($codigoBarra) != 44) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }
    
    public function validaIdTitulo($opcao, $posicao) {
        $opcoes = ["A", "N"];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaTamanho($string, $tamanho, $posicao) {
        $string = trim($string);
        if (strlen($string) != $tamanho) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaCep($cep, $posicao) {
        $this->validaTamanho($cep, 5, $posicao);
        if (preg_match('/[0-9]{5,5}?$/', $cep) === FALSE) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaSufixoCep($sufixo, $posicao) {
        $this->validaTamanho($sufixo, 3, $posicao);
        if (preg_match('/[0-9]{3}?$/', $sufixo) === FALSE) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaUf($opcao, $posicao) {
        $opcoes = ["AC", "AL", "AM", "AP",
            "BA", "CE", "DF", "ES",
            "GO", "MA", "MG", "MS",
            "MT", "PA", "PB", "PE",
            "PI", "PR", "RJ", "RN",
            "RO", "RR", "RS", "SC",
            "SE", "SP", "TO"];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }
    
    public function validaOpcao1e2($opcao, $posicao) {
        $opcoes = [1, 2];
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
    
    public function validaCpfeCnpj($valor, $posicao, $array) {
        if($array[$posicao-2] == 1){
            $this->validaCpf($valor, $posicao);
        }else{
            $this->validaCnpj($valor, $posicao);
        }
    }
    
    public function validaVariavel($valor, $key, $arrayDefault, $arrayDinamico){
        if($valor=== "" or $valor === null){
            if(isset($arrayDefault[$key])){
                $valor = $arrayDefault[$key];
                return $valor;
            }else{
                if(isset($arrayDinamico[$key])){
                    $valor = $arrayDinamico[$key];
                    return $valor;
                }else{
                    throw new \Exception("Posição " . $key . " não preenchida");
                }
            }
        }else{
            return $valor;
        }
    }
    
    public function validaSegmentosObrigatorios($segmento, $tipo, $segObrig){
        foreach ($segObrig  as $tipoObrig) {
            if($tipoObrig==$tipo){
                if(empty($segmento)){
                    throw new \Exception("O Segmento " . $tipo . " não foi preenchido");
                }
            }
        }
    }
}
