<?php
$BDD = array();
$BDD['host'] = "localhost";
$BDD['user'] = "sylvain--miuhut";
$BDD['pass'] = "Mdpprojetplesk";
$BDD['db'] = "sylvain--mihut_livreor";
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
if(!$mysqli) {
    echo "Connexion non établie.";
    exit;
}
?>