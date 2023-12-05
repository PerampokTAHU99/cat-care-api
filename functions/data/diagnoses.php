<?php
require_once 'functions/auth.php';

function getDiagnoseById($params) {
    $idDiagnose = $params['id'];

    $query = mysqli_query(
        Config::$link,
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

    return Response::success($result);
}

function getAllDiagnose() {
    auth();

    if ($_SESSION['roleId'] == 4002) {
        $query = mysqli_query(
            Config::$link,
            "SELECT * FROM diagnoses"
        );
    }
    else {
        $query = mysqli_query(
            Config::$link,
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

    return Response::success($result);
}

?>
