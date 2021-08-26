<?php
session_start();
include('config/database.php');
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
        <section>
            <div>
            <img src="https://spinninrecords.com/media/cache/release_thumbnail/uploads/media/releases/0001/16/thumb_24c11ea71b180b92_releases_listed.jpeg" title="Turn Off My Mind" alt="Turn Off My Mind" style="width: 350px; height:350px;">
            <a href="boutique fnac"></a>
            <?php if(isset($_SESSION['username']) && isset($_SESSION['username']) != '')
                echo '<button>Ajouter en favori</button>'
            ?>
            <button>Mettre en favori</button>    
        </div>
        
            <p>Nom evenement</p>
            <p>Date debut - Date fin </p>
            <p>adresse</p>
        </section>
    </div>
</body>

</html>