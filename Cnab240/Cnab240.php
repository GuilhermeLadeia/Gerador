<?php

namespace Cnab240;

class Cnab240 {

    private $headerArquivo;
    private $headerLote;
    private $segmentoP;
    private $segmentoQ;
    private $segmentoR;
    private $traillerLote;
    private $traillerArquivo;

    function __construct() {
        $this->headerArquivo = [];
        $this->headerLote = [];
        $this->segmentoP = [];
        $this->segmentoQ = [];
        $this->segmentoR = [];
        $this->traillerLote = [];
        $this->traillerArquivo = [];
    }

    function setHeaderArquivo($headerArquivo) {
        $this->headerArquivo = $headerArquivo;
    }

    function setHeaderLote($headerLote) {
        $this->headerLote = $headerLote;
    }

    function setSegmentoP($segmentoP) {
        $this->segmentoP[] = $segmentoP;
    }

    function setSegmentoQ($segmentoQ) {
        $this->segmentoQ[] = $segmentoQ;
    }
    
    function setSegmentoR($segmentoR) {
        $this->segmentoR[] = $segmentoR;
    }

    function setTraillerLote($traillerLote) {
        $this->traillerLote = $traillerLote;
    }

    function setTraillerArquivo($traillerArquivo) {
        $this->traillerArquivo = $traillerArquivo;
    }

    public function gerar($layout) {

        $caminho = 'Cnab240\\Layout\\' . $layout;
        $instancia = new $caminho;
        $resultado = [];

        $modeloHeaderArquivo = $instancia->headerArquivo();
        $headerArquivo = [];
        foreach ($modeloHeaderArquivo as $key => $especificacoes) {
            $headerArquivo[] = $this->tratarDados($especificacoes, $this->headerArquivo[$key]);
        }
        $resultado[] = $headerArquivo;

        $modeloHeaderLote = $instancia->headerLote();
        $headerLote = [];
        foreach ($modeloHeaderLote as $key => $especificacoes) {
            $headerLote[] = $this->tratarDados($especificacoes, $this->headerLote[$key]);
        }
        $resultado[] = $headerLote;

        $modeloSegmentoP = $instancia->segmentoP();
        $modeloSegmentoQ = $instancia->segmentoQ();
        $modeloSegmentoR = $instancia->segmentoR();
        foreach ($this->segmentoP as $keySegmentoP => $dadosSegmentoP) {
            $segmentoP = [];
            foreach ($modeloSegmentoP as $keyModeloP => $especificacoesModeloP) {
                $segmentoP[] = $this->tratarDados($especificacoesModeloP, $dadosSegmentoP[$keyModeloP]);
            }
            $segmentoQ = [];
            foreach ($modeloSegmentoQ as $keyModeloQ => $especificacoesModeloQ) {
                $segmentoQ[] = $this->tratarDados($especificacoesModeloQ, $this->segmentoQ[$keySegmentoP][$keyModeloQ]);
            }
            if($this->segmentoR){
                $segmentoR = [];
                foreach ($modeloSegmentoR as $keyModeloR => $especificacoesModeloR) {
                    $segmentoR[] = $this->tratarDados($especificacoesModeloR, $this->segmentoR[$keySegmentoP][$keyModeloR]);
                }
            }
            $resultado[] = $segmentoP;
            $resultado[] = $segmentoQ;
            if($this->segmentoR){
                $resultado[] = $segmentoR;
            }
        }

        /* $modeloTraillerLote = $instancia->traillerLote();
          $traillerLote= [];
          foreach ($modeloTraillerLote as $key => $especificacoes) {
          $traillerLote[] = $this->tratarDados($especificacoes, $this->traillerLote[$key]);
          }
          $resultado[] = $traillerLote;

          $modeloTraillerArquivo = $instancia->traillerArquivo();
          $traillerArquivo= [];
          foreach ($modeloTraillerArquivo as $key => $especificacoes) {
          $traillerArquivo[] = $this->tratarDados($especificacoes, $this->traillerArquivo[$key]);
          }
          $resultado[] = $traillerArquivo; */
        return $resultado;
    }

    private function tratarDados($especificacoes, $valor) {
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
