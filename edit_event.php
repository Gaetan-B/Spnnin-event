<?php
session_start();

require_once "config/pdo.php";

$article[] = 0;
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateInputs($inputs)
{
    $errors = [];
    if (empty($inputs["adresse"])) {
        $errors["adresse"] = "Adresse requise";
    }
    if (empty($inputs["champ_libre"])) {
        $errors["champ_libre"] = "Champ libre requis";
    }
    if (empty($inputs["lien_fnac"])) {
        $errors["lien_fnac"] = "Lien vers la boutique fnac requis";
    }
    if (empty($inputs["video_yt"])) {
        $errors["video_yt"] = "Lien vers la video youtube requis";
    }
    if (empty($inputs["date_debut"])) {
        $errors["date_debut"] = "Date de début requise";
    }
    if (empty($inputs["date_fin"])) {
        $errors["date_fin"] = "Date de fin requise";
    }
    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $validations = validateInputs($_POST);

    $article = [
        "nom" => $_POST["nom"],
        "adresse" => $_POST["adresse"],
        "champ_libre" => $_POST["champ_libre"],
        "lien_fnac" => $_POST["lien_fnac"],
        "video_yt" => $_POST["video_yt"],
        "date_debut" => $_POST["date_debut"],
        "date_fin" => $_POST["date_fin"]
    ];

    if (sizeof($validations) === 0) {

        /* $target_dir = "./assets/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $article["image"] = $target_file; */

        function prepareInsertArticle($connection)
        {
            //echo $connection;
            $query = "UPDATE event(nom, adresse, champ_libre, lien_fnac, video_yt, date_debut, date_fin) SET('".$_POST['nom']."', '".$_POST['adresse']."', '".$_POST['champ_libre']."', '".$_POST['lien_fnac']."', '".$_POST['video_yt']."', '".$_POST['date_debut']."', '".$_POST['date_fin']."')";
            $stmt = $connection->prepare($query);
            //$stmt -> execute();
            return $stmt;
        };

        function executeInsertArticle($stmt, $article)
        {
            $stmt->execute($article);
        };

        try {;
            $stmt = prepareInsertArticle($db_default_connection);            
            executeInsertArticle($stmt, $article);
            echo "ok";
            header("location:admin.php");
        } catch (PDOException $ex) {
            echo "ko";
        };
    } else {
        print_r($validations);
    }
};

    try {
        $sql = 'SELECT * FROM event WHERE ID = '.$_GET['id'];
    
        $stmt = $db_default_connection->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not connect to the database $db_name :" . $e->getMessage());
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spinnin'Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require "header.php" ?>
    <h1>Edition d'un article</h1>
    
    <?php while ($event = $stmt->fetch()): ?>
    <form action="create_event.php" method="post" class="<?= isset($validations) ? "was-validated" : '' ?>" enctype="multipart/form-data">

        <div class="form-group">
            <label>nom
                <input class="form-control" type="text" name="nom" placeholder="nom" maxlength="50" value="<?php echo htmlspecialchars($event['nom']) ?>">
            </label>
            <?php if (isset($validations) && isset($validations["nom"])) : ?>
                <p><?= $validations["nom"] ?></p>
            <?php endif; ?>
        </div>  

        <div class="form-group">
            <label>Adresse
                <input class="form-control" type="text" name="adresse" placeholder="adresse" maxlength="50" value="<?php echo htmlspecialchars($event['adresse']) ?>">
            </label>
            <?php if (isset($validations) && isset($validations["adresse"])) : ?>
                <p><?= $validations["adresse"] ?></p>
            <?php endif; ?>
        </div>             

        <div class="form-group">
            <label>Champ libre
                <textarea class="form-control" name="champ_libre" maxlength="1000" value="<?php echo htmlspecialchars($event['champ_libre']) ?>"></textarea>
            </label>
            <?php if (isset($validations) && isset($validations["champ_libre"])) : ?>
                <p><?= $validations["champ_libre"] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Lien vers la boutique fnac
                <input type="url" class="form-control" name="lien_fnac" maxlength="1000" value="<?php echo htmlspecialchars($event['lien_fnac']) ?>"></input>
            </label>
            <?php if (isset($validations) && isset($validations["lien_fnac"])) : ?>
                <p><?= $validations["lien_fnac"] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Lien vers la video youtube
                <input type="url" class="form-control" name="video_yt" maxlength="1000" value="<?php echo htmlspecialchars($event['video_yt']) ?>"></input>
            </label>
            <?php if (isset($validations) && isset($validations["video_yt"])) : ?>
                <p><?= $validations["video_yt"] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Date de début
                <input type="date" class="form-control" name="date_debut" maxlength="1000" value="<?php echo htmlspecialchars($event['date_debut']) ?>"></input>
            </label>
            <?php if (isset($validations) && isset($validations["date_debut"])) : ?>
                <p><?= $validations["date_debut"] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Date de fin
                <input type="date" class="form-control" name="date_fin" maxlength="50" value="<?php echo htmlspecialchars($event['date_fin']) ?>"></input>
            </label>
            <?php if (isset($validations) && isset($validations["date_fin"])) : ?>
                <p><?= $validations["date_fin"] ?></p>
            <?php endif; ?>
        </div>



        <!-- <div class="mb-3">
            <label for="formFile" class="form-label">Image de l'event</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div> -->

        <input type="submit" value="Save" class="btn btn-primary">

    </form>
    <?php endwhile; ?>
</body>

</html>