<?php
require_once 'functions/auth.php';

function getDiagnoseById($params) {
    $idDiagnose = $params['id'];

    $query = mysqli_query(
        Config::$link,
        "SELECT * FROM diagnoses WHERE idDiagnose = " . $idDiagnose
    );

    $result = $query->fetch_assoc();

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
    while ($row = $query->fetch_array()) {
        array_push(
            $result,
            [
                'idDiagnose' => $row['idDiagnose'],
                'date' => $row['date'],
                'idDisease ' => $row['idDisease'],
                'userId' => $row['userId']
            ]
        );
    }

    return Response::success($result);
}

function createDiagnose() {
    auth();

    $postData = Request::$body;

    if (!isset($postData['symptoms'])) {
        return Response::error('Harap masukkan list symptoms.');
    }

    $symptoms = $postData['symptoms'];

    $SqlDisease = mysqli_query(Config::$link, "SELECT idDisease FROM rules GROUP BY idDisease");

    $groupDisease = [];
    foreach($SqlDisease as $item) {
        $groupDisease[] = $item["idDisease"];
    }

    $arr = [];
    foreach ($groupDisease as $item) {
        $sqlSymptom = mysqli_query(
            Config::$link,
            "SELECT idSymptom FROM rules WHERE idDisease = $item"
        );

        foreach($sqlSymptom as $val) {
            $arr[$item][] = $val['idSymptom'];
        }
    }

    $res = false;
    foreach($arr as $key => $val) {
        $result = array_diff($symptoms, $val);

        if(!count($result)) {
            $res = $key;
            break;
        }
    }

    if (!$res) {
        return Response::error("Hasil diagnosa tidak ada.", 404);
    }

    $diagnoseResult = mysqli_query(
        Config::$link,
        "SELECT * FROM diseases WHERE idDisease = {$res}"
    )->fetch_assoc();

    mysqli_query(
        Config::$link,
        "INSERT INTO diagnoses (idDisease, userId)
         VALUES({$diagnoseResult['idDisease']}, {$_SESSION['userId']})"
    );

    return Response::success($diagnoseResult);
}

?>
