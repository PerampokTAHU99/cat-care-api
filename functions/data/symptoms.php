<?php

function getSymptomById($params) {
    $idSymptom = $params['id'];
    
    $query = mysqli_query(
        Config::$link,
        "SELECT * FROM symptoms WHERE idSymptom = " . $idSymptom
    );

    $result = $query->fetch_assoc();

    return Response::success($result);
}

function getAllSymptom() {
    $query = mysqli_query(
        Config::$link,
        "SELECT * FROM symptoms ORDER BY descOfSymptom"
    );

    $result = array();
    while ($row = $query->fetch_array()) {
        array_push(
            $result,
            [
                'idSymptom' => $row['idSymptom'],
                'codeOfSymptom' => $row['codeOfSymptom'],
                'descOfSymptom' => $row['descOfSymptom']
            ]
        );
    }

    return Response::success($result);
}

?>
