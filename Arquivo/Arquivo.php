<?php
namespace Gerador\Arquivo;

use Gerador\Arquivo\Cnab240\Layout\Sicoob081;

class Arquivo {
    
    public function gerar($modelo, $layout, $dados) {
        //$instanciaDinamica = new $modelo \Layout\$layout;
        $instancia = new Sicoob081();
        $header = $instancia->headerArquivo();
        return $header;
    }
    
    private function interpretar($modelo, $dados) {
        $resultado = [];
        foreach ($modelo as $key => $especificacoes) {
            $resultado[] = $this->tratarDados($especificacoes, $dados[$key]);
        }
        return $resultado;
    }
    
    private function tratarDados($especificacoes, $valor) {
        return $valor;
    }
}
