<?php
include "./includes/connect.php";
include "./includes/header.php";
$id = $_SESSION['id'];
$login = $_SESSION['utilisateur'];
// var_dump($_SESSION['utilisateur']);
if (!empty($_POST)) {
    
    if (isset($_POST['commentaire']) && !empty ($_POST['commentaire'])){
        $new_comment = "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('{$_POST['commentaire']}', $id, NOW())";
        $mysqli->query($new_comment);
        header('Location: livre-or.php');
    } else {
        echo "Le commentaire est vide";
    }
}
?>
<main class="main_comment">
    <h2>Postez votre commentaire en tant que <?php echo "$login" ?> :</h2>
    <form action="" method="post">
        <textarea name="commentaire" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer">
    </form>
</main>

<?php include "./includes/footer.php"; ?>