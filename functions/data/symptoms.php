<?php

function getSymptomById($params) {
    $idSymptom = $params['id'];
    
    $query = mysqli_query(
        Config::$link,
        "SELECT * FROM symptoms WHERE idSymptom = " . $idSymptom
    );

    $result = array();
    while ($row = $query -> fetch_assoc()) {
        $result = array (
            'idSymptom' => $row['idSymptom'],
            'codeOfSymptom' => $row['codeOfSymptom'],
            'descOfSymptom' => $row['descOfSymptom']
        );
    }

    return Response::success($result);
}

function getAllSymptom() {
    $query = mysqli_query(
        Config::$link,
        "SELECT * FROM symptoms ORDER BY descOfSymptom"
    );

    $result = array();
    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'idSymptom' => $row['idSymptom'],
            'codeOfSymptom' => $row['codeOfSymptom'],
            'descOfSymptom' => $row['descOfSymptom']
        ));
    }

    return Response::success($result);
}

?>
