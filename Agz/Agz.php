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
        echo '<pre>';
        print_r($this->segmentoA);
        print_r($this->segmentoG);
        exit();
        $caminho = 'Agz\\Layout\\'.$layout;
        $instancia = new $caminho;
        $resultado = [];
        $modeloA = $instancia->segmentoA();
        foreach ($modeloA as $key => $especificacoes) {
            $resultado[] = $this->tratarDados($especificacoes, $this->segmentoA[$key]);
        }
        $modeloG = $instancia->segmentoG();
        foreach ($modeloG as $key => $especificacoes) {
            $resultado[] = $this->tratarDados($especificacoes, $this->segmentoG[$key]);
        }
        /*$modeloZ = $instancia->segmentoZ();
        foreach ($modeloZ as $key => $especificacoes) {
            $resultado[] = $this->tratarDados($especificacoes, $this->segmentoZ[$key]);
        }*/
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
            $valor = $instancia->adicionarEspacosDir($valor, $especificacoes[0]);
        }
        return $valor;
    }
}
