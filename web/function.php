<?php
//connection db
$link = mysqli_connect("cat-care.my.id", "devel", "", "catcare-db");
// $link = mysqli_connect("localhost", "root", "", "catcare-db");

if (!$link) {
    die("Koneksi dengan database gagal : " . mysqli_connect_error() . " - " . mysqli_connect_error());
}

//add new admin
if (isset($_POST['addNewAdmin'])) {
    global $link;
    $nameAdmin = $_POST['nameAdmin'];
    $usernameAdmin = $_POST['usernameAdmin'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $addToTable = mysqli_query($link, "INSERT INTO users (name, username, email, password, roleId) VALUES ('$nameAdmin','$usernameAdmin','$email','$password','4001')");
    if ($addToTable) {
        echo "
        <script>
        window.location = 'admin/page-admin.php';
        </script>
        ";
    } else {
        echo 'gagal';
        echo "
        <script>
            window.location = 'admin/page-admin.php';
        </script>
        ";
    }
}

//Update info admin
if (isset($_POST['updateAdmin'])) {
    global $link;

    $userId = $_POST['userId'];
    $nameAdmin = $_POST['nameAdmin'];
    $usernameAdmin = $_POST['usernameAdmin'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $update = mysqli_query($link, "UPDATE users SET name = '$nameAdmin', username = '$usernameAdmin', email= '$email' , password = '$password' WHERE userId = '$userId'");
    if ($update) {
        header('location:admin/page-admin.php');
    } else {
        echo 'gagal';
        header('location:admin/page-admin.php');
    }
}

//delete admin
if (isset($_POST['deleteAdmin'])) {
    global $link;

    $userId = $_POST['userId'];
    $delete = mysqli_query($link, "DELETE FROM users WHERE userId = '$userId'");
    if ($delete) {
        header('location:admin/page-admin.php');
    } else {
        echo 'gagal';
        header('location:admin/page-admin.php');
    }
}

//add new Doctors
if (isset($_POST['addNewDoctor'])) {
    global $link;
    $nameDoctor = $_POST['nameDoctor'];
    $usernameDoctor = $_POST['usernameDoctor'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $addToTable = mysqli_query($link, "INSERT INTO users (name, username, email, password, roleId) VALUES ('$nameDoctor','$usernameDoctor','$email','$password','4002')");
    if ($addToTable) {
        echo "
        <script>
        window.location = 'admin/page-doctor.php';
        </script>
        ";
    } else {
        echo 'gagal';
        echo "
        <script>
            window.location = 'admin/page-doctor.php';
        </script>
        ";
    }
}

//Update info doctor
if (isset($_POST['updateDoctor'])) {
    global $link;

    $userId = $_POST['userId'];
    $nameDoctor = $_POST['nameDoctor'];
    $usernameDoctor = $_POST['usernameDoctor'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $update = mysqli_query($link, "UPDATE users SET name = '$nameDoctor', username = '$usernameDoctor', email= '$email' , password = '$password' WHERE userId = '$userId'");
    if ($update) {
        header('location:admin/page-doctor.php');
    } else {
        echo 'gagal';
        header('location:admin/page-doctor.php');
    }
}

//delete doctor
if (isset($_POST['deleteDoctor'])) {
    global $link;

    $userId = $_POST['userId'];
    $delete = mysqli_query($link, "DELETE FROM users WHERE userId = '$userId'");
    if ($delete) {
        header('location:admin/page-doctor.php');
    } else {
        echo 'gagal';
        header('location:admin/page-doctor.php');
    }
}

//add new user
if (isset($_POST['addNewUser'])) {
    global $link;
    $nameUser = $_POST['nameUser'];
    $usernameUser = $_POST['usernameUser'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $addToTable = mysqli_query($link, "INSERT INTO users (name, username, email, password, roleId) VALUES ('$nameUser','$usernameUser','$email','$password','4003')");
    if ($addToTable) {
        echo "
        <script>
        window.location = 'admin/page-users.php';
        </script>
        ";
    } else {
        echo 'gagal';
        echo "
        <script>
            window.location = 'admin/page-users.php';
        </script>
        ";
    }
}

//Update info user
if (isset($_POST['updateUser'])) {
    global $link;

    $userId = $_POST['userId'];
    $nameUser = $_POST['nameUser'];
    $usernameUser = $_POST['usernameUser'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $update = mysqli_query($link, "UPDATE users SET name = '$nameUser', username = '$usernameUser', email= '$email' , password = '$password' WHERE userId = '$userId'");
    if ($update) {
        header('location:admin/page-users.php');
    } else {
        echo 'gagal';
        header('location:admin/page-users.php');
    }
}

//delete users
if (isset($_POST['deleteUser'])) {
    global $link;

    $userId = $_POST['userId'];
    $delete = mysqli_query($link, "DELETE FROM users WHERE userId = '$userId'");
    if ($delete) {
        header('location:admin/page-users.php');
    } else {
        echo 'gagal';
        header('location:admin/page-users.php');
    }
}

//add new symptom
if (isset($_POST['addNewSymptom'])) {
    global $link;
    $symptomsCode = $_POST['symptomsCode'];
    $symptomsDesc = $_POST['symptomsDesc'];

    $addToTable = mysqli_query($link, "INSERT INTO symptoms (codeOfSymptom, descOfSymptom) VALUES ('$symptomsCode','$symptomsDesc')");
    if ($addToTable) {
        echo "
        <script>
        window.location = 'doctor/page-symptoms.php';
        </script>
        ";
    } else {
        echo 'gagal';
        echo "
        <script>
            window.location = 'doctor/page-symptoms.php';
        </script>
        ";
    }
}

//Update info symptom
if (isset($_POST['updateSymptom'])) {
    global $link;

    $symptomsId = $_POST['symptomsId'];
    $symptomsCode = $_POST['symptomsCode'];
    $symptomsDesc = $_POST['symptomsDesc'];

    $update = mysqli_query($link, "UPDATE symptoms SET codeOfSymptom = '$symptomsCode', descOfSymptom = '$symptomsDesc' WHERE idSymptom = '$symptomsId'");
    if ($update) {
        header('location:doctor/page-symptoms.php');
    } else {
        echo 'gagal';
        header('location:doctor/page-symptoms.php');
    }
}

//delete Symptom
if (isset($_POST['deleteSymptom'])) {
    global $link;

    $symptomsId = $_POST['symptomsId'];
    $delete = mysqli_query($link, "DELETE FROM symptoms WHERE idSymptom = '$symptomsId'");
    if ($delete) {
        header('location:doctor/page-symptoms.php');
    } else {
        echo 'gagal';
        header('location:doctor/page-symptoms.php');
    }
}

//upload picture
function upload()
{
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/' . 'img/'; // Directory where you want to save the uploaded images
    $nameExt = explode('.', $_FILES["picture"]["name"]);
    $nameExt = end($nameExt);
    $nameFile = basename(time() . '.' . $nameExt);
    $targetFile = $targetDir . $nameFile;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the uploaded file is an actual image or a fake image
    if (isset($_FILES["picture"])) {
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "File already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["picture"]["size"] > 5000000) {
        echo "File is too large.";
        $uploadOk = 0;
    }

    // Allow only specific image file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "File was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile)) {
            return $nameFile;
        } else {
            echo "There was an error uploading the file.";
        }
    }
}

//add new disease
if (isset($_POST['addNewDisease'])) {
    global $link;
    $codeDisease = $_POST['diseasesCode'];
    $nameDisease = $_POST['diseasesName'];
    $latinDisease = $_POST['diseasesLatin'];
    $pictureDisease = $_FILES['picture'];
    $descDisease = $_POST['Desc'];
    $precautionDisease = $_POST['Precation'];
    $solutionDisease = $_POST['Solution'];

    //upload picture
    $picture = upload(); 

    $addToTable = mysqli_query($link, "INSERT INTO diseases (codeOfDisease, nameOfDisease, latinNameOfDisease, picture, description, precaution, solution) VALUES ('$codeDisease','$nameDisease','$latinDisease','$picture','$descDisease','$precautionDisease','$solutionDisease')");
    if ($addToTable) {
        echo "
        <script>
        window.location = 'doctor/page-diseases.php';
        </script>
        ";
    } else {
        echo 'gagal';
        echo "
        <script>
            window.location = 'doctor/page-diseases.php';
        </script>
        ";
    }
}

//Update info disease
if (isset($_POST['updateDisease'])) {
    global $link;

    $diseasesId = $_POST['diseasesId'];
    $diseasesCode = $_POST['diseasesCode'];
    $diseasesName = $_POST['diseasesName'];
    $diseasesLatin = $_POST['diseasesLatin'];
    $pictureDisease = $_FILES['picture'];
    $diseasesDesc = $_POST['diseasesDesc'];
    $diseasesPre = $_POST['diseasesPre'];
    $diseasesSol = $_POST['diseasesSol'];
    
    //upload picture
    if($pictureDisease['full_path'] != '') {
        $picture = upload(); 
        
        $update = mysqli_query($link, "UPDATE diseases SET codeOfDisease = '$diseasesCode', nameOfDisease = '$diseasesName', latinNameOfDisease = '$diseasesLatin', picture = '$picture', description = '$diseasesDesc', precaution = '$diseasesPre', solution = '$diseasesSol' WHERE idDisease = '$diseasesId'");
    }else{
        $update = mysqli_query($link, "UPDATE diseases SET codeOfDisease = '$diseasesCode', nameOfDisease = '$diseasesName', latinNameOfDisease = '$diseasesLatin', description = '$diseasesDesc', precaution = '$diseasesPre', solution = '$diseasesSol' WHERE idDisease = '$diseasesId'");
    }

    if ($update) {
        header('location:doctor/page-diseases.php');
    } else {
        echo 'gagal';
        header('location:doctor/page-diseases.php');
    }
}

//delete diseases
if (isset($_POST['deleteDisease'])) {
    global $link;

    $diseasesId = $_POST['idDiseases'];
    $delete = mysqli_query($link, "DELETE FROM diseases WHERE idDisease = '$diseasesId'");
    if ($delete) {
        header('location:doctor/page-diseases.php');
    } else {
        echo 'gagal';
        header('location:doctor/page-diseases.php');
    }
}

function countUsers($roleId){
    global $link;
    $countAdmin = mysqli_query($link,"SELECT COUNT(roleId) AS usersCount FROM users WHERE roleId = $roleId;");
    return mysqli_fetch_assoc($countAdmin)['usersCount'];
}

function countExpertSystem($expertSystem){
    global $link;
    $count = 0;
    if($expertSystem == "disease") {
        $count = mysqli_query($link,"SELECT COUNT(idDisease) as count FROM diseases");
    }else if($expertSystem == 'symptom') {
        $count = mysqli_query($link,"SELECT COUNT(idSymptom) as count FROM symptoms");
    }else if($expertSystem == "rule"){
        $count = mysqli_query($link,"SELECT COUNT(rulesId) as count FROM rules");
    }else if($expertSystem == "diagnose"){
        $count = mysqli_query($link,"SELECT COUNT(idDiagnose) as count FROM diagnoses");
    }
    
    return mysqli_fetch_assoc($count)['count'];
}

//add new rule
if (isset($_POST['addNewRule'])) {
    global $link;
    $idDisease  = $_POST['thisIdDiseases'];
    $idSymptom  = $_POST['thisIdSymptoms'];

    $addToTable = mysqli_query($link, "INSERT INTO rules (idDisease, idSymptom) VALUES ('$idDisease','$idSymptom')");
    if ($addToTable) {
        echo "
        <script>
        window.location = 'doctor/page-rules.php';
        </script>
        ";
    } else {
        echo 'gagal';
        echo "
        <script>
            window.location = 'doctor/page-rules.php';
        </script>
        ";
    }
}

//delete rule
if (isset($_POST['deleteRules'])) {
    global $link;
    $idDisease  = $_POST['idDisease'];

    $delete = mysqli_query($link, "DELETE FROM rules WHERE idDisease = '$idDisease'");
    if ($delete) {
        header('location:doctor/page-rules.php');
    } else {
        echo 'gagal';
        header('location:doctor/page-rules.php');
    }
}

//delete diagnose
if (isset($_POST['deleteDiagnose'])) {
    global $link;
    $idDiagnose = $_POST['diagnoseId'];
    
    $delete = mysqli_query($link, "DELETE FROM diagnoses WHERE idDiagnose  = '$idDiagnose'");
    if ($delete) {
        header('location:doctor/page-diagnoses.php');
    } else {
        echo 'gagal';
        header('location:doctor/page-diagnoses.php');
    }
}