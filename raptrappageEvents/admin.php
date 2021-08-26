<?php
session_start();
    include('config/database.php')


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
    <div class="container">
        <?php require_once('header.php'); ?>
        <section>
            <a href="create_event.php">Créer un évenement</a>
        </section>
        <section class="site-container">
            <div class="row">
                <div class="col-12">
                    <div class="frame-items d-flex flex-wrap bootstrap-frame-fix">
                        <?php 
                            $sql = "SELECT * FROM event";

                            if($result = $db->query($sql)) {
                                while($event = $result->fetch_array()) {
                                    echo '<div class="col-6 col-md-4 col-lg-3">';
                                    echo '<a href="edit_event.php?id='.$event['ID'].'" style="text-decoration: none" data-category="release-item" class="SpinninInternalLink">';
                                    echo '<div class="card releaseLink-block bg-transparent border-transparent">';
                                    echo '<div class="card-img-top card-image-release ani position-relative small-shadow"><img src="https://spinninrecords.com/media/cache/release_thumbnail/uploads/media/releases/0001/16/thumb_24c11ea71b180b92_releases_listed.jpeg" title="Turn Off My Mind" alt="Turn Off My Mind" style="width: 350px; height:350px;"></div>';
                                    echo '<div class="card-text card-body-release my-2">';
                                    echo '<div class="card-text">';
                                    echo '<h2 class="text-uppercase">'.$event['nom'].'</h2><small class="font-italic font-weight-light">'.$event['date_debut'].' - '.$event['date_fin'].'</small>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</a>';
                                    echo '</div>';
                                }
                            }
                        ?>
                                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>