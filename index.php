<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$instanciaAgz = new Agz\Agz();
$segmentoA = [1 => "A",
        2 => 20,
        3 => "66775849384",
        4 => "CenterSis",
        5 => 789,
        6 => "Sicoob",
        7 => 8092018,
        8 => 234567,
        9 => 02,
        10 => "Futuro",
    ];
$instanciaAgz->setSegmentoA($segmentoA);
$segmentoG1 = [1 => "G",
        2 => "456719209484",
        3 => "20030405",
        4 => "20170302",
        5 => "4982375982364987384",
        6 => 460000,
        7 => 20000,
        8 => 1234,
        9 => "6759",
        10 => 1,
        11 => "1",
        12 => 3,
        13 => "Debito",
    ];
$instanciaAgz->setSegmentoG($segmentoG1);
$segmentoG2 = [1 => "G",
        2 => "764875698",
        3 => "20042012",
        4 => "05022018",
        5 => "378756878565356",
        6 => 890000,
        7 => 3000,
        8 => 456,
        9 => "768",
        10 => 2,
        11 => "2",
        12 => 3,
        13 => "Credito",];
$instanciaAgz->setSegmentoG($segmentoG2);
$segmentoZ = [1 => "Z",
        2 => 432156,
        3 => 540000,
        4 => "Futuro",
    ];
$instanciaAgz->setSegmentoZ($segmentoZ);

$instanciaCnab240 = new \Cnab240\Cnab240();
$headerArquivo = [1 => 756,
        2 => 0,
        3 => 0,
        4 => "",
        5 => 1,
        6 => 4848725160,
        7 => "",
        8 => 5678,
        9 => "1",
        10 => 234654976213,
        11 => 9,
        12 => "a",
        13 => "áõê!+@",
        14 => "SICOOB",
        15 => "",
        16 => 1,
        17 => 1122018,
        18 => 141020,
        19 => 234567,
        20 => 81,
        21 => 00000,
        22 => "",
        23 => "",
        24 => "",
    ];
$instanciaCnab240->setHeaderArquivo($headerArquivo);
$headerLote = [1 => 756,
        2 => 0001,
        3 => 1,
        4 => "r",
        5 => 01,
        6 => "",
        7 => 040,
        8 => "",
        9 => 1,
        10 => 234654976,
        11 => "",
        12 => 56,
        13 => "a",
        14 => 33456,
        15 => "e",
        16 => "p",
        17 => "CenterSis",
        18 => "Não pagar após o vencimento",
        19 => "Imprimir em folha A4",
        20 => 56781234,
        21 => 78942163,
        22 => 00000000,
        23 => "",
    ];
$instanciaCnab240->setHeaderLote($headerLote);

$segmentoP = [1 => 756,
        2 => 0001,
        3 => 3,
        4 => 00001,
        5 => "P",
        6 => "",
        7 => 10,
        8 => 5678,
        9 => "1",
        10 => 234654976213,
        11 => "j",
        12 => "a",
        13 => "15",
        14 => 2,
        15 => 0,
        16 => "",
        17 => 2,
        18 => "1",
        19 => "3456789012",
        20 => 9012019,
        21 => 23456,
        22 => 00000,
        23 => "q",
        24 => 11,
        25 => "A",
        26 => 20042014,
        27 => 0,
        28 => 20072019,
        29 => 1,
        30 => 0,
        31 => 25112019,
        32 => 13,
        33 => 15,
        34 => 17,
        35 => "Titulo",
        36 => 1,
        37 => 15,
        38 => 0,
        39 => "",
        40 => 20,
        41 => 00000000,
        42 => "",
    ];
$instanciaCnab240->setSegmentoP($segmentoP);

$segmentoQ = [1 => 756,
        2 => 0001,
        3 => 3,
        4 => 00001,
        5 => "q",
        6 => "",
        7 => 01,
        8 => 1,
        9 => 12345,
        10 => "Nome",
        11 => "Rua comandante balduino",
        12 => "Centro",
        13 => 78200,
        14 => 000,
        15 => "caceres",
        16 => "mt",
        17 => 1,
        18 => 8347578,
        19 => "José",
        20 => 237,
        21 => "000",
        22 => "",
    ];
$instanciaCnab240->setSegmentoQ($segmentoQ);

$saida = $instanciaCnab240->gerar("Sicoob081");
echo "<pre>";
print_r($saida);
echo "Hello";
