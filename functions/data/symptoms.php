<?php
require_once __DIR__ . '/../../config.php';

function getSymptomById($params) {
    global $link;

    $idSymptom = $params['id'];
    
    $query = mysqli_query(
        $link,
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

    header('Content-Type: application/json', true, 200);
    echo json_encode(
        array(
            'status' => 200,
            'message' => "Success",
            'result' => $result
        )
    );

    exit;
}

function getAllSymptom() {
    global $link;

    $query = mysqli_query($link, "SELECT * FROM symptoms");

    $result = array();
    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'idSymptom' => $row['idSymptom'],
            'codeOfSymptom' => $row['codeOfSymptom'],
            'descOfSymptom' => $row['descOfSymptom']
        ));
    }

    header('Content-Type: application/json', true, 200);
    echo json_encode(
        array(
            'status' => 200,
            'message' => "Success",
            'result' => $result
        )
    );

    exit;
}

?>
