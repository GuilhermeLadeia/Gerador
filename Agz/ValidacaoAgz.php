<?php

namespace Agz;

use \Arquivo\ArquivoValidacao;

class ValidacaoAgz extends ArquivoValidacao{
    
    public function validaFormaPagamento($opcao, $posicao) {
        $opcoes = ["1", "2", "3", "4", "5"];
        if($opcao !== array_search($opcao, $opcoes)){
       throw new Exception("Posição ".$posicao." inválida");
        }
    }
}
