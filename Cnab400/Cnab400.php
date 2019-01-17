<?php

namespace Cnab400;

use Arquivo\ArquivoPadrao;
use Cnab400\ValidacaoCnab400;

class Cnab400 {

    private $headerArquivo;
    private $tipo1;
    private $tipo2;
    private $tipo3;
    private $tipo4;
    private $tipo5;
    private $tipo6;
    private $tipo7;
    private $trailerArquivo;

    function __construct() {
        $this->headerArquivo = [];
        $this->tipo1 = [];
        $this->tipo2 = [];
        $this->tipo3 = [];
        $this->tipo4 = [];
        $this->tipo5 = [];
        $this->tipo6 = [];
        $this->tipo7 = [];
        $this->trailerArquivo = [];
    }

    function setHeaderArquivo($headerArquivo) {
        $this->headerArquivo = $headerArquivo;
    }

    function setTipo1($tipo1) {
        $this->tipo1[] = $tipo1;
    }

    function setTipo2($tipo2) {
        $this->tipo2[] = $tipo2;
    }

    function setTipo3($tipo3) {
        $this->tipo3[] = $tipo3;
    }

    function setTipo4($tipo4) {
        $this->tipo4[] = $tipo4;
    }

    function setTipo5($tipo5) {
        $this->tipo5[] = $tipo5;
    }

    function setTipo6($tipo6) {
        $this->tipo6[] = $tipo6;
    }

    function setTipo7($tipo7) {
        $this->tipo7[] = $tipo7;
    }

    function setTrailerArquivo($trailerArquivo) {
        $this->trailerArquivo = $trailerArquivo;
    }

    public function gerar($layout, $nomeArquivo, $caminhoArquivo = '') {

        $caminho = 'Cnab400\\Layout\\' . $layout;
        $instancia = new $caminho;
        $resultado = [];
        $numRegistro = 0001;
        $instanciaPadrao = new ArquivoPadrao();
        $validacaoCnab = new ValidacaoCnab400();
        $modeloHeaderArqDefault = $instancia->headerArquivoDefault($numRegistro);
        $modeloHeaderArqValidacao = $instancia->headerArquivoValidacao();
        $modeloHeaderArqDinamico = $instancia->headerArquivoDinamico();
        $modeloHeaderArquivo = $instancia->headerArquivo();
        $headerArquivo = [];
        $segmentosObrigatorios = $instancia->segmentosObrigatorios();
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

        $modeloTipo1Validacao = $instancia->tipo1Validacao();
        $modeloTipo1Dinamico = $instancia->tipo1Dinamico();
        $modeloTipo1 = $instancia->tipo1();

        if ($this->tipo2) {
            $modeloTipo2Validacao = $instancia->tipo2Validacao();
            $modeloTipo2Dinamico = $instancia->tipo2Dinamico();
            $modeloTipo2 = $instancia->tipo2();
        }

        if ($this->tipo3) {
            $modeloTipo3Validacao = $instancia->tipo3Validacao();
            $modeloTipo3Dinamico = $instancia->tipo3Dinamico();
            $modeloTipo3 = $instancia->tipo3();
        }

        if ($this->tipo4) {
            $modeloTipo4Validacao = $instancia->tipo4Validacao();
            $modeloTipo4Dinamico = $instancia->tipo4Dinamico();
            $modeloTipo4 = $instancia->tipo4();
        }

        if ($this->tipo5) {
            $modeloTipo5Validacao = $instancia->tipo5Validacao();
            $modeloTipo5Dinamico = $instancia->tipo5Dinamico();
            $modeloTipo5 = $instancia->tipo5();
        }

        if ($this->tipo6) {
            $modeloTipo6Validacao = $instancia->tipo6Validacao();
            $modeloTipo6Dinamico = $instancia->tipo6Dinamico();
            $modeloTipo6 = $instancia->tipo6();
        }

        if ($this->tipo7) {
            $modeloTipo7Validacao = $instancia->tipo7Validacao();
            $modeloTipo7Dinamico = $instancia->tipo7Dinamico();
            $modeloTipo7 = $instancia->tipo7();
        }
        $validacaoCnab->validaSegmentosObrigatorios($this->tipo1, 1, $segmentosObrigatorios);
        foreach ($this->tipo1 as $keyTipo1 => $dadosTipo1) {
            $numRegistro++;
            $modeloTipo1Default = $instancia->tipo1Default($numRegistro);
            $tipo1 = [];
            foreach ($modeloTipo1 as $keyModelo1 => $especificacoesModelo1) {
                $valor1 = "";
                if (isset($dadosTipo1[$keyModelo1])) {
                    $valor1 = $dadosTipo1[$keyModelo1];
                }
                $valor1 = $validacaoCnab->validaVariavel($valor1, $keyModelo1, $modeloTipo1Default, $modeloTipo1Dinamico);
                $valor1 = $instanciaPadrao->tratarDados($especificacoesModelo1, $valor1, $keyModelo1);
                if (isset($modeloTipo1Validacao[$keyModelo1])) {
                    $validacaoCnab->{$modeloTipo1Validacao[$keyModelo1]}($valor1, $keyModelo1, $tipo1);
                }
                $tipo1[] = $valor1;
            }
            
            $validacaoCnab->validaSegmentosObrigatorios($this->tipo2, 2, $segmentosObrigatorios);
            if ($this->tipo2) {
                $numRegistro++;
                $modeloTipo2Default = $instancia->tipo2Default($numRegistro);
                $tipo2 = [];
                foreach ($modeloTipo2 as $keyModelo2 => $especificacoesModelo2) {
                    $valor2 = "";
                    if (isset($this->tipo2[$keyTipo1][$keyModelo2])) {
                        $valor2 = $this->tipo2[$keyTipo1][$keyModelo2];
                    }
                    $valor2 = $validacaoCnab->validaVariavel($valor2, $keyModelo2, $modeloTipo2Default, $modeloTipo2Dinamico);
                    $valor2 = $instanciaPadrao->tratarDados($especificacoesModelo2, $valor2, $keyModelo2);
                    if (isset($modeloTipo2Validacao[$keyModelo2])) {
                        $validacaoCnab->{$modeloTipo2Validacao[$keyModelo2]}($valor2, $keyModelo2, $tipo2);
                    }
                    $tipo2[] = $valor2;
                }
            }
            
            $validacaoCnab->validaSegmentosObrigatorios($this->tipo3, 3, $segmentosObrigatorios);
            if ($this->tipo3) {
                $numRegistro++;
                $modeloTipo3Default = $instancia->tipo3Default($numRegistro);
                $tipo3 = [];
                foreach ($modeloTipo3 as $keyModelo3 => $especificacoesModelo3) {
                    $valor3 = "";
                    if (isset($this->tipo3[$keyTipo1][$keyModelo3])) {
                        $valor3 = $this->tipo3[$keyTipo1][$keyModelo3];
                    }
                    $valor3 = $validacaoCnab->validaVariavel($valor3, $keyModelo3, $modeloTipo3Default, $modeloTipo3Dinamico);
                    $valor3 = $instanciaPadrao->tratarDados($especificacoesModelo3, $valor3, $keyModelo3);
                    if (isset($modeloTipo3Validacao[$keyModelo3])) {
                        $validacaoCnab->{$modeloTipo3Validacao[$keyModelo3]}($valor3, $keyModelo3, $tipo3);
                    }
                    $tipo3[] = $valor3;
                }
            }
            
            $validacaoCnab->validaSegmentosObrigatorios($this->tipo4, 4, $segmentosObrigatorios);
            if ($this->tipo4) {
                $numRegistro++;
                $modeloTipo4Default = $instancia->tipo4Default($numRegistro);
                $tipo4 = [];
                foreach ($modeloTipo4 as $keyModelo4 => $especificacoesModelo4) {
                    $valor4 = "";
                    if (isset($this->tipo4[$keyTipo1][$keyModelo4])) {
                        $valor4 = $this->tipo4[$keyTipo1][$keyModelo4];
                    }
                    $valor4 = $validacaoCnab->validaVariavel($valor4, $keyModelo4, $modeloTipo4Default, $modeloTipo4Dinamico);
                    $valor4 = $instanciaPadrao->tratarDados($especificacoesModelo4, $valor4, $keyModelo4);
                    if (isset($modeloTipo4Validacao[$keyModelo4])) {
                        $validacaoCnab->{$modeloTipo4Validacao[$keyModelo4]}($valor4, $keyModelo4, $tipo4);
                    }
                    $tipo4[] = $valor4;
                }
            }
            
            $validacaoCnab->validaSegmentosObrigatorios($this->tipo5, 5, $segmentosObrigatorios);
            if ($this->tipo5) {
                $numRegistro++;
                $modeloTipo5Default = $instancia->tipo5Default($numRegistro);
                $tipo5 = [];
                foreach ($modeloTipo5 as $keyModelo5 => $especificacoesModelo5) {
                    $valor5 = "";
                    if (isset($this->tipo5[$keyTipo1][$keyModelo5])) {
                        $valor5 = $this->tipo5[$keyTipo1][$keyModelo5];
                    }
                    $valor5 = $validacaoCnab->validaVariavel($valor5, $keyModelo5, $modeloTipo5Default, $modeloTipo5Dinamico);
                    $valor5 = $instanciaPadrao->tratarDados($especificacoesModelo5, $valor5, $keyModelo5);
                    if (isset($modeloTipo5Validacao[$keyModelo5])) {
                        $validacaoCnab->{$modeloTipo5Validacao[$keyModelo5]}($valor5, $keyModelo5, $tipo5);
                    }
                    $tipo5[] = $valor5;
                }
            }
            
            $validacaoCnab->validaSegmentosObrigatorios($this->tipo6, 6, $segmentosObrigatorios);
            if ($this->tipo6) {
                $numRegistro++;
                $modeloTipo6Default = $instancia->tipo6Default($numRegistro);
                $tipo6 = [];
                foreach ($modeloTipo6 as $keyModelo6 => $especificacoesModelo6) {
                    $valor6 = "";
                    if (isset($this->tipo6[$keyTipo1][$keyModelo6])) {
                        $valor6 = $this->tipo6[$keyTipo1][$keyModelo6];
                    }
                    $valor6 = $validacaoCnab->validaVariavel($valor6, $keyModelo6, $modeloTipo6Default, $modeloTipo6Dinamico);
                    $valor6 = $instanciaPadrao->tratarDados($especificacoesModelo6, $valor6, $keyModelo6);
                    if (isset($modeloTipo6Validacao[$keyModelo6])) {
                        $validacaoCnab->{$modeloTipo6Validacao[$keyModelo6]}($valor6, $keyModelo6, $tipo6);
                    }
                    $tipo6[] = $valor6;
                }
            }
            
            $validacaoCnab->validaSegmentosObrigatorios($this->tipo7, 7, $segmentosObrigatorios);
            if ($this->tipo7) {
                $numRegistro++;
                $modeloTipo7Default = $instancia->tipo7Default($numRegistro);
                $tipo7 = [];
                foreach ($modeloTipo7 as $keyModelo7 => $especificacoesModelo7) {
                    $valor7 = "";
                    if (isset($this->tipo7[$keyTipo1][$keyModelo7])) {
                        $valor7 = $this->tipo7[$keyTipo1][$keyModelo7];
                    }
                    $valor7 = $validacaoCnab->validaVariavel($valor7, $keyModelo7, $modeloTipo7Default, $modeloTipo7Dinamico);
                    $valor7 = $instanciaPadrao->tratarDados($especificacoesModelo7, $valor7, $keyModelo7);
                    if (isset($modeloTipo7Validacao[$keyModelo7])) {
                        $validacaoCnab->{$modeloTipo7Validacao[$keyModelo7]}($valor7, $keyModelo7, $tipo7);
                    }
                    $tipo7[] = $valor7;
                }
            }

            $resultado[] = $tipo1;
            if ($this->tipo2) {
                $resultado[] = $tipo2;
            }
            if ($this->tipo3) {
                $resultado[] = $tipo3;
            }
            if ($this->tipo4) {
                $resultado[] = $tipo4;
            }
            if ($this->tipo5) {
                $resultado[] = $tipo5;
            }
            if ($this->tipo6) {
                $resultado[] = $tipo6;
            }
            if ($this->tipo7) {
                $resultado[] = $tipo7;
            }
        }


        $numRegistro++;
        $modeloTrailerArqDefault = $instancia->trailerArquivoDefault($numRegistro);
        $modeloTrailerArqValidacao = $instancia->trailerArquivoValidacao();
        $modeloTrailerArqDinamico = $instancia->trailerArquivoDinamico();
        $modeloTrailerArquivo = $instancia->trailerArquivo();
        $trailerArquivo = [];
        foreach ($modeloTrailerArquivo as $key => $especificacoes) {
            $valor = "";
            if (isset($this->trailerArquivo[$key])) {
                $valor = $this->trailerArquivo[$key];
            }
            $valor = $validacaoCnab->validaVariavel($valor, $key, $modeloTrailerArqDefault, $modeloTrailerArqDinamico);
            $valor = $instanciaPadrao->tratarDados($especificacoes, $valor, $key);
            if (isset($modeloTrailerArqValidacao[$key])) {
                $validacaoCnab->{$modeloTrailerArqValidacao[$key]}($valor, $key, $trailerArquivo);
            }
            $trailerArquivo[] = $valor;
        }
        $resultado[] = $trailerArquivo;
        $validacaoCnab->validaTamanhoArray($resultado);
        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }

}
