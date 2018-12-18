<?php

namespace Cnab240;

use \Arquivo\ArquivoValidacao;

class ValidacaoCnab240 extends ArquivoValidacao{
    
    public function validaOpcao1e2($opcao, $posicao) {
        $opcoes = [1, 2];
        if(array_search($opcao, $opcoes)===false){
            throw new \Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaMovimentoRemessa($opcao, $posicao) {
        $opcoes = ["01", "02", "06", "09", "10", "11", "31"];
        if(array_search($opcao, $opcoes)===false){
            throw new \Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaIdTitulo($opcao, $posicao) {
        $opcoes = ["A", "N"];
        if(array_search($opcao, $opcoes)===false){
            throw new \Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaCodigo($opcao, $posicao) {
        $opcoes = [0, 1, 2];
        if(array_search($opcao, $opcoes)===false){
            throw new \Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaEspecieTitulo($opcao, $posicao) {
        $opcoes = [1, 2, 3, 4, 5,
                   6, 7, 8, 9, 10,
                   11, 12, 13, 14, 15,
                   16, 17, 18, 19, 20,
                   21, 22, 23, 24, 25, 99];
        if(array_search($opcao, $opcoes)===false){
            throw new \Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaCodigoProtesto($opcao, $posicao) {
        $opcoes = [1, 2, 3, 9];
        if(array_search($opcao, $opcoes)===false){
            throw new \Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function codigoMoeda($opcao, $posicao) {
        $opcoes = [2, 9];
        if(array_search($opcao, $opcoes)===false){
            throw new \Exception("Posição ".$posicao." inválida");
        }
    }
}
