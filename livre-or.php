<?php
include "./includes/connect.php";
include "./includes/header.php";

$request = $mysqli->query("SELECT commentaires.id, commentaires.commentaire, DATE_FORMAT(commentaires.date, '%d/%m/%Y') as date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY id DESC");
?>

<main class="livre_d_or">
<h2>Livre d'Or</h2>
    <table>
        <thead>
            <td>Posté le </td>
            <td>Par l'utilisateur </td>
            <td>Commentaire </td>
        </thead>
        <tbody>
        <?php 
            while ($result_request = $request->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$result_request['date']."</td>" ;
                echo "<td>". $result_request['login']."</td>" ;
                echo "<td>". $result_request['commentaire']."</td>"; 
                echo "</tr>";
            }
        
        ?>
        </tbody>
    </table>
<?php
if (isset($_SESSION['id'])){
?>
<a href="commentaire.php"><button>Poster un commentaire</button></a>
<?php
} else {
?>
<p>Connectez vous pour poster un commentaire</p>
<a href="connexion.php"><button>Se connecter</button></a>
<?php
}
?>
</main>
<?php include "./includes/footer.php"; ?>