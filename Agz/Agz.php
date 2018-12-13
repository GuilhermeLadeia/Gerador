<?php

namespace Agz;

class Agz {
    private $segmentoA;
    private $segmentoG;
    private $segmentoZ;
    
    public function __construct() {
        $this->segmentoA = [];
        $this->segmentoG = [];
        $this->segmentoZ = [];
    }
    
    public function setSegmentoA(array $segmentoA) {
        $this->segmentoA = $segmentoA;
    }

    public function setSegmentoG(array $segmentoG) {
        $this->segmentoG[] = $segmentoG;
    }

    public function setSegmentoZ(array $segmentoZ) {
        $this->segmentoZ = $segmentoZ;
    }

    public function gerar($layout) {
        $caminho = 'Agz\\Layout\\'.$layout;
        $instancia = new $caminho;
        $resultado = [];
        $modeloA = $instancia->segmentoA();
        $segmentoA = [];
        foreach ($modeloA as $key => $especificacoes) {
            $segmentoA[] = $this->tratarDados($especificacoes, $this->segmentoA[$key]);
        }
        $resultado[] = $segmentoA;
        $modeloG = $instancia->segmentoG();
        
        foreach($this->segmentoG as $segmento) {
            $segmentoG = [];
            foreach ($modeloG as $key => $especificacoes) {
                $segmentoG[] = $this->tratarDados($especificacoes, $segmento[$key]); 
            }
            $resultado[]= $segmentoG;
        }
        $modeloZ = $instancia->segmentoZ();
        $segmentoZ= [];
        foreach ($modeloZ as $key => $especificacoes) {
            $segmentoZ[] = $this->tratarDados($especificacoes, $this->segmentoZ[$key]);
        }
        $resultado[] = $segmentoZ;
        return $resultado;
    }

    private function tratarDados($especificacoes, $valor) {
        //var_dump($valor);
        $instancia = new \Arquivo\Util();
        if ($especificacoes[1] == 'num') {
            $valor = $instancia->adicionarZerosEsq($valor, $especificacoes[0]);
        } else {
            $valor = $instancia->removerCaracEspeciais($valor);
            $valor = $instancia->removerAcentos($valor);
            $valor = $instancia->converterMaiusculo($valor);
            $valor = $instancia->adicionarEspacosDir($valor, $especificacoes[0]);
        }
        return $valor;
    }
}
