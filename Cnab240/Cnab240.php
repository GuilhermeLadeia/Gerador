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

    public function gerar($layout, $nomeArquivo, $caminhoArquivo='') {

        $caminho = 'Cnab240\\Layout\\' . $layout;
        $instancia = new $caminho;
        $resultado = [];
        $instanciaPadrao = new \Arquivo\ArquivoPadrao();
        $modeloHeaderArquivo = $instancia->headerArquivo();
        $headerArquivo = [];
        foreach ($modeloHeaderArquivo as $key => $especificacoes) {
            $headerArquivo[] = $instanciaPadrao->tratarDados($especificacoes, $this->headerArquivo[$key]);
        }
        $resultado[] = $headerArquivo;

        $modeloHeaderLote = $instancia->headerLote();
        $headerLote = [];
        foreach ($modeloHeaderLote as $key => $especificacoes) {
            $headerLote[] = $instanciaPadrao->tratarDados($especificacoes, $this->headerLote[$key]);
        }
        $resultado[] = $headerLote;

        $modeloSegmentoP = $instancia->segmentoP();
        $modeloSegmentoQ = $instancia->segmentoQ();
        $modeloSegmentoR = $instancia->segmentoR();
        foreach ($this->segmentoP as $keySegmentoP => $dadosSegmentoP) {
            $segmentoP = [];
            foreach ($modeloSegmentoP as $keyModeloP => $especificacoesModeloP) {
                $segmentoP[] = $instanciaPadrao->tratarDados($especificacoesModeloP, $dadosSegmentoP[$keyModeloP]);
            }
            $segmentoQ = [];
            foreach ($modeloSegmentoQ as $keyModeloQ => $especificacoesModeloQ) {
                $segmentoQ[] = $instanciaPadrao->tratarDados($especificacoesModeloQ, $this->segmentoQ[$keySegmentoP][$keyModeloQ]);
            }
            if ($this->segmentoR) {
                $segmentoR = [];
                foreach ($modeloSegmentoR as $keyModeloR => $especificacoesModeloR) {
                    $segmentoR[] = $instanciaPadrao->tratarDados($especificacoesModeloR, $this->segmentoR[$keySegmentoP][$keyModeloR]);
                }
            }
            $resultado[] = $segmentoP;
            $resultado[] = $segmentoQ;
            if ($this->segmentoR) {
                $resultado[] = $segmentoR;
            }
        }
        $modeloTraillerLote = $instancia->traillerLote();
        $traillerLote = [];
        foreach ($modeloTraillerLote as $key => $especificacoes) {
            $traillerLote[] = $instanciaPadrao->tratarDados($especificacoes, $this->traillerLote[$key]);
        }
        $resultado[] = $traillerLote;

        $modeloTraillerArquivo = $instancia->traillerArquivo();
        $traillerArquivo = [];
        foreach ($modeloTraillerArquivo as $key => $especificacoes) {
            $traillerArquivo[] = $instanciaPadrao->tratarDados($especificacoes, $this->traillerArquivo[$key]);
        }

        $resultado[] = $traillerArquivo;
        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }

}
