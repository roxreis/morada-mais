<?php 

include_once 'db/conPDO.php';

    $tabela = $_GET['table'];

    setlocale(LC_MONETARY, 'pt_BR');

    $statement = $connect->prepare("SELECT * FROM $tabela");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode($results);

    print_r($json);


