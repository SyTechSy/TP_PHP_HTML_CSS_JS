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

<!-- ======================= COTE MATRICULE ===================== -->

<?php
// require 'net.php';

$query = "select matriculeid from admin_tableau order by matriculeid desc";
$result = mysqli_query($net,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['matriculeid'];

if(empty($lastid))
{
    $numb = "SY_0001";
}
else 
{
    $idd = str_replace("SY_","",$lastid);
    $id = str_pad($idd + 1, 4,0, STR_PAD_LEFT);
    $numb = 'SY_' .$id;
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


<aside>
    <div class="nom_admin">
        <h2 style="margin-top: 100px;">Bienvenue sur la page d'administrateur</h2>
    </div>

    <div class="container_table" style="margin: 2% 0px;">

        <table>
            <thead>
                <th>Id</th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Âge</th>
                <th>Date de naissance</th>
                <th>Adresse e-mail</th>
                <th>Numéro de téléphone</th>
                <th>Photo</th>
                <th>Promotion</th>
                <th>Année de certification</th>
                <th>Modification</th>
            </thead>

            <tbody>

                <?php
                include 'net.php';
                $result=mysqli_query($net, "SELECT * FROM `admin_tableau`");
                while($row = mysqli_fetch_array($result)) {
                echo "
                    <tr>
                        <td style='color: blue; font-weight: 600;'>$row[id]</td>
                        <td style='color: red; font-weight: 600;'>$row[matriculeid]</td>
                        <td>$row[lname]</td>
                        <td>$row[fname]</td>
                        <td>$row[age]</td>
                        <td>$row[birth]</td>
                        <td>$row[email]</td>
                        <td>$row[number]</td>
                        <td><img class='img_dinamic' src='$row[photo]' width = '40px' height = '40px'></td>
                        <td>$row[promo]</td>
                        <td>$row[certifica]</td>

                        <td class='btn_mod_sup'>
                            <button><a href='modifier.php?modifierid= $row[id] '><i class='ri-pencil-fill mod'></i></a></button>
                            <button><a href='supprimer.php?supprimerid= $row[id]  '><i class='ri-delete-bin-5-line sup'></i></a></button>
                            <button><a href='detaille.php?detailleid= $row[id] '>Détaille</a></button>
                        </td>

                    </tr>
                    ";
                    }
                ?>

            </tbody>
        </table>
    </div>

    <div class="ajoute_plus">
        <!-- pour ajouter un apprenant  -->
        <div class="ajouteUser" id="toggle_formulaireApprenant">
                <div title="Ajouter un Apprenant">
                    <i class="ri-add-circle-fill"></i>
                </div>
        </div>
    </div>
</aside>


<main>
    <div class="formulaire" id="menu_formulaire">
        <form id="form" action="" method="POST" enctype="multipart/form-data">
            <!-- Côte de matricule  -->
            <div class="erro_text">
                <label for="matricule">Matricule </label>
                <input id="text_matricule" type="text"  name="matriculeid"  
                style="color: blue;" value="<?php echo $numb; ?>" readonly>
            </div>
            <!-- Côte de NOM  -->
            <div class="erro_text">
                <label for="lname">Nom </label>
                <input style="margin-top: 5px;" id="text_lname" type="text" required name="lname" placeholder="Son nom">
                <span style="display: block; margin-bottom: 5px;" id="error_text_nom"></span>
            </div>
            <!-- Côte de PRENOM  -->
            <div class="erro_text">
                <label for="fname">Prénom </label>
                <input style="margin-top: 5px;" id="text_fname" type="text" required  name="fname" placeholder="Son prénom">
                <span style="display: block; margin-bottom: 5px;" id="error_text_prenom"></span>
            </div>
            <!-- Côte de l'Age  -->
            <div class="erro_text">
                <label for="age">Âge </label>
                <input style="margin-top: 5px;" id="text_age" type="number" required  name="age" placeholder="Son âge" min="12">
                <span style="display: block; margin-bottom: 5px;" id="error_text_age"></span>
            </div>
            <!-- Côte de naissance  -->
            <div class="erro_text">
                <label for="birth">Date de naissance </label>
                <input style="margin-top: 5px;" id="text_birth" type="date" required  name="birth" placeholder="date de naissance">
                <span style="display: block; margin-bottom: 5px;" id="error_text_birth"></span>
            </div>
            <!-- Côte d'adresse e-mail  -->

            <div class="erro_text">
                <label for="email">Adresse e-mail </label>
                <input style="margin-top: 5px;" id="text_email" type="email" required  name="email" placeholder="Adresse e-mail">
                <span style="display: block; margin-bottom: 5px;" id="error_text_email"></span>
            </div>
            
            <!-- Côte de numero de telephone  -->
            <div class="erro_text">
                <label for="number">Numéro de téléphone </label>
                <input style="margin-top: 5px;" id="text_number" type="tel" required  name="number" placeholder="Numéro de téléphone">
                <span style="display: block; margin-bottom: 5px;" id="error_text_number"></span>
            </div>
            
            <!-- Côte de photo ============================================================== -->
            <div class="erro_text">
                <label for="phone">Photo</label>
                <input style="margin-top: 5px;" id="text_photo" type="file" required  name="photo">
                <span style="display: block; margin-bottom: 5px;" id="error_text_photo"></span>
            </div>
            
            <!-- Côte de promotion  -->
            <div class="erro_text">
                <label for="promo">Promotion </label>
                <input style="margin-top: 5px;" id="text_promo" type="text" required  name="promo" placeholder="exemple : P2023">
                <span style="display: block; margin-bottom: 5px;" id="error_text_promo"></span>
            </div>
            
            <!-- Côte d'année de certification  -->
            <div class="erro_text">
                <label for="certifica">Année de certification </label>
                <input style="margin-top: 5px;" id="text_certifica" type="number" required  name="certifica" placeholder="Année de certification">
                <span style="display: block; margin-bottom: 5px;" id="error_text_certifica"></span>
            </div>

            <button class="inscrire_btn" name="submit" type="" id="submit">Valider</button>
        </form>

        <!-- pour quitter les formulaires de Apprenant   -->
        <div class="quitte_ajouteApprenant" id="close_formulaireApprenant">
            <div>
                <i class="ri-add-circle-fill"></i>
            </div>
        </div>

    </div>
</main>

<div class="deconnecter_vous">
    <div class="deconnecte">
        <button class="btn_deconnecte"><a href="index.php">Déconnecter-vous</a></button>
    </div>
</div>

<style>
    .btn_deconnecte {
        border: none;
        width: 140px;
        height: 50px;
        color: #fff;
        z-index: 1;
        display: flex;
        background: #000;
        position: relative;
        margin: 50px;
        }

        .btn_deconnecte a {
        margin: 0 auto;
        align-self: center;
        font-size: 15px;
        text-decoration: none;
        font-weight: bold;
        text-align: center;
        color: #fff;

        }

        .btn_deconnecte::after {
        position: absolute;
        content: "";
        width: 100%;
        z-index: -1;
        height: 10%;
        bottom: 0;
        clip-path: polygon(0% 74%, 4% 75%, 8% 76%, 11% 77%, 15% 78%, 20% 78%, 25% 77%, 32% 77%, 37% 75%, 40% 74%, 43% 74%, 46% 73%, 52% 72%, 57% 72%, 65% 74%, 66% 75%, 71% 78%, 75% 82%, 81% 86%, 83% 88%, 88% 91%, 90% 94%, 94% 96%, 98% 98%, 100% 100%, 82% 100%, 0 100%);
        background: #8792eb;
        transition: 0.2s ease;
        }

        .btn_deconnecte::before {
        position: absolute;
        content: "";
        /*   bottom: 80%; */
        transform: rotate(180deg);
        width: 100%;
        height: 10%;
        transition: 0.2s ease;
        /*   bottom:; */
        z-index: -1;
        clip-path: polygon(0% 74%, 4% 75%, 8% 76%, 11% 77%, 15% 78%, 20% 78%, 25% 77%, 32% 77%, 37% 75%, 40% 74%, 43% 74%, 46% 73%, 52% 72%, 57% 72%, 65% 74%, 66% 75%, 71% 78%, 75% 82%, 81% 86%, 83% 88%, 88% 91%, 90% 94%, 94% 96%, 98% 98%, 100% 100%, 82% 100%, 0 100%);
        background: #8792eb;
        }

        .btn_deconnecte:hover::after {
        clip-path: polygon(0 30%, 9% 34%, 7% 39%, 11% 43%, 13% 33%, 17% 30%, 24% 34%, 25% 35%, 30% 31%, 30% 38%, 39% 33%, 35% 43%, 43% 45%, 55% 46%, 65% 74%, 67% 66%, 81% 57%, 75% 82%, 81% 86%, 83% 88%, 88% 91%, 90% 94%, 94% 96%, 98% 98%, 100% 100%, 82% 100%, 0 100%);
        height: 80%;
        }

        .btn_deconnecte:hover::before {
        clip-path: polygon(0 30%, 9% 34%, 7% 39%, 11% 43%, 13% 33%, 17% 30%, 24% 34%, 25% 35%, 30% 31%, 30% 38%, 39% 33%, 35% 43%, 43% 45%, 55% 46%, 65% 74%, 67% 66%, 81% 57%, 75% 82%, 81% 86%, 83% 88%, 88% 91%, 90% 94%, 94% 96%, 98% 98%, 100% 100%, 82% 100%, 0 100%);
        height: 80%;
        }


</style>

    
    <script src="script/script.js"></script>
</body>
</html>