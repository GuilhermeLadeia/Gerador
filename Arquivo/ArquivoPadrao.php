<?php

namespace Arquivo;

use Arquivo\Util;

class ArquivoPadrao {

    public function gravar($resultado, $caminho, $nomeArquivo) {
        $caminhoAbsoluto = $this->tratarCaminho($caminho, $nomeArquivo);
        $this->verificaPermissaoTxt($nomeArquivo);
        $arquivoAberto = fopen($caminhoAbsoluto, "w+");
        foreach ($resultado as $value) {
            $linha = '';
            foreach ($value as $dados) {
                $linha.=$dados;
            }
            fwrite($arquivoAberto, $linha . "\r\n");
        }
        fclose($arquivoAberto);
    }

    public function tratarDados($especificacoes, $valor, $posicao) {
        $instancia = new Util();
        if ($especificacoes[1] == 'num') {
            $valor = $instancia->formataNumDecimais($valor);
            $instancia->validaTamanhoNum($valor, $especificacoes[0], $posicao);
            $valor = $instancia->adicionarZerosEsq($valor, $especificacoes[0]);
        }
        else {
            $valor = $instancia->removerCaracEspeciais($valor);
            $valor = $instancia->removerAcentos($valor);
            $valor = $instancia->converterMaiusculo($valor);
            $valor = $instancia->adicionarEspacosDir($valor, $especificacoes[0]);
        }
        return $valor;
    }

    private function tratarCaminho($caminho, $nomeArquivo) {
        if (empty($caminho)) {
            return $nomeArquivo;
        } elseif ((substr($caminho, -1) == "/")) {
            return $caminho . $nomeArquivo;
        } elseif (PHP_OS == "WINNT") {
            return $caminho . "\\" . $nomeArquivo;
        } else {
            return $caminho . "/" . $nomeArquivo;
        }
    }
    
    public function verificaPermissaoTxt($filename){
         if (is_writable($filename)===false){
            throw new \Exception("O arquivo $filename não possui permissão de escrita");
        }
    }
}
