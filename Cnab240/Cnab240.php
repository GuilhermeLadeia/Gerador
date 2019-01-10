<?php

namespace Cnab240;

use Arquivo\ArquivoPadrao;
use Cnab240\ValidacaoCnab240;

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

    public function gerar($layout, $nomeArquivo, $caminhoArquivo = '') {

        $caminho = 'Cnab240\\Layout\\' . $layout;
        $instancia = new $caminho;
        $resultado = [];
        $instanciaPadrao = new ArquivoPadrao();
        $validacaoCnab = new ValidacaoCnab240();
        $contalinhas = 4;
        $somaValor = 0;
        $quantTitulos = 0;
        $modeloHeaderArqDefault = $instancia->headerArquivoDefault();
        $modeloHeaderArqValidacao = $instancia->headerArquivoValidacao();
        $modeloHeaderArquivo = $instancia->headerArquivo();
        $headerArquivo = [];
        foreach ($modeloHeaderArquivo as $key => $especificacoes) {
            $valor = $this->headerArquivo[$key];
            if (empty($valor)and ( isset($modeloHeaderArqDefault[$key]))) {
                $valor = $modeloHeaderArqDefault[$key];
            }
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloHeaderArqValidacao[$key])) {
                $validacaoCnab->{$modeloHeaderArqValidacao[$key]}($valor, $key, $headerArquivo);
            }
            $headerArquivo[] = $valor;
        }
        $resultado[] = $headerArquivo;

        $modeloHeaderLoteDefault = $instancia->headerloteDefault($headerArquivo);
        $modeloHeaderLoteValidacao = $instancia->headerLoteValidacao();
        $modeloHeaderLote = $instancia->headerLote();
        $headerLote = [];
        foreach ($modeloHeaderLote as $key => $especificacoes) {
            $valor = $this->headerLote[$key];
            if (empty($valor)and ( isset($modeloHeaderLoteDefault[$key]))) {
                $valor = $modeloHeaderLoteDefault[$key];
            }
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloHeaderLoteValidacao[$key])) {
                $validacaoCnab->{$modeloHeaderLoteValidacao[$key]}($valor, $key, $headerLote);
            }
            $headerLote[] = $valor;
        }
        $resultado[] = $headerLote;

        $modeloSegmentoP = $instancia->segmentoP();
        $modeloSegmentoPDefault = $instancia->segmentoPDefault($headerArquivo);
        $modeloSegmentoPValidacao = $instancia->segmentoPValidacao();
        $modeloSegmentoQ = $instancia->segmentoQ();
        $modeloSegmentoQDefault = $instancia->segmentoQDefault($headerArquivo);
        $modeloSegmentoQValidacao = $instancia->segmentoQValidacao();
        $modeloSegmentoR = $instancia->segmentoR();
        $modeloSegmentoRDefault = $instancia->segmentoRDefault($headerArquivo);
        $modeloSegmentoRValidacao = $instancia->segmentoRValidacao();
        foreach ($this->segmentoP as $keySegmentoP => $dadosSegmentoP) {
            $segmentoP = [];
            $somaValor = $dadosSegmentoP[21] + $somaValor;
            foreach ($modeloSegmentoP as $keyModeloP => $especificacoesModeloP) {
                $valorP = $dadosSegmentoP[$keyModeloP];
                if (empty($valorP)and ( isset($modeloSegmentoPDefault[$keyModeloP]))) {
                    $valorP = $modeloSegmentoPDefault[$keyModeloP];
                }
                $valorP = $instanciaPadrao->tratarDados($especificacoesModeloP, $valorP, $keyModeloP);
                if (isset($modeloSegmentoPValidacao[$keyModeloP])) {
                    $validacaoCnab->{$modeloSegmentoPValidacao[$keyModeloP]}($valorP, $keyModeloP, $segmentoP);
                }
                $segmentoP[] = $valorP;
            }
            $contalinhas++;
            $quantTitulos++;
            $segmentoQ = [];
            foreach ($modeloSegmentoQ as $keyModeloQ => $especificacoesModeloQ) {
                $valorQ = $this->segmentoQ[$keySegmentoP][$keyModeloQ];
                if (empty($valorQ)and ( isset($modeloSegmentoQDefault[$keyModeloQ]))) {
                    $valorQ = $modeloSegmentoQDefault[$keyModeloQ];
                }
                $valorQ = $instanciaPadrao->tratarDados($especificacoesModeloQ, $valorQ, $keyModeloQ);
                if (isset($modeloSegmentoQValidacao[$keyModeloQ])) {
                    $validacaoCnab->{$modeloSegmentoQValidacao[$keyModeloQ]}($valorQ, $keyModeloQ, $segmentoQ);
                }
                $segmentoQ[] = $valorQ;
            }
            $contalinhas++;
            if ($this->segmentoR) {
                $segmentoR = [];
                foreach ($modeloSegmentoR as $keyModeloR => $especificacoesModeloR) {
                    $valorR = $this->segmentoR[$keySegmentoP][$keyModeloR];
                    if (empty($valorR)and ( isset($modeloSegmentoRDefault[$keyModeloR]))) {
                        $valorR = $modeloSegmentoRDefault[$keyModeloR];
                    }
                    $valorR = $instanciaPadrao->tratarDados($especificacoesModeloR, $valorR, $keyModeloR);
                    if(isset($modeloSegmentoRValidacao[$keyModeloR])){
                        $validacaoCnab->{$modeloSegmentoRValidacao[$keyModeloR]}($valorR, $keyModeloR, $segmentoR);
                    }
                    $segmentoR[] = $valorR;
                }
                $contalinhas++;
            }
            
            $resultado[] = $segmentoP;
            $resultado[] = $segmentoQ;
            if ($this->segmentoR) {
                $resultado[] = $segmentoR;
            }
        }

        $modeloTraillerLote = $instancia->traillerLote();
        $modeloTraillerLoteDefault = $instancia->traillerLoteDefault($headerArquivo);
        $modeloTraillerLoteValidacao = $instancia->traillerLoteValidacao();
        $traillerLote = [];
        foreach ($modeloTraillerLote as $key => $especificacoes) {
            $this->traillerLote[6] = $quantTitulos;
            $this->traillerLote[7] = $somaValor;
            $valor = $this->traillerLote[$key];
            if (empty($valor)and ( isset($modeloTraillerLoteDefault[$key]))) {
                $valor = $modeloTraillerLoteDefault[$key];
            }
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloTraillerLoteValidacao[$key])) {
                $validacaoCnab->{$modeloTraillerLoteValidacao[$key]}($valor, $key, $traillerLote);
            }
            $traillerLote[] = $valor;
        }
        $resultado[] = $traillerLote;

        $modeloTraillerArquivo = $instancia->traillerArquivo();
        $modeloTraillerArquivoDefault = $instancia->traillerArquivoDefault($headerArquivo);
        $modeloTraillerArquivoValidacao = $instancia->traillerArquivoValidacao();
        $traillerArquivo = [];
        foreach ($modeloTraillerArquivo as $key => $especificacoes) {
            $this->traillerArquivo[6] = $contalinhas;
            $valor = $this->traillerArquivo[$key];
            if (empty($valor)and ( isset($modeloTraillerArquivoDefault[$key]))) {
                $valor = $modeloTraillerArquivoDefault[$key];
            }
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloTraillerArquivoValidacao[$key])) {
                $validacaoCnab->{$modeloTraillerArquivoValidacao[$key]}($valor, $key, $traillerArquivo);
            }
            $traillerArquivo[] = $valor;
        }

        $resultado[] = $traillerArquivo;
        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }
}
