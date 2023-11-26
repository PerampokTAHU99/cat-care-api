<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../auth.php';

function getDiagnoseById($params) {
    global $link;

    $idDiagnose = $params['id'];

    $query = mysqli_query(
        $link,
        "SELECT * FROM diagnoses WHERE idDiagnose = " . $idDiagnose
    );

    $result = array();
    while ($row = $query -> fetch_assoc()) {
        $result = array (
            'idDiagnose' => $row['idDiagnose'],
            'date' => $row['date'],
            'idDisease ' => $row['idDisease'],
            'userId' => $row['userId']
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

function getAllDiagnose() {
    global $link;

    auth();

    if ($_SESSION['roleId'] == 4002) {
        $query = mysqli_query(
            $link,
            "SELECT * FROM diagnoses"
        );
    }
    else {
        $query = mysqli_query(
            $link,
            "SELECT * FROM diagnoses WHERE userid = {$_SESSION['userId']}"
        );
    }

    $result = array();
    while ($row = mysqli_fetch_array($query)) {
        array_push(
            $result,
            array(
                'idDiagnose' => $row['idDiagnose'],
                'date' => $row['date'],
                'idDisease ' => $row['idDisease'],
                'userId' => $row['userId']
            )
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

?>
