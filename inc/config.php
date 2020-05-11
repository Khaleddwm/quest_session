<?php

/* message de bienvenue */
if (isset($_SESSION['loginname'])) {
    $welcome = 'Hello ' . $_SESSION['loginname'] . ' !';
} else {
    $welcome = 'Hello wilder !';
}

/* config bouton Log in et Log out */
if (isset($_SESSION['loginname'])) {
    $text = 'Log out';
    $direction = '/logout.php';
    $icon = 'glyphicon glyphicon-off';
    $btn = 'btn btn-danger navbar-btn';
} else {
    $text = 'Log in';
    $direction = '/login.php';
    $icon = 'glyphicon glyphicon-user';
    $btn = 'btn btn-success navbar-btn';
}

/* prix total panier */
$totalPriceCart = 0;

/* Ajout au panier */
if (isset($_GET['add_to_cart'])) {
    $_SESSION['cart'][] = $_GET['add_to_cart'];
    header('Location: index.php');
    exit();
}

/* compte le nombre de produit dans le panier */
if (isset($_SESSION['cart'])) {
    $countProducts = array_count_values($_SESSION['cart']);
}

/* Deconnexion utilisateur */
if (isset($_POST['resetcart']) && isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
    header('Location: cart.php');
    exit();
}

?>