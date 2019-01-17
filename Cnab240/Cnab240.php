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
        $segmentosObrigatorios = $instancia->segmentosObrigatorios();
        $modeloHeaderArqDefault = $instancia->headerArquivoDefault();
        $modeloHeaderArqValidacao = $instancia->headerArquivoValidacao();
        $modeloHeaderArqDinamico = $instancia->headerArquivoDinamico();
        $modeloHeaderArquivo = $instancia->headerArquivo();
        $headerArquivo = [];
        $validacaoCnab->validaSegmentosObrigatorios($this->headerArquivo, 0, $segmentosObrigatorios);
        foreach ($modeloHeaderArquivo as $key => $especificacoes) {
            $valor = "";
            if (isset($this->headerArquivo[$key])) {
                $valor = $this->headerArquivo[$key];
            }
            $valor = $validacaoCnab->validaVariavel($valor, $key, $modeloHeaderArqDefault, $modeloHeaderArqDinamico);
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloHeaderArqValidacao[$key])) {
                $validacaoCnab->{$modeloHeaderArqValidacao[$key]}($valor, $key, $headerArquivo);
            }
            $headerArquivo[] = $valor;
        }
        $resultado[] = $headerArquivo;

        $modeloHeaderLoteDefault = $instancia->headerloteDefault($headerArquivo);
        $modeloHeaderLoteValidacao = $instancia->headerLoteValidacao();
        $modeloHeaderLoteDinamico = $instancia->headerLoteDinamico();
        $modeloHeaderLote = $instancia->headerLote();
        $headerLote = [];
        $validacaoCnab->validaSegmentosObrigatorios($this->headerLote, 1, $segmentosObrigatorios);
        foreach ($modeloHeaderLote as $key => $especificacoes) {
            $valor = "";
            if (isset($this->headerLote[$key])) {
                $valor = $this->headerLote[$key];
            }
            $valor = $validacaoCnab->validaVariavel($valor, $key, $modeloHeaderLoteDefault, $modeloHeaderLoteDinamico);
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
        $modeloSegmentoPDinamico = $instancia->segmentoPDinamico();

        $modeloSegmentoQ = $instancia->segmentoQ();
        $modeloSegmentoQDefault = $instancia->segmentoQDefault($headerArquivo);
        $modeloSegmentoQValidacao = $instancia->segmentoQValidacao();
        $modeloSegmentoQDinamico = $instancia->segmentoQDinamico();

        if ($this->segmentoR) {
            $modeloSegmentoR = $instancia->segmentoR();
            $modeloSegmentoRDefault = $instancia->segmentoRDefault($headerArquivo);
            $modeloSegmentoRValidacao = $instancia->segmentoRValidacao();
            $modeloSegmentoRDinamico = $instancia->segmentoRDinamico();
        }
        $validacaoCnab->validaSegmentosObrigatorios($this->segmentoP, "P", $segmentosObrigatorios);
        $validacaoCnab->validaSegmentosObrigatorios($this->segmentoQ, "Q", $segmentosObrigatorios);
        $validacaoCnab->validaSegmentosObrigatorios($this->segmentoR, "R", $segmentosObrigatorios);
        foreach ($this->segmentoP as $keySegmentoP => $dadosSegmentoP) {
            $segmentoP = [];
            $somaValor = $dadosSegmentoP[21] + $somaValor;
            foreach ($modeloSegmentoP as $keyModeloP => $especificacoesModeloP) {
                $valorP = "";
                if (isset($dadosSegmentoP[$keyModeloP])) {
                    $valorP = $dadosSegmentoP[$keyModeloP];
                }
                $valorP = $validacaoCnab->validaVariavel($valorP, $keyModeloP, $modeloSegmentoPDefault, $modeloSegmentoPDinamico);
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
                $valorQ = "";
                if (isset($this->segmentoQ[$keySegmentoP][$keyModeloQ])) {
                    $valorQ = $this->segmentoQ[$keySegmentoP][$keyModeloQ];
                }
                $valorQ = $validacaoCnab->validaVariavel($valorQ, $keyModeloQ, $modeloSegmentoQDefault, $modeloSegmentoQDinamico);
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
                    $valorR = "";
                    if (isset($this->segmentoR[$keySegmentoP][$keyModeloR])) {
                        $valorR = $this->segmentoR[$keySegmentoP][$keyModeloR];
                    }
                    $valorR = $validacaoCnab->validaVariavel($valorR, $keyModeloR, $modeloSegmentoRDefault, $modeloSegmentoRDinamico);
                    $valorR = $instanciaPadrao->tratarDados($especificacoesModeloR, $valorR, $keyModeloR);
                    if (isset($modeloSegmentoRValidacao[$keyModeloR])) {
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
        $modeloTraillerLoteDinamico = $instancia->traillerLoteDinamico($quantTitulos, $somaValor);
        $traillerLote = [];
        foreach ($modeloTraillerLote as $key => $especificacoes) {
            $valor = "";
            if (isset($this->traillerLote[$key])) {
                $valor = $this->traillerLote[$key];
            }
            $valor = $validacaoCnab->validaVariavel($valor, $key, $modeloTraillerLoteDefault, $modeloTraillerLoteDinamico);
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloTraillerLoteValidacao[$key])) {
                $validacaoCnab->{$modeloTraillerLoteValidacao[$key]}($valor, $key, $traillerLote);
            }
            $traillerLote[] = $valor;
        }
        $validacaoCnab->validaSegmentosObrigatorios($this->traillerLote, 5, $segmentosObrigatorios);
        $resultado[] = $traillerLote;

        $modeloTraillerArquivo = $instancia->traillerArquivo();
        $modeloTraillerArquivoDefault = $instancia->traillerArquivoDefault($headerArquivo);
        $modeloTraillerArquivoValidacao = $instancia->traillerArquivoValidacao();
        $modeloTraillerArquivoDinamico = $instancia->traillerArquivoDinamico($contalinhas);
        $traillerArquivo = [];
        foreach ($modeloTraillerArquivo as $key => $especificacoes) {
            $valor = "";
            if (isset($this->traillerArquivo[$key])) {
                $valor = $this->traillerArquivo[$key];
            }
            $valor = $validacaoCnab->validaVariavel($valor, $key, $modeloTraillerArquivoDefault, $modeloTraillerArquivoDinamico);
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloTraillerArquivoValidacao[$key])) {
                $validacaoCnab->{$modeloTraillerArquivoValidacao[$key]}($valor, $key, $traillerArquivo);
            }
            $traillerArquivo[] = $valor;
        }
        $resultado[] = $traillerArquivo;
        $validacaoCnab->validaTamanhoArray($resultado);
        
        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }

}
