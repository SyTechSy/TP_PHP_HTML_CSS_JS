<?php
    include 'net.php';
    $id=$_GET['detailleid'];
    $Record = mysqli_query($net, "SELECT * FROM `admin_tableau` WHERE id = $id");
    $data = mysqli_fetch_array($Record);

?>

<?php
include 'net.php';

if(isset($_POST['submit'])) {
    $matriculeid = $_POST['matriculeid'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $age = $_POST['age'];
    $birth = $_POST['birth'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $certifica = $_POST['certifica'];
    $promo = $_POST['promo'];

    $photo = $_FILES['photo'];
    print_r($_FILES['photo']);
    $img_loc = $_FILES['photo']['tmp_name'];
    $img_name = $_FILES['photo']['name'];
    $img_des = "img/".$img_name;
    move_uploaded_file($img_loc, 'img/' .$img_name);


    mysqli_query($net, "INSERT INTO `admin_tableau`(`matriculeid`, `lname`, `fname`, `age`, `birth`, `email`, `number`, `photo`, `certifica`, `promo`) VALUES ('$matriculeid','$lname','$fname','$age','$birth','$email','$number','$img_des','$certifica','$promo')");
}

?>



<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administrateur</title>
    <link rel="stylesheet" href="css/detaille.css">
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




<main>
    <div class="container_detaille">
        <!-- left  -->
        <div class="image_detaille">
            <!-- <img src="$row[photo]" alt="image"> -->
            <?php
                include 'net.php';
                // $result=mysqli_query($net, "SELECT * FROM `admin_tableau`");
                $result = mysqli_query($net, "SELECT `photo` FROM `admin_tableau` WHERE id = $id ");
                if($row = mysqli_fetch_assoc($result)) {
                echo "
                    <tr>
                        <td><img class='img_dinamic' src='$row[photo]' width = '40px' height = '40px'></td>
                    </tr>
                    ";
                    }
                ?>
        </div>


        <!-- right  -->
        <div class="formulaire" id="menu_formulaire">
            <h2 class="title_detaille">Les Informations</h2>
            
            <form class="info_detaille" id="form" action="" method="post">

                <div class="diviser">
                    <!-- Côte de matricule  -->
                    <div class="erro_text">
                        <label for="matricule">Matricule : </label>
                        <input id="text_matricule" disabled type="text" required  name="matriculeid" style="color:red!important;" value="<?php echo $data['matriculeid']; ?> ">
                    </div>
                    <!-- Côte de NOM  -->
                    <div class="erro_text">
                        <label for="lname">Nom : </label>
                        <input id="text_lname" disabled type="text" required name="lname" placeholder="Son nom" value="<?= $data['lname']; ?>">
                        
                    </div>
                    <!-- Côte de PRENOM  -->
                    <div class="erro_text">
                        <label for="fname">Prénom : </label>
                        <input id="text_fname" disabled type="text" required name="fname" placeholder="Son prénom" value="<?= $data['fname']; ?>">
                        
                    </div>
                </div>

                <!-- ========================================================= -->

                <div class="diviser">
                    <!-- Côte de l'Age  -->
                    <div class="erro_text">
                        <label for="age">Âge : </label>
                        <input id="text_age" disabled type="text" required name="age" placeholder="Son âge" value="<?= $data['age']; ?>">
                        
                    </div>
                    <!-- Côte de naissance  -->
                    <div class="erro_text">
                        <label for="birth">Date de naissance : </label>
                        <input id="text_birth" disabled type="date" required name="birth" placeholder="date de naissance" value="<?= $data['birth']; ?>">
                        
                    </div>
                    <!-- Côte d'adresse e-mail  -->

                    <div class="erro_text">
                        <label for="email">Adresse e-mail : </label>
                        <input id="text_email" class="email" disabled type="email" required name="email" placeholder="Adresse e-mail" value="<?= $data['email']; ?>">
                        
                    </div>
                </div>
                
                <!-- ========================================================= -->

                <div class="diviser">
                    <!-- Côte de numero de telephone  -->
                    <div class="erro_text">
                        <label for="number">Numéro de téléphone : </label>
                        <input id="text_number" disabled type="tel" required name="number" placeholder="Numéro de téléphone" value="<?= $data['number']; ?>">
                        
                    </div>
                    
                    <!-- Côte de photo  -->
                    <!-- <div class="erro_text">
                        <label for="photo">Photo : </label>
                        <input id="text_photo" disabled type="file" required name="photo" value="<?= $data['photo']; ?>">
                        
                    </div> -->
                    
                    <!-- Côte de promotion  -->
                    <div class="erro_text">
                        <label for="promo">Promotion : </label>
                        <input id="text_promo" disabled type="text" required name="promo" placeholder="Promotion" value="<?= $data['promo']; ?>">
                        
                    </div>
                    
                    <!-- Côte d'année de certification  -->
                    <div class="erro_text">
                        <label for="certifica">Année de certification: </label>
                        <input id="text_certifica" disabled type="number" required name="certifica"placeholder="Année de certification" value="<?= $data['certifica']; ?>">
                        
                    </div>
                </div>

                <!-- <button class="inscrire_btn" name="submit" type="" id="submit">Modifier</button> -->
            </form>

        </div>
    </div>
</main>
    <script src="script/script.js"></script>
</body>
</html>