<?php

function getDiseaseById($params) {
    $idDisease = $params['id'];

    $query = mysqli_query(
        Config::$link,
        "SELECT * FROM diseases WHERE idDisease = " . $idDisease
    );

    while ($row = $query->fetch_assoc()) {
        $result = array(
            'idDisease' => $row['idDisease'],
            'codeOfDisease' => $row['codeOfDisease'],
            'nameOfDisease' => $row['nameOfDisease'],
            'latinNameOfDisease' => $row['latinNameOfDisease'],
            'picture' => $row['picture'],
            'description' => $row['description'],
            'precaution' => $row['precaution'],
            'solution' => $row['solution'],
        );
    }

    return Response::success($result);
}

function getAllDisease() {
    $query = mysqli_query(
        Config::$link,
        "SELECT * FROM diseases ORDER BY nameOfDisease"
    );

    $result = array();
    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'idDisease' => $row['idDisease'],
            'codeOfDisease' => $row['codeOfDisease'],
            'nameOfDisease' => $row['nameOfDisease'],
            'latinNameOfDisease' => $row['latinNameOfDisease'],
            'picture' => $row['picture'],
            'description' => $row['description'],
            'precaution' => $row['precaution'],
            'solution' => $row['solution'],
        ));
    }

    return Response::success($result);
}

?>
