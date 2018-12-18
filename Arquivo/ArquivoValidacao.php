<?php

namespace Arquivo;

class ArquivoValidacao {

    public function validaData($data, $posicao) {
        $pontos = ["\\", "/", "-", "."];
        $dataFormatada = str_replace($pontos, "", $data);

        if (strlen($dataFormatada) != 8) {
            throw new \Exception("Posição " . $posicao . " inválida");
        } else {
            $ano = substr($dataFormatada, 0, 4);
            $mes = substr($dataFormatada, 4, 2);
            $dia = substr($dataFormatada, 6, 2);
            if (strlen($ano) < 4) {
                throw new \Exception("Posição " . $posicao . " inválida");
            } else {
                if (checkdate( $mes, $dia, $ano)===false) {
                    throw new \Exception("Posição " . $posicao . " inválida");
                }
            }
        }
    }

    public function validaCpf($cpf, $posicao) {
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
        return true;
    }

    public function validaCnpj($cnpj, $posicao) {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
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

    public function validaCep($cep, $posicao) {
//        $cep = trim($cep);
//        $avaliaCep = ereg("^[0-9]{5}-[0-9]{3}$", $cep);
//        if (!$avaliaCep) {
//            throw new \Exception("Posição " . $posicao . " inválida");
//        }
    }

    public function validaUf($opcao, $posicao) {
        $opcoes = ["AC", "AL", "AM", "AP",
            "BA", "CE", "DF", "ES",
            "GO", "MA", "MG", "MS",
            "MT", "PA", "PB", "PE",
            "PI", "PR", "RJ", "RN",
            "RO", "RR", "RS", "SC",
            "SE", "SP", "TO"];
        if (array_search($opcao, $opcoes)===false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaLimiteCarac($valor, $tamanho, $posicao) {
        $contString = strlen($valor);
        if ($contString > $tamanho) {
            return substr($valor, 0, $tamanho);
        }
    }

}
