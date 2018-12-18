<?php

namespace Agz;

use \Arquivo\ArquivoValidacao;

class ValidacaoAgz extends ArquivoValidacao{
    
    public function validaFormaPagamento($opcao, $posicao) {
        $opcoes = ["1", "2", "3", "4", "5"];
        if(array_search(trim($opcao), $opcoes)===false){
       throw new \Exception("Posição ".$posicao." inválida, informado: ".$opcao);
        }
    }
}
