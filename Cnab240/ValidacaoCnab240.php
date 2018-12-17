<?php

namespace Cnab240;

use \Arquivo\ArquivoValidacao;

class ValidacaoCnab240 extends ArquivoValidacao{
    
    public function validaOpcao1e2($opcao, $posicao) {
        if($opcao != "1"||$opcao != "2"){
            throw new Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaMovimentoRemessa($opcao, $posicao) {
        $opcoes = ["01", "02", "06", "09", "10", "11", "31"];
        if($opcao !== array_search($opcao, $opcoes)){
            throw new Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaIdTitulo($opcao, $posicao) {
        if($opcao != "A"||$opcao != "N"){
            throw new Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaCodigo($opcao, $posicao) {
        if($opcao != 0||$opcao != 1||$opcao != 2){
            throw new Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaEspecieTitulo($opcao, $posicao) {
        $opcoes = [1, 2, 3, 4, 5,
                   6, 7, 8, 9, 10,
                   11, 12, 13, 14, 15,
                   16, 17, 18, 19, 20,
                   21, 22, 23, 24, 25, 99];
        if($opcao !== array_search($opcao, $opcoes)){
            throw new Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function validaCodigoProtesto($opcao, $posicao) {
        $opcoes = [1, 2, 3, 9];
        if($opcao !== array_search($opcao, $opcoes)){
            throw new Exception("Posição ".$posicao." inválida");
        }
    }
    
    public function codigoMoeda($opcao, $posicao) {
        $opcoes = [02, 09];
        if($opcao !== array_search($opcao, $opcoes)){
            throw new Exception("Posição ".$posicao." inválida");
        }
    }
   
}
