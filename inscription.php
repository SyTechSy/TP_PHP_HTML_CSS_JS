<!-- Le Côté de PHP -->
<?php
    @include 'adminConnect.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['pass']);
        $pass2 = md5($_POST['pass2']);

        $select = " SELECT * FROM user_form WHERE email='$email' && pass = '$pass' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0) {
            $error[] = 'User n\'existe pas !';
        }else {

            if($pass != $pass2){
                $error[] = 'Mot de passe n\'est pas correct ! ';
            }else {
                $insert = " insert into user_form(name, prenom, email, pass) VALUES('$name', '$prenom', '$email', '$pass')";
                mysqli_query($conn, $insert);
                header('location:index.php');
            }
        }
    };


?>



<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP sur PHP et HTML/CSS et JavaScript</title>
    <!-- Le style de ma page inscription  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    
<div class="container">
        <div class="container-global">
            <!-- nom de la page -->
        <div class="name">
            <h1>Inscription</h1>
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
                <!-- côté name -->
                <label for="nom">Votre nom </label> <br>
                <input style="margin-top: 5px;" type="text" id="nom" required="required" name="name" placeholder="SY">
                <span style="display: block; margin-bottom: 5px;" id="nom_manquant"></span>
                
                <!-- côté prenom -->
                <label for="prenom">Votre prénom</label> <br>
                <input style="margin-top: 5px;" type="text" id="prenom" required="required" name="prenom" placeholder="Diakaridia" >
                <span style="display: block; margin-bottom: 5px;" id="nom_manquant1"></span>
    
                <!-- côté email -->
                <label for="mail">Email</label> <br>
                <input style="margin-top: 5px;" type="email" id="email" required="required" name="email" placeholder="nom@example.com" >
                <span style="display: block; margin-bottom: 5px;" id="nom_manquant2"></span>
                
                <!-- côté mot de passe -->
                <label for="pass">Mot de passe</label> <br>
                <input style="margin-top: 5px;" type="password" id="pass" required="required" name="pass" placeholder="**************" > <br>
                <span style="display: block; margin-bottom: 5px;" id="nom_manquant3"></span>
    
                <!-- côté mot de passe pour la confirmation-->
                <label for="pass2">Comfirm mot de passe</label> <br>
                <input style="margin-top: 5px;" type="password" id="pass2" required="required" name="pass2" placeholder="**************"  > <br>
                <span style="display: block; margin-bottom: 5px;" id="nom_manquant4"></span>
    
                <!-- côté inscription -->
                <div class="submit">
                    <button class="btn_inscrire" type="submit" name="submit" id="submit">S'inscrire</button>
                </div>
            </form>
        </div>
        <div class="info-ins">
            <p>Avez vous déjâ un compte. <a href="index.php">Se connecter !</a></p>
        </div>

        </div>
    </div>



    <!-- Côté de JavaScript  -->
    <script src="script/valider/script.js"></script>
    <script src="script/valider/valider.js"></script>
</body>
</html>