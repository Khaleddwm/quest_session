<?php 
session_start();

/* Deconnexion utilisateur */
if (isset($_SESSION['loginname'])) {
    unset($_SESSION['loginname']);
    unset($_SESSION['cart']);
    session_destroy();
    header('Location: index.php');
}
?>