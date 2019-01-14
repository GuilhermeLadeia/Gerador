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
        $contaLinhas = 2;
        $somaValor = 0;
        $instanciaPadrao = new ArquivoPadrao();
        $modeloA = $instancia->segmentoA();
        $modeloADefault = $instancia->segmentoADefault();
        $modeloAValidacao = $instancia->segmentoAValidacao();
        $modeloADinamico = $instancia->segmentoADinamico();
        $segmentoA = [];
        foreach ($modeloA as $key => $especificacoes) {
            $valor = "";
            if (isset($this->segmentoA[$key])) {
                $valor = $this->segmentoA[$key];
            }
            $valor = $validacaoAgz->validaVariavel($valor, $key, $modeloADefault, $modeloADinamico);
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloAValidacao[$key])) {
                $validacaoAgz->{$modeloAValidacao[$key]}($valor, $key);
            }
            $segmentoA[] = $valor;
        }
        $resultado[] = $segmentoA;
        $numRegistros = 0001;
        $modeloG = $instancia->segmentoG();
        $modeloGValidacao = $instancia->segmentoGValidacao();
        $modeloGDinamico = $instancia->segmentoGDinamico();
        foreach ($this->segmentoG as $keySegmento => $segmento) {
            $segmentoG = [];
            $somaValor = $segmento[6] + $somaValor;
            if($keySegmento==0){
                $modeloGDefault = $instancia->segmentoGDefault1($numRegistros);
            }else{
                $modeloGDefault = $instancia->segmentoGDefault($numRegistros, $resultado[1]);
            }      
            foreach ($modeloG as $key => $especificacoes) {
                $valor = "";
                if (isset($segmento[$key])) {
                    $valor = $segmento[$key];
                }
                $valor = $validacaoAgz->validaVariavel($valor, $key, $modeloGDefault, $modeloGDinamico);
                $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
                if (isset($modeloGValidacao[$key])) {
                    $validacaoAgz->{$modeloGValidacao[$key]}($valor, $key);
                }
                $segmentoG[] = $valor;
            }
            $numRegistros++;
            $resultado[] = $segmentoG;
            $contaLinhas++;
        }
        $modeloZ = $instancia->segmentoZ();
        $modeloZDefault = $instancia->segmentoZDefault();
        $modeloZValidacao = $instancia->segmentoZValidacao();
        $modeloZDinamico = $instancia->segmentoZDinamico($contaLinhas, $somaValor);
        $segmentoZ = [];
        foreach ($modeloZ as $key => $especificacoes) {
            $valor = "";
            if (isset($this->segmentoZ[$key])) {
                $valor = $this->segmentoZ[$key];
            }
            $valor = $validacaoAgz->validaVariavel($valor, $key, $modeloZDefault, $modeloZDinamico);
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloZValidacao[$key])) {
                $validacaoAgz->{$modeloZValidacao[$key]}($valor, $key);
            }
            $segmentoZ[] = $valor;
        }
        $resultado[] = $segmentoZ;
        $validacaoAgz->validaTamanhoArray($resultado);
        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }

}
