<?php

namespace Agz;

use Agz\ValidacaoAgz;
use Arquivo\ArquivoPadrao;

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

    public function gerar($layout, $nomeArquivo, $caminhoArquivo = '') {
        $caminho = 'Agz\\Layout\\' . $layout;
        $instancia = new $caminho;
        $validacaoAgz = new ValidacaoAgz();
        $resultado = [];
        $instanciaPadrao = new ArquivoPadrao();
        $modeloA = $instancia->segmentoA();
        $modeloADefault = $instancia->segmentoADefault();
        $modeloAValidacao = $instancia->segmentoAValidacao();
        $segmentoA = [];
        foreach ($modeloA as $key => $especificacoes) {
            $valor = $this->segmentoA[$key];
            if (empty($valor)and ( isset($modeloADefault[$key]))) {
                $valor = $modeloADefault[$key];
            }
            if (isset($modeloAValidacao[$key])) {
                $valor = $instanciaPadrao->tratarDados($especificacoes, $valor);
                $validacaoAgz->{$modeloAValidacao[$key]}($valor, $key);
            }
            $segmentoA[] = $valor;
        }
        $resultado[] = $segmentoA;
        
        $modeloG = $instancia->segmentoG();
        $modeloGValidacao = $instancia->segmentoGValidacao();
        foreach ($this->segmentoG as $segmento) {
            $segmentoG = [];
            foreach ($modeloG as $key => $especificacoes) {
                $valor = $segmento[$key];
                if(isset($modeloGValidacao[$key])){
                    $valor = $instanciaPadrao->tratarDados($especificacoes, $valor);
                    $validacaoAgz->{$modeloGValidacao[$key]}($valor, $key);
                }
                $segmentoG[] = $valor;
            }
            $resultado[] = $segmentoG;
        }
        $modeloZ = $instancia->segmentoZ();

        $segmentoZ = [];
        foreach ($modeloZ as $key => $especificacoes) {
            $segmentoZ[] = $instanciaPadrao->tratarDados($especificacoes, $this->segmentoZ[$key]);
        }
        $resultado[] = $segmentoZ;
        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }

}
