<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$instancia = new Arquivo\Arquivo();
$dados = [1 => 756,
    2 => 0,
    3 => 0,
    4 => "",
    5 => 1,
    6 => 4848725160,
    7 => "",
    8 => 5678,
    9 => "m",
    10 => 234654976213,
    11 => 9,
    12 => "m",
    13 => "CenterSis",
    14 => "SICOOB",
    15 => "",
    16 => 1,
    17 => 11122018,
    18 => 141020,
    19 => 234567,
    20 => 81,
    21 => 00000,
    22 => "",
    23 => "",
    24 => "",
];
$saida = $instancia->gerar("Cnab240", "Sicoob081", $dados);
echo "<pre>";
print_r($saida);
echo "Hello";

