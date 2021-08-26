<?php
session_start();
include('config/pdo.php');

try {
    $sql = 'SELECT * FROM event WHERE ID = '.$_GET['id'];

    $stmt = $db_default_connection->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $db_name :" . $e->getMessage());
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spinnin'Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php require_once('header.php'); ?>
        <?php while ($event = $stmt->fetch()): ?>
        <section class="row mt-5">
            <div class="col-4 d-flex flex-column ms-5">
            <img src="https://spinninrecords.com/media/cache/release_thumbnail/uploads/media/releases/0001/16/thumb_24c11ea71b180b92_releases_listed.jpeg" title="Turn Off My Mind" alt="Turn Off My Mind" style="width: 500px; height:500px;">
            <a href="boutique fnac"></a>
            <?php if(isset($_SESSION['username']) && isset($_SESSION['username']) != '')
                echo '<button class="btn btn-outline-dark mt-3" style="width:500px">Ajouter en favori</button>'
            ?>
            <a href="<?php echo $event['video_yt']; ?>" class="btn btn-outline-danger mt-3" style="width:500px">Teaser Youtube</a>    
            <a href="<?php echo $event['lien_fnac']; ?>" class="btn btn-outline-warning mt-3" style="width:500px">Acheter un ticket</a>    
            </div>
            <div class="col">
            <p class="fs-1"><?php echo $event['nom']; ?></p>
            <p class="fs-2"><?php echo $event['date_debut'].' - '.$event['date_fin']; ?></p>
            <p class="fs-2"><?php echo $event['adresse']; ?></p>
            <p class="fs-3"><?php echo $event['champ_libre']; ?></p>
            </div>
        </section>
        <?php endwhile; ?>
    </div>
</body>

</html>