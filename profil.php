<?php
include "./includes/connect.php";
include "./includes/header.php";
// var_dump($_SESSION);
$login = $_SESSION['utilisateur'];
$pass = $_SESSION['pass'];


if (!empty($_POST)){
    //verification que TOUS LES CHAMP sont plein et existent
    if(isset($_POST['login'], $_POST['newpass'], $_POST['confpass'], $_POST['pass']) && !empty($_POST['login']) && !empty($_POST['newpass'] && !empty($_POST['confpass']) && !empty($_POST['pass']))){
        // verification du mot de passe
       if (($_POST['pass'] == $pass)){
        // initialisation de la requette
        $sql = "UPDATE utilisateurs SET login = '{$_POST['login']}', password = '{$_POST['newpass']}' WHERE login = '$login'";
        $mysqli->query($sql);
            echo "<br>";
            echo "<p>information modifier</p>";

            $_SESSION['utilisateur'] = $_POST['login'];
            $_SESSION['pass'] = $_POST['newpass'];
       }
    }
}

?>
<main class="main_formulaire">
    <h2>Modification du profil</h2>
    <div class="container-form">
        <form action="" method="post">
            <div class="formulaire">
                <label for="login">Modification du login :</label>
            </div>
            <div class="formulaire">
                <input type="text" name="login" value="<?=$login?>" required>
            </div>

            <div class="formulaire">
                <label for="new">Modification du mot de passe :</label>
            </div>
            <div class="formulaire">
                <input type="password" name="newpass" value="<?=$pass?>" required>
            </div>

            <div class="formulaire">
                <label for="confpass">Confirmation du nouveau mot de passe:</label>
            </div>
            <div class="formulaire">
                <input type="password" name="confpass" value="<?=$pass?>" required>
            </div>

            <div class="formulaire">
                <label for="pass">Votre mot de passe actuel :</label>
            </div>
            <div class="formulaire">
                <input type="password" name="pass" placeholder="Entrez votre mot de pass" required>
            </div>

            <div class="formulaire">
                <input type="submit" value="Modifier">
            </div>  
        </form>
    </div>
</main>
<?php

include "./includes/footer.php";