<!-- Le Côté de PHP -->
<?php
    @include 'adminConnect.php';

    session_start();

    if(isset($_POST['submit'])){
        @$name = mysqli_real_escape_string($conn, $_POST['name']);
        @$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['pass']);
        @$pass2 = md5($_POST['pass2']);

        $select = " SELECT * FROM user_form WHERE email='$email' && pass = '$pass' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            header('location:accueil.php');
            // if($result) {
            //     header('location:accueil.php');
            // }else {
            //     $error[] = "Votre mot de pass ou votre email est incorrect !";
            // }

            
        }else {
            $error[] = "Votre mot de pass ou votre email est incorrect !";
        }
    };


?>

<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connection page</title>
    <!-- Le style de ma page connection  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="container">
        <div class="container-global">
            <!-- nom de la page -->
        <div class="name">
            <h1>Connection</h1>
        </div>
        <!-- bars -->
        <div class="bars"></div>

        <!-- nom de la formulaire -->
        <div class="form-container">
            <form class="form" action="" method="post">

            
            <?php
                if(isset($error)) {
                    foreach($error as $error) {
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };

                ?>
                <!-- côté email -->
                <label for="email">Votre Email</label> <br>
                <input style="margin-top: 5px;" type="email" id="email" autocomplete="off" name="email"  placeholder="nom@example.com" required >
                <span style="display: block; margin-bottom: 5px;" id="nom_manquant2"></span>
                
                <!-- côté motde passe -->
                <label for="pass">Mot de passe</label> <br>
                <input type="password" name="pass" required id="pass"  placeholder="*************">
                <span style="display: block; margin-top: 5px;" id="nom_manquant3"></span>
    
                <!-- côté inscription -->
                <div class="submit" >
                    <button class="btn_inscrire btnnnn" type="submit" name="submit"  id="submit" >Se connecter</button>
                </div>
                <!-- style de submit -->

                
            </form>
        </div>
        <div class="info-ins">
            <p>Avez vous déjâ un compte. <a href="inscription.php">Inscrivez-vous !</a></p>
        </div>

        </div>
    </div>
    <script src="script/valider/valider.js"></script>
</body>
</html>