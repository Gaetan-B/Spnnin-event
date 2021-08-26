<header class="p-3 bg-black text-white">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none ms-5">
          <img src="assets/logo.jpg" alt="" style="width:50px; height:50px;">
          <h1 class="font-nimbus fw-bold fs-3 my-1">Spinnin'Events</h1>
        </a>

        <div class="text-end me-5">
          <a <?php if(isset($_SESSION['username'])) echo " style='display: none;'"; ?>href="login.php" class="btn btn-outline-light me-2">Se connecter</a>
          <a <?php if(isset($_SESSION['username'])) echo " style='display: none;'"; ?>href="signup.php" class="btn btn-outline-light">S'enregistrer</a>
            
            <a <?php if(!isset($_SESSION['username'])) echo " style='display: none;'"; ?>href='index.php?deconnexion=true' class="btn btn-outline-light"><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:login.php");
                   }
                }
                else if(isset($_SESSION['username']) !== ""){
                    $user = isset($_SESSION['username']);
                }
            ?>
            
          <?php 
            if(isset($_SESSION['ID']) && $_SESSION['ID'] === 0) {
              echo '<a href="admin.php" class="btn btn-outline-light">Interface admin</a>';
            }
          ?>
        </div>
      </div>
</header>  