<?php

namespace Cnab400;

use \Arquivo\ArquivoValidacao;

class ValidacaoCnab400 extends ArquivoValidacao {

    public function validaData($data, $posicao) {
        $pontos = ["\\", "/", "-", "."];
        $dataFormatada = str_replace($pontos, "", $data);

        if (strlen($dataFormatada) != 6) {
            throw new \Exception("Posição " . $posicao . " inválida");
        } else {
            $dia = substr($dataFormatada, 0, 2);
            $mes = substr($dataFormatada, 2, 2);
            $ano = substr($dataFormatada, 4, 2);
            if (strlen($ano) < 2) {
                throw new \Exception("Posição " . $posicao . " inválida");
            } else {
                if (checkdate($mes, $dia, $ano) === false) {
                    throw new \Exception("Posição " . $posicao . " inválida");
                }
            }
        }
    }

    public function validaTamanhoArray($array) {
        foreach ($array as $keySegmento => $segmento) {
            $contagem = 0;
            foreach ($segmento as $key => $valor) {
                $quant = 0;
                $quant = strlen($valor);
                $contagem = $contagem + $quant;
            }
            if (($contagem == 400) === false) {
                throw new \Exception("O Array $keySegmento não possui 400 caracteres");
            }
        }
    }

    public function validaTipoInscricao($opcao, $posicao) {
        $opcoes = [01, 02, 03, 04];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaCodInstrucao($opcao, $posicao) {
        $opcoes = [35, 38, 00];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaNumCarteira($opcao, $posicao) {
        $opcoes = [108, 180, 121, 150, 109, 191,
            104, 188, 147, 112, 115];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaCodCarteira($opcao, $posicao) {
        $opcoes = ["I", "U", "1", "E"];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaZerado($valor, $posicao) {
        if ($valor == 0) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaInstCobranca($opcao, $posicao) {
        $opcoes = ["2", "3", "5", "6", "7", "8", "9",
            "10", "11", "12", "13", "14", "15", "16",
            "17", "18", "19", "20", "21", "22", "23",
            "24", "25", "26", "27", "28", "29", "30",
            "31", "32", "33", "34", "35", "37", "38",
            "39", "40", "42", "43", "44", "45", "46",
            "47", "51", "52", "53", "54", "56", "57",
            "58", "59", "61", "62", "66", "67", "70",
            "71", "72", "73", "74", "75", "78", "79",
            "80", "83", "84", "86", "87", "88", "89",
            "90", "91", "92", "93", "94", "95", "96",
            "97", "98",];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaEspTitulo($opcao, $posicao) {
        $opcoes = ["01", "02", "03", "04", "05", "06",
            "07", "08", "09", "13", "15", "16",
            "17", "18", "99"];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaIdenOcorrencia($opcao, $posicao) {
        $opcoes = [1, 2, 4, 5, 6, 7, 8,
            9, 10, 11, 18, 30, 31, 34,
            35, 37, 38, 47, 49, 66, 67,
            68, 69, 93];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaTipoValor($opcao, $posicao) {
        $opcoes = [1, 2, 3, 4];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaCepInteiro($cep, $posicao) {
        $this->validaTamanho($cep, 8, $posicao);
        if (preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep) === FALSE) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaCodigoMulta($opcao, $posicao) {
        $opcoes = [0, 2];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }


    public function validaCodigoRateio($opcao, $posicao) {
        $opcoes = [1, 2, 3];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }

    public function validaEspecieTitulo($opcao, $posicao) {
        $opcoes = [1, 2, 3, 4, 5,
            10, 11, 12, 31, 32, 99];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception("Posição " . $posicao . " inválida");
        }
    }
}
