<?php
require_once __DIR__ . '/../../config.php';

function getDiseaseById($params) {
    global $link;

    $idDisease = $params['id'];

    $query = mysqli_query(
        $link,
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

    header('Content-Type: application/json', true, 200);
    echo json_encode(
        array(
            'status' => 200,
            'message' => "Success",
            'result' => $result
        )
    );
}

function getAllDisease() {
    global $link;

    $query = mysqli_query($link, "SELECT * FROM diseases");

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

    header('Content-Type: application/json', true, 200);
    echo json_encode(
        array(
            'status' => 200,
            'message' => "Success",
            'result' => $result
        )
    );
}

?>
