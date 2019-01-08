<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$instanciaAgz = new Agz\Agz();
$segmentoA = [1 => "",
        2 => 20,
        3 => "66775849384",
        4 => "CenterSis",
        5 => 789,
        6 => "Sicoob",
        7 => null,
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
        2 => null,
        3 => null,
        4 => "Futuro",
    ];
$instanciaAgz->setSegmentoZ($segmentoZ);

$instanciaCnab240 = new \Cnab240\Cnab240();
$headerArquivo = [1 =>756,
        2 => 0000,
        3 => 0,
        4 => "",
        5 => 2,
        6 => 37455649000107,
        7 => "",
        8 => 4425,
        9 => " ",
        10 => 2758,
        11 => 8,
        12 => "",
        13 => "Centersis Tecnologia da Informação LTDA - ME",
        14 => "Sicoob",
        15 => "",
        16 => 1,
        17 => 7012019,
        18 => 154422,
        19 => 49,
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
        4 => "R",
        5 => 01,
        6 => "",
        7 => '040',
        8 => "",
        9 => 2,
        10 => 37455649000107,
        11 => null,
        12 => 4425,
        13 => null,
        14 => 2758,
        15 => "8",
        16 => "",
        17 => "Centersis Tecnologia da Informação LTDA - ME",
        18 => null,
        19 => null,
        20 => 49,
        21 => '07012019',
        22 => "00000000",
        23 => "",
    ];
$instanciaCnab240->setHeaderLote($headerLote);

$segmentoP1 = [1 => 756,
        2 => 0001,
        3 => 3,
        4 => 00001,
        5 => "P",
        6 => "",
        7 => 01,
        8 => 4425,
        9 => "",
        10 => 2758,
        11 => "8",
        12 => "",
        13 => "000002132001014",
        14 => 1,
        15 => 0,
        16 => "",
        17 => 2,
        18 => 2,
        19 => "1190",
        20 => 22012019,
        21 => 153.25,
        22 => 00000,
        23 => "",
        24 => 02,
        25 => "A",
        26 => 7012019,
        27 => 2,
        28 => 22012019,
        29 => 100,
        30 => 0,
        31 => null,
        32 => null,
        33 => null,
        34 => null,
        35 => "BOLETO TESTE PARCELA UNICA",
        36 => 1,
        37 => 0,
        38 => 0,
        39 => "",
        40 => 9,
        41 => 00000000,
        42 => "",
    ];
$instanciaCnab240->setSegmentoP($segmentoP1);

$segmentoQ1 = [1 => 756,
        2 => 0001,
        3 => 3,
        4 => 00002,
        5 => "q",
        6 => "",
        7 => 01,
        8 => 2,
        9 => 4405007000144,
        10 => "Grande Loja Maçonica do Amazonas - GLOMA",
        11 => "Av. Prof Nilton Lins",
        12 => "Parque das Laranjeiras - Flores",
        13 => 69058,
        14 => '030',
        15 => "Manaus",
        16 => "AM",
        17 => 2,
        18 => 37455649000107,
        19 => "CENTERSIS TECNOLOGIA DA INFORMACAO LTDA",
        20 => 000,
        21 => "",
        22 => "",
    ];
$instanciaCnab240->setSegmentoQ($segmentoQ1);

$segmentoR1 = [1 => 756,
        2 => 0001,
        3 => 3,
        4 => 00003,
        5 => "R",
        6 => "",
        7 => 01,
        8 => 0,
        9 => "0",
        10 => null,
        11 => 0,
        12 => 00000000,
        13 => null,
        14 => "2",
        15 => 22012019,
        16 => 200,
        17 => "",
        18 => "APOS VENCIMENTO COBRAR MULTA DE 2% + JUROS",
        19 => "",
        20 => "",
        21 => 00000000,
        22 => 000,
        23 => 00000,
        24 => "",
        25 => null,
        26 => "",
        27 => "",
        28 => 0,
        29 => "",
    ];
$instanciaCnab240->setSegmentoR($segmentoR1);

$traillerLote = [1 => 756,
        2 => 0001,
        3 => 5,
        4 => null,
        5 => 5,
        6 => null,
        7 => null,
        8 => null,
        9 => null,
        10 => null,
        11 => null,
        12 => "0",
        13 => null,
        14 => "",
        15 => "",
    ];
$instanciaCnab240->setTraillerLote($traillerLote);

$traillerArquivo = [1 => 756,
        2 => 9999,
        3 => 9,
        4 => "",
        5 => 1,
        6 => null,
        7 => 0,
        8 => "",
    ];
$instanciaCnab240->setTraillerArquivo($traillerArquivo);
try{
    //$instanciaAgz->gerar("Agz02", "arquivoAgz02.txt");
    $instanciaCnab240->gerar("Sicoob081", "arquivoSicoob081.txt");
echo "Arquivo Gerado";
} catch (\Exception $ex) {
    echo "Erro: ".$ex->getMessage();
}

