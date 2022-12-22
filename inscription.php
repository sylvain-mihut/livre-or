<?php
include "./includes/connect.php";
include "./includes/header.php";


if (!empty($_POST)) {
    //verification que TOUS LES CHAMP sont plein et existent
    if(isset($_POST['login'], $_POST['pass'], $_POST['confpass']) && !empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['confpass'])){
        // le formulaire est bien rempli
        // recupération des données 
        $login  = ($_POST['login']);
        $pass   = ($_POST['pass']);
        $confpass = ($_POST['confpass']);
        // verification si le login est deja présent dans la BDD
        $check = mysqli_num_rows($mysqli->query("SELECT * FROM utilisateurs WHERE login='$login'"));
        // verification si le mdp et confirmation du mdp
        if ($pass != $confpass){
            echo "<p>les mots de passe ne correspondent pas</p>";
        } elseif ($check==1){
            echo "<p>Le login existe déjà</p>";
        } else{
            $new_user = "INSERT INTO utilisateurs (login, password) VALUES ('$login', '$pass')";
            $mysqli->query($new_user) === true;
            header("Location: connexion.php");
            
        }  
    }
}
?>
<main class="main_formulaire">
    <h2>Inscription</h2>
    <div class="container-form">
        <form action="" method="post" >
            <div class="formulaire">
                <input type="text" name="login" placeholder="Entrez votre login:">
            </div>

            <div class="formulaire">
                <input type="password" name="pass" placeholder="Entrez votre mot de passe:">
            </div>

            <div class="formulaire">
                <input type="password" name="confpass" placeholder="Confirmez votre mot de passe:">
            </div>

            <div class="formulaire">
                <input type="submit" name="inscription" value="S'incrire">
            </div>
        </form>
    </div>
</main>
<?php include "./includes/footer.php"; ?>