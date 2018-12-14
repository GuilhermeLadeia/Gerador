<?php
namespace Agz\Layout;

class Agz02 {
    
    public function segmentoA() {
        return [
            1=>[1, 'texto'],
            2=>[1, 'num'],
            3=>[20, 'texto'],
            4=>[20, 'texto'],
            5=>[3, 'num'],
            6=>[20, 'texto'],
            7=>[8, 'num'],
            8=>[6, 'num'],
            9=>[2, 'num'],
            10=>[69, 'texto'],
        ];
       
    }
    
    public function segmentoADefault(){
        return [
            1=>'A',
            7=>  date('Ymd'),
            9=>02,
        ];
    }


    public function segmentoG() {
        return [
            1=>[1, 'texto'],
            2=>[20, 'texto'],
            3=>[8, 'texto'],
            4=>[8, 'texto'],
            5=>[44, 'texto'],
            6=>[10, 'num'],
            7=>[5, 'num'],
            8=>[8, 'num'],
            9=>[8, 'texto'],
            10=>[1, 'num'],
            11=>[23, 'texto'],
            12=>[1, 'num'],
            13=>[9, 'texto'],
        ];
    }
    
    public function segmentoGDefault($param) {
        return [
            1=>'G',
        ];
    }
    
    public function segmentoZ() {
        return [
            1=>[1, 'texto'],
            2=>[6, 'num'],
            3=>[17, 'num'],
            4=>[126, 'texto'],
        ];
    }
    
    public function segmentoZDefault() {
        return [
            1=>'Z',
        ];
    }
}