<?php

namespace Arquivo;

class Arquivo {

    public function gerar($modelo, $layout, $dados) {
        $caminho = 'Arquivo\\'.$modelo.'\\'.$layout;
        $instancia = new $caminho;
        switch ($modelo) {
            case 'Agz':
                    $saida = $this->gerarAgz($instancia, $dados);
                break;
            case 'Cnab240':
                
                break;
            default:
                throw new \Exception("Modelo não encontrado");
                break;
        }
        return $saida;
    }
    /**
     * 
     * @param Agz\Agz02 $instanciaLayout
     * @param type $dados
     * @return type
     */
    private function gerarAgz($instanciaLayout, $dados) {
        $resultado = [];
        foreach ($dados as $key => $value) {
            switch ($key) {
                case 'segmentoA':
                    $resultado[] = $this->interpretar($instanciaLayout->segmentoA(), $value);
                    break;
                case 'segmentoG':
                    foreach ($value as $dadosG) {
                        $resultado[] = $this->interpretar($instanciaLayout->segmentoG(), $dadosG);
                    }
                    break;
                case 'segmentoZ':
                    $resultado[] = $this->interpretar($instanciaLayout->segmentoZ(), $value);
                    break;
                default:
                    break;
            }
        }
        return $resultado;
    }
    /**
     * 
     * @param Cnab240\Sicoob081 $instanciaLayout
     * @param type $dados
     * @return array
     */
    private function gerarCnab240($instanciaLayout, $dados) {
        $resultado = [];
        foreach ($dados as $key => $value) {
            switch ($key) {
                case 'header':
                    $resultado[] = $this->interpretar($instanciaLayout->headerArquivo(), $value);
                    break;
                case 'headerLote':
                    $resultado[] = $this->interpretar($instanciaLayout->headerLote(), $value);
                    break;
                case 'segmentoP':
                    foreach ($value as $dadosP) {
                        $resultado[] = $this->interpretar($instanciaLayout->segmentoP(), $dadosP);
                    }
                    break;
                case 'segmentoQ':
                    foreach ($value as $dadosQ) {
                        $resultado[] = $this->interpretar($instanciaLayout->segmentoQ(), $dadosQ);
                    }
                    break;
                case 'trailler':
                    //$resultado[] = $this->interpretar($instanciaLayout->, $value);
                    break;
                case 'traillerLote':
                    //$resultado[] = $this->interpretar($instanciaLayout->, $value);
                    break;
                default:
                    break;
            }
        }
        return $resultado;
    }

    private function interpretar($layout, $dados) {
        $resultado = [];
        foreach ($layout as $key => $especificacoes) {
            $resultado[] = $this->tratarDados($especificacoes, $dados[$key]);
        }
        return $resultado;
    }

    private function tratarDados($especificacoes, $valor) {
        $instancia = new Util();
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
