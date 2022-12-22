<?php
session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre D'Or</title>
</head>
<body>
    <header>
    <h1>Livre D'Or</h1>
        <?php
            if (isset($_GET['deconnexion'])){
                if($_GET['deconnexion']==true){
                    session_unset();
                    header('Location: index.php');
                }
            }
            if (isset($_SESSION['utilisateur'])) {
                echo "<nav>
                <a href='index.php'><button>Accueil</button></a>
                <a href='profil.php'><button>Profil</button></a>
                <a href='commentaire.php'><button>Commentaire</button></a>
                <a href='livre-or.php'><button>Livre d'Or</button></a>
                <a href='index.php?deconnexion=true'><button>Déconnexion</button></a>
                </nav>";
                ?> <main class="title-content">     <?= "<h2 class='title'> Bonjour : ".$_SESSION['utilisateur']."</h2><br>";?>
                </main>
            <?php } else {
                echo "<nav>
                <a href='index.php'><button>accueil</button></a>
                <a href='livre-or.php'><button>Livre d'Or</button></a>
                <a href='inscription.php'><button>inscription</button></a>
                <a href='connexion.php'><button>connexion</button></a>
                </nav>";
            }
        ?>
    </header>