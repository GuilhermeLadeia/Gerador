<?php

namespace Arquivo;

class ArquivoValidacao {

    function validarData($data, $posicao, $separador) {
        $valores = explode($separador, $data);

        if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) {
            return true;
        }
        if (!validarData($data)) {
            throw new Exception("Posição ".$posicao." inválida");
        }
    }

    public function validaCpf($cpf) {
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);
        if (strlen($cpf) != 11) {
            throw new Exception("CPF inválido");
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new Exception("CPF inválido");
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                throw new Exception("CPF inválido");
            }
        }
        return true;
    }

    public function validaCnpj($cnpj) {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        if (strlen($cnpj) != 14) {
            throw new Exception("CNPJ inválido");
        }
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)) {
            throw new Exception("CNPJ inválido");
        }
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    public function validaCodigoBarra($codigoBarra) {
        if (strlen($$codigoBarra) != 44) {
            throw new Exception("Código de Barra Inválido");
        }
    }

    function validaCep($cep) {
        $cep = trim($cep);
        $avaliaCep = ereg("^[0-9]{5}-[0-9]{3}$", $cep);
        if (!$avaliaCep) {
            throw new Exception("CEP inválido");
        }
    }

    private function validaUf($opcao) {
        $opcoes = ["AC", "AL", "AM", "AP",
            "BA", "CE", "DF", "ES",
            "GO", "MA", "MG", "MS",
            "MT", "PA", "PB", "PE",
            "PI", "PR", "RJ", "RN",
            "RO", "RR", "RS", "SC",
            "SE", "SP", "TO"];
        if ($opcao !== array_search($opcao, $opcoes)) {
            throw new Exception("UF inválida");
        }
    }

}
