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

    public function gerar($layout, $nomeArquivo, $caminhoArquivo='') {
        $caminho = 'Agz\\Layout\\'.$layout;
        $instancia = new $caminho;
        $resultado = [];
        $instanciaPadrao = new \Arquivo\ArquivoPadrao();
        $modeloA = $instancia->segmentoA();
        $modeloADefault = $instancia->segmentoADefault();
        $segmentoA = [];
        foreach ($modeloA as $key => $especificacoes) {
            $valorNaoTratadoA = $this->segmentoA[$key];
            if(empty($valorNaoTratadoA)and(isset($modeloADefault[$key]))){
                $valorNaoTratadoA = $modeloADefault[$key];
            }
            $segmentoA[] = $instanciaPadrao->tratarDados($especificacoes, $valorNaoTratadoA);
        }
        $resultado[] = $segmentoA;
        
        $modeloG = $instancia->segmentoG();
        foreach($this->segmentoG as $segmento) {
            $segmentoG = [];
            foreach ($modeloG as $key => $especificacoes) {
                $segmentoG[] = $instanciaPadrao->tratarDados($especificacoes, $segmento[$key]); 
            }
            $resultado[]= $segmentoG;
        }
        $modeloZ = $instancia->segmentoZ();
        
        $segmentoZ= [];
        foreach ($modeloZ as $key => $especificacoes) {
            $segmentoZ[] = $instanciaPadrao->tratarDados($especificacoes, $this->segmentoZ[$key]);
        }
        $resultado[] = $segmentoZ;
        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }
}
