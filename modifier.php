<?php
    include 'net.php';
    $id=$_GET['modifierid'];
    $Record = mysqli_query($net, "SELECT * FROM `admin_tableau` WHERE id = $id");
    $data = mysqli_fetch_array($Record);

?>

<?php
    include 'net.php';
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $matriculeid = $_POST['matriculeid'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $age = $_POST['age'];
        $birth = $_POST['birth'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $certifica = $_POST['certifica'];
        $promo = $_POST['promo'];
        
        include 'net.php';
        $photo = $_FILES['photo'];
        print_r($_FILES['photo']);
        $img_loc = $_FILES['photo']['tmp_name'];
        $img_name = $_FILES['photo']['name'];
        $img_des = "img/".$img_name;
        move_uploaded_file($img_loc, 'img/' .$img_name);

        mysqli_query($net, "UPDATE `admin_tableau` SET `matriculeid`='$matriculeid',`lname`='$lname',`fname`='$fname',`age`='$age',`birth`='$birth',`email`='$email',`number`='$number',`photo`='$img_des',`certifica`='$certifica',`promo`='$promo' WHERE id = $id");

        header("location:accueil.php");

    }
?>



<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administrateur</title>
    <link rel="stylesheet" href="css/accueil.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/RemixIcon/fonts/remixicon.css">
</head>
<body>
<header class="header_container">
    <nav>
        <!-- logo de la page -->
        <div class="logo">
            <h2>Diakaridia</h2>
        </div>
        <!-- élément de mon list -->
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Apropos</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>

<!-- le style de ma formulaire  -->
<style>
    .formulaire {
    display: flex;
    flex-direction: row;
    position: absolute;
    width: 100%;
    top: -30px;
    width: 100%;
    background-color: #000000c9;
    /* background-color: #d3ccccc9; */
    backdrop-filter: blur(2px);
    -webkit-backdrop-filter: blur(20px);
    z-index: 20;
    /* display: none; */
    animation: anime 0.5s cubic-bezier(0.075, 0.82, 0.165, 1) alternate;
}

.show_formulaire_apprenant_modifier {
    display: none!important;
}

@keyframes anime {
    0% {
        transform: scale(0);
    }

    100% {
        transform: scale(1);
    }
}
</style>



<main>

    <div class="formulaire" id="menu_formulaire">
        <form id="form" action="" method="POST">
            <!-- Côte de matricule  -->
            <div class="erro_text">
                <label for="matricule">Matricule </label>
                <input id="text_matricule" type="text" required   name="matriculeid" style="color:red!important;" readonly  value="<?php echo $data['matriculeid'] ?> ">
            </div>
            <!-- Côte de NOM  -->
            <div class="erro_text">
                <label for="lname">Nom </label>
                <input style="margin-top: 5px;" id="text_lname" type="text" required name="lname" placeholder="Son nom" value="<?= $data['lname']; ?>">
                <span style="display: block; margin-bottom: 5px;" id="error_text_nom"></span>
            </div>
            <!-- Côte de PRENOM  -->
            <div class="erro_text">
                <label for="fname">Prénom </label>
                <input style="margin-top: 5px;" id="text_fname" type="text" required name="fname" placeholder="Son prénom" value="<?= $data['fname']; ?>">
                <span style="display: block; margin-bottom: 5px;" id="error_text_prenom"></span>
            </div>
            <!-- Côte de l'Age  -->
            <div class="erro_text">
                <label for="age">Âge </label>
                <input style="margin-top: 5px;" id="text_age" type="text" required name="age" placeholder="Son âge" value="<?= $data['age']; ?>">
                <span style="display: block; margin-bottom: 5px;" id="error_text_age"></span>
            </div>
            <!-- Côte de naissance  -->
            <div class="erro_text">
                <label for="birth">Date de naissance </label>
                <input style="margin-top: 5px;" id="text_birth" type="date" required name="birth" placeholder="date de naissance" value="<?= $data['birth']; ?>">
                <span style="display: block; margin-bottom: 5px;" id="error_text_birth"></span>
            </div>
            <!-- Côte d'adresse e-mail  -->

            <div class="erro_text">
                <label for="email">Adresse e-mail </label>
                <input style="margin-top: 5px;" id="text_email" type="email" required name="email" placeholder="Adresse e-mail" value="<?= $data['email']; ?>">
                <span style="display: block; margin-bottom: 5px;" id="error_text_email"></span>
            </div>
            
            <!-- Côte de numero de telephone  -->
            <div class="erro_text">
                <label for="number">Numéro de téléphone </label>
                <input style="margin-top: 5px;" id="text_number" type="tel" required name="number" placeholder="Numéro de téléphone" value="<?= $data['number']; ?>">
                <span style="display: block; margin-bottom: 5px;" id="error_text_number"></span>
            </div>
            
            <!-- Côte de photo  -->
            <div class="erro_text">
                <label for="photo">Photo</label>
                <input style="margin-top: 5px;" id="text_photo" type="file" required name="photo" value="<?= $data['photo']; ?>">
                <span style="display: block; margin-bottom: 5px;" id="error_text_photo"></span>
            </div>

            <div class="erro_text">
                <input type="hidden" name="id" value="<?= $data['id']; ?>" >
            </div>
            
            <!-- Côte de promotion  -->
            <div class="erro_text">
                <label for="promo">Promotion </label>
                <input style="margin-top: 5px;" id="text_promo" type="text" required name="promo" placeholder="Promotion" value="<?= $data['promo']; ?>">
                <span style="display: block; margin-bottom: 5px;" id="error_text_promo"></span>
            </div>
            
            <!-- Côte d'année de certification  -->
            <div class="erro_text">
                <label for="certifica">Année de certification </label>
                <input style="margin-top: 5px;" id="text_certifica" type="number" required name="certifica"placeholder="Année de certification" value="<?= $data['certifica']; ?>">
                <span style="display: block; margin-bottom: 5px;" id="error_text_certifica"></span>
            </div>

            <button class="inscrire_btn" name="submit" type="" id="submit">Modifier</button>
        </form>

        <!-- pour quitter les formulaires de Apprenant   -->
        <div class="quitte_ajouteApprenant" id="close_formulaireApprenant">
            <div>
                <a href="accueil.php"><i class="ri-close-line"></i></a>
            </div>
        </div>

    </div>
</main>

    <script src="script/script.js"></script>
</body>
</html>