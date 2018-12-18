<?php
namespace Cnab240\Layout;

class Sicoob081 {
    
    public function headerArquivo() {
        return [
            1=>[3, 'num'],
            2=>[4, 'num'],
            3=>[1, 'num'],
            4=>[9, 'texto'],
            5=>[1, 'num'],
            6=>[14, 'num'],
            7=>[20, 'texto'],
            8=>[5, 'num'],
            9=>[1, 'num'],
            10=>[12, 'num'],
            11=>[1, 'texto'],
            12=>[1, 'texto'],
            13=>[30, 'texto'],
            14=>[30, 'texto'],
            15=>[10, 'texto'],
            16=>[1, 'num'],
            17=>[8, 'num'],
            18=>[6, 'num'],
            19=>[6, 'num'],
            20=>[3, 'num'],
            21=>[5, 'num'],
            22=>[20, 'texto'],
            23=>[20, 'texto'],
            24=>[29, 'texto'],
        ];
    }
    
    public function headerArquivoDefault() {
        return [
            3=>1,
            4=>"R",
            5=>01,
            17=>date('Ymd'),
            18=>date('his'),
            20=>81,
            
        ];
    }
    
    public function headerArquivoValidacao() {
        return [
            5=>"validaOpcao1e2",
            17=>"validaData", 
        ];
    }
    
    public function headerLote() {
        return [
            1=>[3, 'num'],
            2=>[4, 'num'],
            3=>[1, 'num'],
            4=>[1, 'texto'],
            5=>[2, 'num'],
            6=>[2, 'texto'],
            7=>[3, 'num'],
            8=>[1, 'texto'],
            9=>[1, 'num'],
            10=>[15, 'num'],
            11=>[20, 'texto'],
            12=>[5, 'num'],
            13=>[1, 'texto'],
            14=>[12, 'num'],
            15=>[1, 'texto'],
            16=>[1, 'texto'],
            17=>[30, 'texto'],
            18=>[40, 'texto'],
            19=>[40, 'texto'],
            20=>[8, 'num'],
            21=>[8, 'num'],
            22=>[8, 'num'],
            23=>[33, 'texto'],
        ];
    }
    
    public function headerLoteDefault() {
        return [
            1=>756,
            3=>1,
            4=>"R",
            5=>01,
            7=>040,
            18=>  date('Ymd'),
            22=>00000000,
        ];
    }
    
    public function headerLoteValidacao() {
        return [
            9=>"validaOpcao1e2",
            192=>"validaData",
        ];
    }
    
    public function segmentoP() {
        return [
            1=>[3, 'num'],
            2=>[4, 'num'],
            3=>[1, 'num'],
            4=>[5, 'num'],
            5=>[1, 'texto'],
            6=>[1, 'texto'],
            7=>[2, 'num'],
            8=>[5, 'num'],
            9=>[1, 'texto'],
            10=>[12, 'num'],
            11=>[1, 'texto'],
            12=>[1, 'texto'],
            13=>[20, 'texto'],
            14=>[1, 'num'],
            15=>[1, 'num'],
            16=>[1, 'texto'],
            17=>[1, 'num'],
            18=>[1, 'texto'],
            19=>[15, 'texto'],
            20=>[8, 'num'],
            21=>[13, 'num', 2],
            22=>[5, 'num'],
            23=>[1, 'texto'],
            24=>[2, 'num'],
            25=>[1, 'texto'],
            26=>[8, 'num'],
            27=>[1, 'num'],
            28=>[8, 'num'],
            29=>[13, 'num', 2],
            30=>[1, 'num'], 
            31=>[8, 'num'],
            32=>[13, 'num', 2],
            33=>[13, 'num', 2],
            34=>[13, 'num', 2],
            35=>[25, 'texto'],
            36=>[1, 'num'],
            37=>[2, 'num'],
            38=>[1, 'num'],
            39=>[3, 'texto'],
            40=>[2, 'num'],
            41=>[10, 'num'],
            42=>[1, 'texto'],
        ];
    }
    
    public function segmentoPDefault(){
        return [
            1=>756,
            3=>3,
            5=>"P",
            15=>0,
            22=>00000,
            41=>0000000000,
        ];
    }
    
    public function segmentoPValidacao() {
        return [
            7=>"validaMovimentoRemessa",
            17=>"validaOpcao1e2",
            18=>"validaOpcao1e2",
            24=>"validaEspecieTitulo",
            25=>"validaIdTitulo",
            26=>"validaData",
            27=>"validaCodigo",
            36=>"validaCodigoProtesto",
            40=>"codigoMoeda",
        ];
    }
    
    public function segmentoQ() {
        return [
            1=>[3, 'num'],
            2=>[4, 'num'],
            3=>[1, 'num'],
            4=>[5, 'num'],
            5=>[1, 'texto'],
            6=>[1, 'texto'],
            7=>[2, 'num'],
            8=>[1, 'num'],
            9=>[15, 'num'],
            10=>[40, 'texto'],
            11=>[40, 'texto'],
            12=>[15, 'texto'],
            13=>[5, 'num'],
            14=>[3, 'num'],
            15=>[15, 'texto'],
            16=>[1, 'texto'],
            17=>[30, 'texto'],
            18=>[40, 'texto'],
            19=>[40, 'texto'],
            20=>[8, 'num'],
            21=>[8, 'num'],
            22=>[8, 'texto'],
        ];
    }
    
    public function segmentoQDefault() {
        return [
            1=>756,
            3=>3,
            5=>"Q",
        ];
    }
    
    public function segmentoQValidacao() {
        return [
            7=>"validaMovimentoRemessa",
            8=>"validaOpcao1e2",
            13=>"validaCep",
            16=>"validaUf",
            17=>"validaOpcao1e2",
        ];
    }
    
    public function segmentoR() {
        return [
            1=>[3, 'num'],
            2=>[4, 'num'],
            3=>[1, 'num'],
            4=>[5, 'num'],
            5=>[1, 'texto'],
            6=>[1, 'texto'],
            7=>[2, 'num'],
            8=>[1, 'num'],
            9=>[8, 'num'],
            10=>[13, 'num', 2],
            11=>[1, 'num'],
            12=>[8, 'num'],
            13=>[13, 'num', 2],
            14=>[10, 'texto'],
            15=>[8, 'num'],
            16=>[13, 'num', 2],
            17=>[10, 'texto'],
            18=>[40, 'texto'],
            19=>[40, 'texto'],
            20=>[20, 'texto'],
            21=>[8, 'num'],
            22=>[3, 'num'],
            23=>[5, 'num'],
            24=>[1, 'texto'],
            25=>[12, 'num'],
            26=>[1, 'texto'],
            27=>[1, 'texto'],
            28=>[1, 'num'],
            29=>[9, 'texto'],
        ];
    }
    
    public function segmentoRDefault() {
        return [
            1=>756,
            3=>3,
            5=>"R",
            21=>00000000,
            22=>000,
            23=>00000,
            25=>00000000000000,
            28=>0
        ];
    }
    
    public function segmentoRValidacao() {
        return [
            7=>"validaMovimentoRemessa",
            8=>"validaCodigo",
            11=>"validaCodigo",
            14=>"validaCodigo",
        ];
    }
    
    public function traillerLote() {
        return [
            1=>[3, 'num'],
            2=>[4, 'num'],
            3=>[1, 'num'],
            4=>[9, 'texto'],
            5=>[6, 'num'],
            6=>[6, 'num'],
            7=>[15, 'num', 2],
            8=>[6, 'num'],
            9=>[15, 'num', 2],
            10=>[6, 'num'],
            11=>[15, 'num', 2],
            12=>[6, 'num'],
            13=>[15, 'num', 2],
            14=>[8, 'texto'],
            15=>[117, 'texto'],
        ];
    }
    
    public function traillerLoteDefault() {
        return [
            1=>756,
            3=>5,
        ];
    }
    
    public function traillerLoteValidacao(){
        return [];
    }


    public function traillerArquivo() {
        return [
            1=>[3, 'num'],
            2=>[4, 'num'],
            3=>[1, 'num'],
            4=>[9, 'texto'],
            5=>[6, 'num'],
            6=>[6, 'num'],
            7=>[6, 'num'],
            8=>[205, 'texto'],
        ];
    }
    
    public function traillerArquivoDefault() {
        return [
            1=>756,
            4=>9999,
            8=>9,
            30=>000000,
        ];
    }
    
    public function traillerArquivoValidacao(){
        return [];
    }
}
