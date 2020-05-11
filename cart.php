<?php
session_start();
require 'inc/config.php';

/* redirection vistors non connecté */
if (!isset($_SESSION['loginname'])) {
    header('Status: 301 Moved Permanently', false, 301);
    header('Location: login.php');
    exit();
}
?>

<?php require 'inc/head.php'; ?>

<?php require 'inc/data/products.php'; ?>

<section class="cookies container-fluid">
    <div class="row">
        <!--- TODO : Display shopping cart items from $_COOKIES here. --->
        <table>
            <thead>
                <tr>
                <th>Products</th>
                <th>Unit price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($_SESSION['cart'])) { ?>
            <?php foreach ($countProducts as $ref => $count) {?>
                <tr>
                <td><?= $catalog[$ref]['name'] ?></td>
                <td><?= $catalog[$ref]['price'] . '€' ?></td>
                <td><?= $count ?></td>
                <td><?= number_format($catalog[$ref]['price'] * $count, 2) . '€'?></td>
                <?php $totalPriceCart += number_format($catalog[$ref]['price'] * $count, 2) ?>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                <td style="text-align:center" colspan="2">Total</td>
                <td><?= array_sum($countProducts) ?></td>
                <td><?= number_format($totalPriceCart, 2) . '€'?></td>
                </tr>
                <?php } ?>
            </tfoot>
        </table>
        <form method="post" action="">
            <button type="submit" name="resetcart" class="btn btn-primary">Reset cart</button>
        </form>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
